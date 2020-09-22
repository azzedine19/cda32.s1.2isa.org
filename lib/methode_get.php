<?php

$reponse = $bdd->query('SELECT * FROM page');

$reponse2 = $bdd->query('SELECT * FROM nouvelle');


/* Je génère un tableau  */

$TbTitle = array();/* Ma valeur $donnees sur les lignes de ma requête SQL $reponse */

while ($donnees = $reponse->fetch()) {
    /* Mon $tbTitle avec comme clée chaque valeur de la colonne 'key_file' de mes $donnees sera égale à mes lignes $donnees correspondante */
    $TbTitle[$donnees['key_file']] = $donnees;
}

$TbNews = array();

while ($donnees2 = $reponse2->fetch()) {
    /* Mon $TbNews avec comme clée chaque valeur de la colonne 'IdNouvelle' de mes $donnees2 sera égale à mes lignes $donnees2 correspondante */
    $TbNews[$donnees2['IdNouvelle']] = $donnees2;
}




//gere la deconnexion
if(isset($_GET['deconnexion']) && $_GET['deconnexion'] == 1){

    //on détruit la session
    session_destroy();
    //on redirige la page apres destroy
    header("location:index.php");
}




/*
 * exemple de construction d'un tableau en PHP
var_dump($ar_pages_var);
array{
    array{
        array{
            key/index : valeur, //PHP key => valeur
        }
    },
    array{
        array{
        }
    }
}
$ar_pages_var['acceuil'] = array('id_page' => 1, 'key_file' => 'acceuil');
$ar_pages_var['activites'] = array('id_page' => 2, 'key_file' => 'activites');
*/



//Superglobal $_GET -> récupération de l'information de l'URL ?page=presentation
//test si la clef de l'url existe, si oui prend la valeur de l'information URL
if(isset($_GET['page']) && array_key_exists($_GET['page'],$TbTitle) ) {

    //Je vérifie la valeur de ma méthode $_GET['page'] (index.php?page=), je vérifie que la valeur est profil
    if ($_GET['page'] == 'profil') {
        //Je vérifie qu'il y a un id qui n'st pas vide
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            //Je vérifie qu'il y a une session id créée pour ensuite vérifier si la session id est la mmême que la $_GET['id]
            if (isset($_SESSION['Id'])) {


                //Soit je suis le même id que le profil que je demande de voir, soit je suis admin
                if ($_SESSION['Id'] == $_GET['id'] || $_SESSION['user_level'] == 2) {

                    //la requete de la table page
                    $reponse = $bdd->query('SELECT * FROM adherent WHERE IdAdherent = ' . $_GET['id']);


                    //boucle les données récupérées
                    while ($donnees = $reponse->fetch()) {
                        //J'enregistre toutes les valeurs dans des variables (pratique)
                        $identifiant = $donnees['Login'];
                        $nom = $donnees['Nom'];
                        $prenom = $donnees['Prenom'];
                        $login = $donnees['Login'];
                        $cylindree = $donnees['cylindree'];
                        $DateNaiss = $donnees['DNaiss'];
                        $Adresse = $donnees['Adresse1'];
                        $CodeP = $donnees['CdPost'];
                        $Ville = $donnees['Ville'];
                        $Email = $donnees['Email'];
                        $Tel = $donnees['Tel'];
                        //$CC = $donnees['CC'];
                        $Titre = $prenom . ' ' . $nom;
                        $Id = $_GET['id'];
                        //to be continued

                    }

                    $title_register = 'Mise à jour de votre profil';
                    $btn_register = 'Mettre à jour';
                    $action = 'update_profil';

                }
            }
        }
    } else if ($_GET['page'] == 'information') {
        if (isset($_GET['id']) && !empty($_GET['id'] && array_key_exists($_GET['id'], $TbNews))) {
            $reponse = $bdd->query('SELECT * FROM nouvelle WHERE IdNouvelle = ' . $_GET['id']);

            //boucle les données récupérées
            while ($donnees = $reponse->fetch()) {

                $titrenews = $donnees['Titre'];
                $contenunews = $donnees['Texte'];
                $photo = $donnees['Fichier'];
                //to be continued

            }
            if (isset($_GET['action']) && !empty($_GET['action'])) {
                if ($_GET['action'] == 'delete') {
                    if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 2) {
                        //lancement de la requete
                        $bdd->query('DELETE FROM nouvelle WHERE IdNouvelle = ' . $_GET['id']);
                        $message_modal = 'Nouvelle ' . $_GET['id'] . ' supprimée.';
                        $currentPage = 'informations';
                    } else {
                        $message_modal = 'Vous n\'êtes pas autorisé à réaliser cette action.';
                    }
                }
            }
        } else {
            $currentPage = 'informations';
        }
    } else if ($_GET['page'] == 'ajoutnews' && isset($_SESSION['user_level']) && $_SESSION['user_level'] > 1) {
        $contenunews = '';
        $titrenews = '';
    } else if ($_GET['page'] == 'members') {
        if (isset($_GET['action']) && !empty($_GET['action'])) {

            //est-ce que l'action c'est delete sur la page membres ?
            if ($_GET['action'] == 'delete') {
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 2) {
                        //lancement de la requete
                        $bdd->query('DELETE FROM adherent WHERE IdAdherent = ' . $_GET['id']);

                        //information modal html
                        $message_modal = 'Utilisateur ' . $_GET['id'] . ' supprimé.';

                    } else {

                        $message_modal = 'Vous n\'êtes pas autorisé à réaliser cette action.';

                    }
                }
            }
        }
    }
    else if (isset($_POST['formulaire']) &&  $_POST['formulaire'] == 'activite') {
        $query = 'INSERT INTO activite ( IntituleActivite,DDebut,DFin,Description,TarifAdherent,TarifInvite,DLimite,IdAdherent,Idtype)
        VALUES (?,?,?,?,?,?,?,?,?)';
        $reponse = $bdd->prepare($query);
        $result = $reponse->execute(array($_POST["IntituleActivite"],$_POST["DDebut"],$_POST["DFin"],$_POST["Description"],$_POST["TarifAdherent"],$_POST["TarifInvite"],$_POST["DLimite"],
            $_POST["IdAdherent"], $_POST["IdType"]));

        $message_modal = 'L\'activité a bien était ajoutée .';
    }

}else{
    $currentPage = 'accueil';
}


//test sur les action de page

//Sinon je redirige l'utilisateur sur la page accueil car :
//Une des conditions n'est pas remplies ou alors
//La page n'est pas dans le tableau de mes pages (array_key_exist)














/*

        else if($page == 'informations'){

            if(isset($_GET['action']) && !empty($_GET['action'])){

                if($_GET['action'] == 'add'){

                    $wysiwyg = true;

                }

            }

            //$message_modal = test(10,20);

        }else if($page == 'information'){

            if(isset($_GET['id']) && !empty($_GET['id'])){


                //la requete de la table page
                $reponse = $bdd->query('SELECT * FROM nouvelle WHERE IdNouvelle = '.$_GET['id']);


                //boucle les données récupérées
                while ($donnees = $reponse->fetch()) {

                    $title = $donnees['Titre'];
                    $introduction = $donnees['Introduction'];
                    $description = $donnees['Texte'];


                }

                //je transforme le H1 prévu coté BD
                $ar_pages_var[$page]['h1'] = $title;
                $id = $_GET['id'];

                //a voir plus tard pour update news ?
                $title_register = 'Mise à jour de votre profil';
                $btn_register = 'Mettre à jour';
                $action = 'update_profil';

            }else{

                //retour page par default
                $page = $homepage;

            }

        }

        test sur les action de page
        if(isset($_GET['action']) && !empty($_GET['action'])){

            //est-ce que l'action c'est delete sur la page membres ?
            if($_GET['action'] == 'delete'){

                //est-ce qu'on a une valeur d'id ?
                if(isset($_GET['id']) && !empty($_GET['id'])){

                    //est-ce que c'est sur la page membre ?
                    if($page == 'membres'){

                        if($user_level == 2){
                            //lancement de la requete
                            $bdd->query('DELETE FROM adherent WHERE IdAdherent = '.$_GET['id']);

                            //information modal html
                            $message_modal = 'Utilisateur '.$_GET['id'].' supprimé.';

                        }else{

                            $message_modal = 'Vous n\'êtes pas authorisé à réaliser cette action.';

                        }

                    }else if($page == 'activites'){
                        //ici le code pour gérer les suppressions des activités


                    }
                }
            }
        }
    }
}

//var_dump($ar_pages_var);

//contenu de variable en fonction de 'page'
$title = $ar_pages_var[$page]['metatitle'];
$metadescription = $ar_pages_var[$page]['metadescription'];
$keywords = $ar_pages_var[$page]['keywords'];


//exemple fonction PHP - TP a proposer optimiser le code de la methode $_GET ?
//$message_modal = test(10,20);

function test($var1, $var2){

    $var1 += 1;
    $var2 += $var1;

    return 'hello function : v1 ='. $var1.' - v2 = '.$var2;

}
*/
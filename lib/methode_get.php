<?php

//gere la deconnexion
if(isset($_GET['deconnexion']) && $_GET['deconnexion'] == 1){

    //on détruit la session
    session_destroy();
    //on redirige la page apres destroy
    header("location:index.php");

}



//Initialisation de la variable tableau array() PHP
$ar_pages_var = array();

//la requete de la table page
$reponse = $bdd->query('SELECT *  FROM page');

//boucle les données récupérées
while ($donnees = $reponse->fetch()) {

    //ajout des données par index à la variable tableau $ar_pages_var
    $ar_pages_var[$donnees['key_file']] = $donnees;

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
if(isset($_GET['page']) && !empty($_GET['page']) ){

    //on verifie que la clef esiste bien dans mon tableau $ar_pages_var (fichier valide)
    //securité - Fail include
    if(array_key_exists($_GET['page'], $ar_pages_var)){

        $page_level = $ar_pages_var[$_GET['page']]['page_level'];

        //parametre de page
        //verification du niveau de securité de l'affichage de page

        //test level de pages
        //var_dump($mode_level.' > '.$page_level);

        //est-ce que la page level (droit d'affichage de la page) est ok ?
        //sinon $page reste accueil
        if($user_level >=  $page_level){
            $page = $_GET['page'];
        }

        //gestion des pages
        if($page == 'profil'){

            if(isset($_GET['id']) && !empty($_GET['id'])){

                //je verifie soit admin soit l'utilisateur qui accede à son profil profil
                if($_SESSION['id_adherent'] == $_GET['id'] || $user_level == 2){

                    //la requete de la table page
                    $reponse = $bdd->query('SELECT * FROM adherent WHERE IdAdherent = '.$_GET['id']);


                    //boucle les données récupérées
                    while ($donnees = $reponse->fetch()) {

                        $identifiant = $donnees['Login'];
                        $nom = $donnees['Nom'];
                        $prenom = $donnees['Prenom'];
                        $login = $donnees['Login'];
                        $cylindree = $donnees['cylindree'];
                        //to be continued

                    }

                    //je transforme le H1 prévu coté BD
                    $ar_pages_var[$page]['h1'] = $prenom.' '.$nom;
                    $id = $_GET['id'];

                    $title_register = 'Mise à jour de votre profil';
                    $btn_register = 'Mettre à jour';
                    $action = 'update_profil';

                }else{

                    //retour page par default
                    $page = $homepage;

                }

            }

        }else if($page == 'informations'){

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

        //test sur les action de page
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

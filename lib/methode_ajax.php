<?php


//démarage des sessions
session_start();
/*if(isset($_SESSION['Nom'])){
    if (isset($_COOKIE['ticket']) AND $_COOKIE['ticket'] == $_SESSION['ticket'])
    {
        $ticket = session_id().microtime().rand(0,9999999999);
        $ticket = hash('sha512', $ticket);
        $_SESSION['ticket'] = $ticket;
        setcookie('ticket', $ticket, time() + (60 * 10)); // Expire au bout de 20 min

    }
    else
    {
        // On détruit la session
        //$_SESSION = array();
        session_destroy();
        unset($_COOKIE['ticket']);
        header('location:index.php');
    }
}*/

include('../config/config.php');
include('../lib/functions.php');
include('../lib/methode_post.php');
$msg = array();
//methode Ajax inscription
//fonction register
function register($data, $bdd) {
    //
    $login = $data->{"login"};
    $nom = $data->{"nom"};

    if(isset($data->{'cylindree'})){
        $cyl = $data->{'cylindree'};
    }else{
        $cyl = '';
    }
    $hashed_password = hash('sha256', $data->{'Password'});


    $query = "Insert into adherent (Nom, Prenom, DNaiss, Adresse1, CdPost, Ville, Email, Tel, Login, Password, cylindree) values ( '". $data->{'nom'} ."' ,'" . $data->{'prenom'}. "','" . $data->{'dnaiss'}. "','" . $data->{'adresse1'}. "','" . $data->{'CDpostal'}. "','" . $data->{'Ville'}. "','" . $data->{'email'}. "','" . $data->{'Tel'}. "','" . $data->{'login'} . "','".$hashed_password."','" . $cyl."')";

    $result = $bdd->exec($query);
    if($result > 0) {
        return true;
    }else return false;
}
//fonction update
function update($data, $bdd) {
    //
    $login = $data->{"login"};
    $nom = $data->{"nom"};

    if(isset($data->{'cylindree'})){
        $cyl = $data->{'cylindree'};
    }else{
        $cyl = '';
    }
    $hashed_password = hash('sha256', $data->{'Password'});

    //Si j'ai une session d'ouverte et ue le "&id=" (Get de l'id) est égal à mon id de session (que je suis bien sur l'id qui m'appartient)
    //Ou que je suis admin
    //Alors je peux updater le profil (soit le mien, soit celui de quelqu'un d'autre à condition que je sois admin)
    if (isset($_SESSION['Id']) && isset($_GET['id']) && ($_SESSION['Id'] == $_GET['id'] || $_SESSION['user_level'] > 1)) {

        $query = 'update adherent set  
                    Nom = "' . $data->{'nom'} . '",
                    Prenom = "' . $data->{'prenom'} . '",
                    DNaiss = "' . $data->{'dnaiss'} . '",
                    Adresse1 = "' . $data->{'adresse1'} . '",
                    CdPost = "' . $data->{'CDpostal'} . '",
                    Ville = "' . $data->{'Ville'} . '",
                    Email = "' . $data->{'email'} . '",
                    Tel = "' . $data->{'Tel'} . '",
                    Login = "' . $data->{'login'} . '",
                    Password = "' . $hashed_password . '",
                    cylindree = "' . $cyl . '"
    where IdAdherent = "' . $data->{'id'} . '"';

        $result = $bdd->exec($query);
        if ($result > 0) {
            return true;
        } else return false;
    }
    else {
        $message_modal = 'Vous n\'êtes pas autorisé à lancer cet update!';
    }
}


if(isset($_POST["action"])) {
    switch ($_POST["action"]) {
        case "register":
            try {
                $result = register(json_decode($_POST["data"]), $bdd);
                $retour = array(
                    'success' => $result,
                    'data' => 'Votre inscription a bien été prise en compte'
                );
                echo json_encode($retour);
            } catch (Exception $e) {
                $retour = array(
                    'success' => false,
                    'data' => array(
                        'error' => $e->getMessage())
                );
                echo json_encode($retour);
            }
            break;
        case "update":
            try {
                $result = update(json_decode($_POST["data"]), $bdd);
                $retour = array(
                    'success' => $result,
                    'data' => 'Votre profil est mis à jour'
                );
                echo json_encode($retour);
            } catch (Exception $e) {
                $retour = array(
                    'success' => false,
                    'data' => array(
                        'error' => $e->getMessage())
                );
                echo json_encode($retour);
            }
            break;
        }
}
else if(isset($_SESSION['user_level']) && $_SESSION['user_level'] > 1){

    if(!empty($_POST)) {

        if (isset($_POST['informations']) && $_POST['informations'] == 1) {

            if(isset($_POST['description']) && !empty($_POST['description'])){
                if(isset($_POST['photo']) && null!==$_POST['photo']) {
                    $fichier = $_POST['photo'];
                }else {
                    $fichier = ' ';
                }
                $query = $bdd->prepare('INSERT INTO nouvelle(
                Titre,
                Texte,
                DPubli,
                Fichier                
                ) VALUES ( :title, :description, NOW(), :fichier )');

                $query->execute(Array(
                  "title" => $_POST["title"],
                  "description" => $_POST["description"],
                  "fichier" => $fichier
                ));

                //$bdd->lastInsertId() recupere l'id créé automatiquement
                $donnees['IdNouvelle']= $bdd->lastInsertId();
                $donnees['Titre'] = $_POST["title"];

                //mise en variable d'un template
                ob_start();
                include('../includes/templ/head_breadcrumb.php');
                $tmpl = ob_get_clean();

                $msg['modal'] = 'Ajout d\'une nouvelle.';
                $msg['tmpl'] = $tmpl;




                //return valeur json/Ajax
                echo json_encode($msg);
            }

        }

    }

}

else{
    // si il est pas admin
    $msg['modal'] = 'Vous n\'etes pas authorisé à appeller cette methode.';

//return valeur json/Ajax
    echo json_encode($msg);
}


<?php
//Je charge PHP Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// verification de la présence d'une methode poste (hiden_formulaire qui est =  a connexion )
if (!empty($_POST)) {
    if (isset($_POST ['formulaire'])) {
        if ($_POST ['formulaire'] == "activite") {
            list($fileName) = UploadFile($_FILES["ImageAct"], "uploads/images/activites/");
            $query = 'INSERT INTO activite ( IntituleActivite,DDebut,DFin,Description,TarifAdherent,TarifInvite,DLimite,IdAdherent,Idtype,ImageAct)
            VALUES (?,?,?,?,?,?,?,?,?,?)';
            $reponse = $bdd->prepare($query);
            $result = $reponse->execute(array($_POST["IntituleActivite"], $_POST["DDebut"], $_POST["DFin"], $_POST["Description"], $_POST["TarifAdherent"], $_POST["TarifInvite"], $_POST["DLimite"],
                $_POST["IdAdherent"], $_POST["IdType"], $fileName));

            $message_modal = 'L\'activité a bien était ajoutée .';
            //var_dump($_POST);
        }
        elseif ($_POST ['formulaire'] == "photo"){
                list($fileName) = UploadFile($_FILES["Fichier"], $galerie,["image"]);
                $query = 'INSERT INTO photo (Titre,Fichier,IdAdherent,IdActivite)
            VALUES (?,?,?,?)';
                $reponse = $bdd->prepare($query);
                $result = $reponse->execute(array($_POST["Titre"], $fileName, $_POST["IdAdherent"], $_POST["IdActivite"]));

                $message_modal = 'La photo a bien était ajoutée .';
            //var_dump($_POST);
        }
        else if ($_POST ['formulaire'] == 'connexion') {
            //verification de la presence d'un login et d'un mot de passe
            if (isset($_POST['login']) && isset($_POST['password'])) {
                if (!empty($_POST['login']) && !empty($_POST['password'])) {
                    //hash du mot de passe de l'utilisateur
                    $password = My_Crypt($_POST['password']);
                    // selection de la ligne sql  correspendante au login /password de l'adherent
                    $query = 'SELECT IdAdherent,
                                     Nom,
                                     Prenom,
                                     Organisateur
                                     FROM adherent 
                                     WHERE Login ="' . $_POST['login'] . '" AND Password ="' . $password . '"';
                    //execution de la requete ci-dessu
                    $reponse = $bdd->query($query);
                    //si la requete renvoie une ligne une seule
                    if ($reponse->rowCount() == 1) {
                        //on distribue(fetch) la reponse sql dans un tableau (variable $donnees)
                        while ($donnees = $reponse->fetch()) {
                            //je stock les valeurs dans des variables
                            $Nom = $donnees['Nom'];
                            $Prenom = $donnees['Prenom'];
                            $Id = $donnees['IdAdherent'];
                            $Organisateur = $donnees['Organisateur'];
                            //je stock mes variables dans des sessions
                            //
                            $cookie_name = "ticket";
                            // On génère quelque chose d'aléatoire
                            $ticket = session_id() . microtime() . rand(0, 9999999999);
                            // on hash pour avoir quelque chose de propre qui aura toujours la même forme
                            $ticket = hash('sha512', $ticket);
                            // On enregistre des deux cotés
                            setcookie($cookie_name, $ticket, time() + (60 * 10)); // Expire au bout de 20 min
                            $_SESSION['ticket'] = $ticket;

                            //session_start();


                            //si l'utilisateur est bien connecté le user_level = 1 , si il est organisateur user_level = 2
                            $_SESSION['user_level'] = 1 + $Organisateur;
                            $_SESSION['Nom'] = $Nom;
                            $_SESSION['Prenom'] = $Prenom;
                            $_SESSION['Id'] = $Id;
                            //message succes
                            $message_modal = ' Bravo ' . $Prenom . ' vous étes connecté';
                            $currentPage = 'accueil';
                        }
                    } else {
                        //si la requete ne trouve pas de ligne message fail
                        $message_modal = 'Identifiant ou mot de passe invalide';
                    }
                }
            }
        }
        else if ($_POST['formulaire'] == 'mail') {

            require './lib/vendor/PHPMailer-master/src/Exception.php';
            require './lib/vendor/PHPMailer-master/src/PHPMailer.php';
            require './lib/vendor/PHPMailer-master/src/SMTP.php';
            $body = $_POST['body'];
            $subject = $_POST['subject'];
            $expediteur = $_POST['expediteur'];
            $mailer = $_POST['mail'];
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'cda32.s1@gmail.com';                 // SMTP username
                $mail->Password = 'Motoclubcda32';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('cda32.s1@gmail.com', 'Azzedine');
                $mail->addAddress('cda32.s1@gmail.com', 'Azzedine');     // Add a recipient
//    $mail->addAddress('patrick.nardi@2isa.org');               // Name is optional
                $mail->addReplyTo($mailer, $expediteur);
//    $mail->addCC('jean-yves.fontenil@2isa.org');
//    $mail->addBCC('pauline.ivaldi-rancurel@2isa.org');

                //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject . ' de ' . $expediteur;
                $mail->Body = $body;
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $message_modal = 'Le mail a bien été envoyé';
            } catch (Exception $e) {
                $message_modal = 'Un problème est survenu' . ' ' . $mail->ErrorInfo;
            }

        }
    }
}




//test de la super global $_POST si elle n'est pas vide '!empty()'

/*if(!empty($_POST)){

    if (isset($_POST['formulaire'])) {

        if ($_POST['formulaire'] == 'register') {

            //var_dump($_POST);
            //hash du mot de passe


            $droit_image = $_POST["droit_image"] == 'on' ? 1 : 0;
            $cylindree = isset($_POST["cylindree"]) && !empty($cylindree) ? $_POST["cylindree"] : '';

            if (empty($_POST["nom"]) || empty($_POST["prenom"])) {

                $message_modal = 'Vous devez saisir un nom et un prénom.';

            } else {
                //verifier unicité du login ? - TP vérifier unicité du login et gerer la modal -> Login déja pris ?
                //quel algo à réaliser ?
                $query = 'INSERT INTO adherent(
            Login,
            Password,
            Nom,
            Prenom,
            DNaiss,
            Adresse1,
            CdPost,
            Ville,
            Email,
            Tel,
            certificat,
            droit_image,
            cylindree
            ) VALUES (
            "' . $_POST["login"] . '",
            "' . $hashed_password . '",
            "' . $_POST["nom"] . '",
            "' . $_POST["prenom"] . '",
            "' . $_POST["dnaiss"] . '",
            "' . $_POST["adresse1"] . '",
            "' . $_POST["cdpost"] . '",
            "' . $_POST["ville"] . '",
            "' . $_POST["email"] . '",
            "' . $_POST["tel"] . '",
            1,
            ' . $droit_image . ',
            "' . $cylindree . '"
            )';

                //echo "Query : ".$query;

                $bdd->query($query);

                //information modal html
                $message_modal = 'Inscription prise en compte, nous vous recontacterons.';
            }


        } else if ($_POST['formulaire'] == 'update_profil') {

            $query = 'UPDATE adherent SET 
              Login = "' . $_POST["login"] . '",
              Prenom = "' . $_POST["prenom"] . '",
              cylindree = "' . $_POST["cylindree"] . '"
              WHERE IdAdherent = ' . $_POST["IdAdherent"];

            //execution de la requete
            $bdd->query($query);

            //information modal html
            $message_modal = 'Votre profil est mis à jour.';

        }else if ($_POST['formulaire'] == 'update_news') {

            if(isset($_FILES['image'])) {

                //les différentes clef de $_FILES
                $fileName = $_FILES['image']['name']; //01.02.JPG
                $fileType = $_FILES['image']['type'];//type de fichier dans l'entete du fichier = manipulable
                $fileTmp = $_FILES['image']['tmp_name'];//nom temporaire du fichier sur le serveur APACHE avant traitement
                $fileError = $_FILES['image']['error'];
                $fileSize = $_FILES['image']['size'];

                //mes variable de config
                $limitSize = 2097152;//votre limitte d'acception de la taille du fichier
                $directory = "./img/upload/news/";
                $validExtention = array('png', 'jpeg', 'jpg', 'gif');

                //Trouver l'extention du fichier
                $nameArray = explode(".", $fileName); //array("01","JGP") -> 2 élements
                $lastIndex = count($nameArray) - 1;//total des éléments (2) mais je veux trouver le dernier index
                //array[0] = "01"
                //array[1] = "JPG"
                $extention = strtolower($nameArray[$lastIndex]);//deux elements dans le tb, mais -1 pour l'index du dernier element car index commence a zero

                //est-ce que l'extention est dans le tableau de mes extentions
                if (in_array($extention, $validExtention)) {

                    //nom de mon fichier
                    $photoName = time() . "." . $extention;

                    //la limite est elle valide ?
                    if ($limitSize > $fileSize) {
                        $message_modal = "upload";

                        //fonction d'upload sur le serveur
                        move_uploaded_file($fileTmp, $directory . $photoName);

                        //requete d'insertion dans la BD
                        $query = 'UPDATE nouvelle SET 
                          Image = "' . $photoName . '"
                          WHERE IdNouvelle = ' . $_POST["IdNouvelle"];
                        $bdd->query($query);

                    } else {

                        $message_modal = "extention non valide";

                    }


                } else {

                    $message_modal = "Fichier trop gros (" . ($limitSize / 1000000) . " Mo max)";

                }
            }

        }else if($_POST['formulaire'] == 'connexion'){

            if(isset($_POST['login']) AND isset($_POST['password'])) {

                //je teste si j'ai des données dans les $_POST
                if (!empty($_POST['login']) and !empty($_POST['password'])) {

                    $query = 'SELECT IdAdherent, Nom, Prenom, Admin FROM adherent WHERE Login = "'. $_POST['login'] . '" AND Password = "' . $_POST['password'] . '"';

                    //lancement de la requete
                    $reponse = $bdd->query($query);

                    //permet de déterminer le nombre d'enregistrement
                    if ($reponse->rowCount() == 1) {

                        //boucle les données récupérées
                        while ($donnees = $reponse->fetch()) {

                            $nom = $donnees['Nom'];
                            $prenom = $donnees['Prenom'];

                            //mes variables de session que je compléte
                            $_SESSION['id_adherent'] =  $donnees['IdAdherent'];
                            $_SESSION['nom'] = $nom;
                            $_SESSION['prenom'] = $prenom;

                            //ou 2 si admin (to be continued)
                            $user_level = 1;
                            if($donnees['Admin'] == 1){
                                $user_level = 2;
                            }
                            $_SESSION['user_level'] = $user_level;

                            $message_modal = "Bravo ".$prenom." ".$nom." vous êtes connecté!";

                            //retour page par default
                            $page = $homepage;

                        }

                    } else {
                        $message_modal = "Identifiant ou mot de passe invalide!";
                    };

                    //var_dump('mot de passe OK et login OK');

                }

            }

            //var_dump('vous essayer de vous connecter ?');

        }


    }
};
*/

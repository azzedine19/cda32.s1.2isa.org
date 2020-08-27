<?php
include('../config/config.php');

function register($data, $bdd) {
    //
    $login = $data->{"login"};
    $nom = $data->{"nom"};

    if(isset($data->{'cylindree'})){
        $cyl = $data->{'cylindree'};
    }else{
        $cyl = '';
    }

    $query = "Insert into adherent (Nom, Prenom, DNaiss, Adresse1, CdPost, Ville, Email, Tel, Login, Password, cylindree) values ( '". $data->{'nom'} ."' ,'" . $data->{'prenom'}. "','" . $data->{'dnaiss'}. "','" . $data->{'adresse1'}. "','" . $data->{'CDpostal'}. "','" . $data->{'Ville'}. "','" . $data->{'email'}. "','" . $data->{'Tel'}. "','" . $data->{'login'} . "','" . $data->{'Password'}. "','" . $cyl."')";

    $result = $bdd->exec($query);
    if($result > 0) {
        return true;
    }else return false;
}


if(isset($_POST["action"])) {
    switch ($_POST["action"]) {
        case "register":
            try {
                $result = register(json_decode($_POST["data"]), $bdd);
                $retour = array(
                    'success' => $result,
                    'data' => 'votre inscription a bien été prise en compte'
                );
                echo json_encode($retour);
            }catch (Exception $e) {
                $retour = array(
                    'success' => false,
                    'data' => array(
                        'error' => $e->getMessage() )
                );
                echo json_encode($retour);
            }
            break;

    }
}
<?php

//Server SGBD OVH
$bdd = new PDO(
    'mysql:host=37.187.114.142;dbname=cda32_bd1;charset=utf8',
    'cda32',
    '3523cda32');

//Server local dev
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Initialisation des variables
//valeur par default
$homepage = 'accueil';
$page = 'accueil';
$message_modal = '';
$wysiwyg = false;
$user_level = 0;

/* level = 0 = User non-connecté */
/* level = 1 = User connecté */
/* level = 2 = User connecté admin */

if(isset($_SESSION['user_level'])){
    $user_level = $_SESSION['user_level'];
}

//Petite NavBar en mode connecté
$NavBar = array('accueil'=>'Accueil',
                'activites'=>'Activités',
                'contact'=>'Contact',
                'galerie'=>'Galerie',
                'informations'=>'Informations',
                'presentation'=>'Présentation',
                'members'=>'Membres');
/*
$bdd = new PDO(
    'mysql:host=localhost:3308;dbname=cda03-bd1;charset=utf8',
    'root',
    '');
*/
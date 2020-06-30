<?php

$ar_pages = array(
    'accueil' => array(
        'title' => 'Bienvenue sur la page d\'accueil de l\'association',
        'libelle_menu' => 'Accueil'

    ),
    'activites' => array(
        'title' => 'Bienvenue sur la page d\'accueil de l\'association',
        'libelle_menu' => 'Activités'

    )

);
$page = 'accueil';


if(isset($_GET['page']) AND !empty($_GET['page']) ){
    $page = $_GET['page'];

}

$title = $ar_pages[$page]['title'];

include ('./includes/layout/header.php');
include ('./includes/pages/'.$page.'.php');
include ('./includes/layout/footer.php');




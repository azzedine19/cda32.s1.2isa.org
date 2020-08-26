<?php
include ('./config/config_exemple.php');
/*$ar_pages = array(
    'accueil' => array(
        'title' => 'Bienvenue sur la page d\'accueil de l\'association',
        'libelle_menu' => 'Accueil'

    ),
    'activites' => array(
        'title' => 'Bienvenue sur la page des activites de l\'association',
        'libelle_menu' => 'Activités'

    ),
    'blog' => array(
    'title' => 'Bienvenue sur la page du blog de l\'association',
    'libelle_menu' => 'blog'

    ),
    'contact' => array(
        'title' => 'Bienvenue sur la page contact de l\'association',
        'libelle_menu' => 'contact'

    ),
    'galerie' => array(
    'title' => 'Bienvenue sur la page galerie de l\'association',
    'libelle_menu' => 'galerie'

    ),
    'presentation' => array(
    'title' => 'Bienvenue sur la page presentation de l\'association',
    'libelle_menu' => 'presentation'

    ),
    'blog' => array(
    'title' => 'Bienvenue sur la page d\'inscription de l\'association',
    'libelle_menu' => 'inscription'

    ),
    'blog' => array(
    'title' => 'Bienvenue sur la page news de l\'association',
    'libelle_menu' => 'news'

),

);*/
$currentPage = 'accueil';


if(isset($_GET['page']) AND !empty($_GET['page']) ){
    $currentPage = $_GET['page'];

}
include ('./lib/methode_ajax.php');
include ('./includes/layout/header.php');
include ('./includes/pages/'.$currentPage.'.php');
include ('./includes/layout/footer.php');




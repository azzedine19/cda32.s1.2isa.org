<?php
//démarage des sessions

session_start();
//session_start();

if(isset($_SESSION['Nom'])){
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
}
include('./config/config.php');
include('./lib/functions.php');
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




include ('./lib/methode_get.php');
include ('./lib/methode_post.php');

include ('./includes/layout/header.php');
include ('./includes/pages/'.$currentPage.'.php');
include ('./includes/layout/footer.php');




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


$currentPage = 'accueil';


if(isset($_GET['page']) AND !empty($_GET['page']) ){
    $currentPage = $_GET['page'];

}




include ('./lib/methode_get.php');
include ('./lib/methode_post.php');

include ('./includes/layout/header.php');
include ('./includes/pages/'.$currentPage.'.php');
include ('./includes/layout/footer.php');




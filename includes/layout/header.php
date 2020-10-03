
<?php

 //Controller
 $query = "SELECT * FROM page;";
 $exec = $bdd->query($query);
 $pages = $exec->fetchAll();

 $menu = "";
foreach ($pages as $page) {

if ($currentPage == $page["key_file"]) {
    $currentPageObj = $page;
    $currentPageClass = "active";
} else {
    $currentPageClass = "";
}

     $menu = "";
     $currentPageObj = $page;
     $currentPageClass = "active";
    foreach ($NavBar as $key => $value) {
        if ($currentPage == $key) {
            $currentPageObj = $page;
            $currentPageClass = "active";
        } else {
            $currentPageClass = "";
        }
        $menu .= '<li class="nav-item '.$currentPageClass.'"><a href="./page-' . $key . '" class="nav-link">' . $value . '</a></li>';

    }

 }

/*else{
//if (isset($_SESSION['Id']))
 //{
     $menu .= '<li class="nav-item '.$currentPageClass.'"><a href="./index.php?page=' . $page["key_file"] . '" class="nav-link">' . $page["menu"] . '</a></li>';

 }
 }
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $currentPageObj["metatitle"]; ?></title>
    <meta name="description" content="<?php echo $currentPageObj["metadescription"]?>"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" type="image/png" sizes="128x128" href="./images/favicons/bike.png">
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicons/bike.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <!--- Open Street Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <!--- Summernote Wysiwyg -->
    <link rel="stylesheet" href="./vendor/summernote-0.8.18-dist/summernote.min.css" type="text/css">
    <!--- Mon fichier css -->
    <link rel="stylesheet" href="css/main.css?v=1.<?php echo time() ?>">
    <!-- Matomo -->
    <script type="text/javascript">
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//cda32.s1.2isa.org/matomo/";
            _paq.push(['setTrackerUrl', u+'matomo.php']);
            _paq.push(['setSiteId', '1']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>
    <!-- End Matomo Code -->
</head>
<body>
<?php include ('./includes/templ/modal.php');?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <i class='fas fa-motorcycle' style='font-size:40px;color:springgreen;margin-right: 30px'></i>
        <a class="navbar-brand" href="index.php">MC<span>MP</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <!--affichage de la boucle du menu basic -->
                <?php echo $menu; ?>
                <!--si il ya une session ID (si on est connecté) alors on affiche un menu dropdown avec les categories poiur adherent-->
                <?php if(isset($_SESSION['Id'])) { ?>
                    <div class="dropdown show mt-2">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['Prenom'].' '.$_SESSION['Nom']?>
                      </a>

                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <!--Compartiment menu admin-->
                          <?php
                          if ($_SESSION['user_level'] == 2) {
                          ?>
                              <a class="dropdown-item " href="./page-ajoutnews">Ajouter une information</a>
                              <a class="dropdown-item" href="./page-ajoutactivite">Ajouter une activité</a>
                              <a class="dropdown-item" href="./page-ajoutphoto">Ajouter une photo</a>
                              <a class="dropdown-item" href="./matomo/index.php">Statistiques du site</a>
                          <?php }?>
                          <!-- Fin menu admin -->
                        <a class="dropdown-item" href="./page-profil-<?php echo $_SESSION['Id'] ?>">Profil</a>
                        <a class="dropdown-item" href="./deconnexion-1">Déconnexion</a>
                      </div>
                    </div>
                    <!--sinon ( pas de session ouverte) on affiche connexion -->
                <?php }else{ ?>
                    <li class="nav-item "><a href="./page-inscription" class="nav-link">Inscription</a></li>
                 <li class="nav-item "><a href="./page-connexion" class="nav-link">Connexion</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

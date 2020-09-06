
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
 //if (isset($_SESSION['Id']))
 //{
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
        $menu .= '<li class="nav-item '.$currentPageClass.'"><a href="./index.php?page=' . $key . '" class="nav-link">' . $value . '</a></li>';

    }

 }/*else{

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

    <!--- Summernote Wysiwyg -->
    <link rel="stylesheet" href="./vendor/summernote-0.8.18-dist/summernote.min.css" type="text/css">
    <!--- Mon fichier css -->
    <link rel="stylesheet" href="css/main.css?v=1.<?php echo time() ?>">
</head>
<body>
<?php include ('./includes/templ/modal.php');?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
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
                    <div class="dropdown show">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['Prenom'].' '.$_SESSION['Nom']?>
                      </a>

                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="./index.php?page=profil&id=<?php echo $_SESSION['Id'] ?>">Profil</a>
                        <a class="dropdown-item" href="./index.php?deconnexion=1">Déconnexion</a>
                      </div>
                    </div>
                    <!--sinon ( pas de session ouverte) on affiche connexion -->
                <?php }else{ ?>
                    <li class="nav-item "><a href="./index.php?page=inscription" class="nav-link">Inscription</a></li>
                 <li class="nav-item "><a href="./index.php?page=connexion" class="nav-link">Connexion</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

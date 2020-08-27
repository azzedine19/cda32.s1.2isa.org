
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

     $menu .= '<li class="nav-item '.$currentPageClass.'"><a href="./index.php?page=' . $page["key_file"] . '" class="nav-link">' . $page["menu"] . '</a></li>';

 }

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

                <?php echo $menu; ?>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

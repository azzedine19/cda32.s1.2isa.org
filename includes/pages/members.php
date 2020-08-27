<main>

    <?php include('./includes/templ/head_breadcrumb.php') ?>

    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-3">Happy Clients</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">



    <?php

    //la requete
    $reponse = $bdd->query('SELECT * FROM adherent');

    //boucle les données récupérées
    while ($row = $reponse->fetch()) {

//        le template html du membre
        include('./includes/templ/member.php');

    }

    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
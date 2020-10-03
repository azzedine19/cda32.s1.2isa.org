<main>
    <?php include('./includes/templ/head_breadcrumb.php') ?>

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Inscrivez vous!</span>
                    <h2 class="mb-2">Nos dernières activités</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">

                                <?php
                                $reponse = $bdd->query('SELECT * FROM activite ORDER BY DDebut DESC LIMIT 16');
                                while ($donnees = $reponse->fetch()) {
                                    include('./includes/templ/activitesolo.php');
                                }?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>


<section class="ftco-section ftco-intro" style="background-image: url(images/viaduc.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">Voulez vous devenir membre!</h2>
                <a href="page-inscription" class="btn btn-primary btn-lg">Cliquez ici</a>
            </div>
        </div>
    </div>
</section>

</main>

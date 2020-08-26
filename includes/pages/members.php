<main>

    <?php include('./includes/tmpl/head_breadcrumb.php') ?>

    <section id="members" class="trainer-section spad">
        <div class="container">
            <div class="row">

                <?php

                //la requete
                $reponse = $bdd->query('SELECT * FROM adherent');

                //boucle les données récupérées
                while ($donnees = $reponse->fetch()) {

                    //le template html du membre
                    include('./includes/tmpl/member.php');

                }

                ?>
            </div>
        </div>
    </section>
</main>
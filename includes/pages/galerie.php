<main>

    <?php include('./includes/templ/head_breadcrumb.php') ?>

    <section class="ftco-section">


        <div class="container-fluid">
            <div class="row">
                <?php
                //la requete
                $query = 'SELECT P.Titre,P.DPhoto,P.Fichier, P.IdActivite, A.IdActivite, A.IdType FROM photo P JOIN activite A WHERE P.IdActivite = A.IdActivite  ' ;
                $reponse = $bdd->query($query);
                while($row = $reponse -> fetch()){
                    include('./includes/templ/photosolo.php');
                }
                ?>
            </div>
        </div>
    </section>
</main>

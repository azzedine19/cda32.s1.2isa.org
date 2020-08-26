<div class="single-member col-lg-4 col-md-6">
    <div class="single-trainer-item">
        <img src="img/trainer/trainer-1.jpg" alt="">
        <div class="trainer-text">
            <!-- tp Le lien H5 à modifier, uniquement dispo en user_level = 2 'admin', proposer un lien alternative ?  -->
            <h5><a href="./index.php?page=profil&id=<?php echo $donnees['IdAdherent']; ?>"><?php echo $donnees['Prenom'].' '.$donnees['Nom']; ?></a></h5>
            <span><?php echo $donnees['cylindree']; ?></span>
            <p>non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                voluptatem.</p>
            <div class="trainer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <?php if($user_level == 2){ ?>
                    <a href="./index.php?page=membres&action=delete&id=<?php echo $donnees['IdAdherent']; ?>" alt="Supprimer" title="Supprimer"><i class="fa fa-remove"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

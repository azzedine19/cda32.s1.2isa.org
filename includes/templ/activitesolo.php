<div class="item">
    <div class="car-wrap rounded ftco-animate">
        <!--<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);"> -->
        <div>
            <span class="img rounded d-flex align-items-md-end" style="background-image: url('uploads/images/activites/<?= $donnees['ImageAct'] ;?>')"></span>
        </div>
        <div class="text" >
            <h2 class="mb-2"><a href="#"></a><?php echo $donnees['IntituleActivite'] ;?></h2>
            <div class="d-flex mb-12">
                <span class="cat"><?php echo $donnees['Description'] ;?></span>
                <p class="date"> <?php echo $donnees['DDebut'] ;?> <span> /Date de debut</span></p>

                <p class="date"> <?php echo $donnees['DFin'] ;?> <span> /Date de fin</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="page-activite-<?php echo $donnees['IdActivite']; ?>" class="btn btn-primary py-2 mr-1">Consulter</a>
                <?php if(isset($_SESSION['user_level']) && $_SESSION['user_level'] > 1 ){ ?>
                <a href="page-activites-<?php echo $donnees['IdActivite']; ?>-delete" class="btn btn-secondary py-2 ml-1">Supprimer</a></p>
            <?php }?></div>
    </div>
</div>
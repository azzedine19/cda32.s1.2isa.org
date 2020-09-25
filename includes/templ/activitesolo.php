<div class="item">
    <div class="car-wrap rounded ftco-animate">
        <!--<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);"> -->
        <div>
            <span class="img rounded d-flex align-items-md-end" style="background-image: url('uploads/images/activites/<?= $donnees['ImageAct'] ;?>')"></span>
        </div>
        <div class="text block-50" id="activitesolo" >
            <h2 class="mb-2"><a href="#"></a><?php echo $donnees['IntituleActivite'] ;?></h2>
            <div class="">
                <span class="cat" id="descriptionact"><?php echo $donnees['Description'] ;?></span>
                <div>
                    <span> Date de debut :  <?php echo $donnees['DDebut'] ;?></span>
                </div>
                <div>
                    <span> Date de fin : <?php echo $donnees['DFin'] ;?></span>
                </div>
                <div>
                    <span> Date limite inscription :  <?php echo $donnees['DLimite'] ;?></span>
                </div>
                <div>
                    <span> Tarif adherent :  <?php echo $donnees['TarifAdherent'] ;?> €</span>
                </div>
                <div>
                    <span> Tarif Invité :  <?php echo $donnees['TarifInvite'] ;?> €</span>
                </div>
            </div>
            <p class="d-flex mb-0 d-block"><a href="page-activite-<?php echo $donnees['IdActivite']; ?>" class="btn btn-primary py-2 mr-1">Consulter</a>
                <?php if(isset($_SESSION['user_level']) && $_SESSION['user_level'] > 1 ){ ?>
                <a href="page-activites-<?php echo $donnees['IdActivite']; ?>-delete" class="btn btn-secondary py-2 ml-1">Supprimer</a></p>
            <?php }?></div>
    </div>
</div>
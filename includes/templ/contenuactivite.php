<div id="activite-details">
    <div class="car-wrap rounded ftco-animate">
        <!--<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);"> -->
        <div>
            <span class="img rounded d-flex align-items-md-end" style="background-image: url('uploads/images/activites/<?= $donnees['ImageAct'] ;?>')"></span>
        </div>
        <div class="text-black-50">
            <h2 class="mb-2"><a href="#"></a><?php echo $donnees['IntituleActivite'] ;?></h2>
            <div>
                <span class="cat"><?php echo $donnees['Description'] ;?></span>
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
        </div>
    </div>
</div>
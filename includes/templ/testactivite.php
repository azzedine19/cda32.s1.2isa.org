
<div class="item">
    <div class="car-wrap rounded ftco-animate">
        <!--<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);"> -->
        <div>
            <span class="img rounded d-flex align-items-md-end" style="background-image: url('uploads/images/activites/<?= $donnees['ImageAct'] ;?>')"></span>
        </div>
        <div class="text">
            <h2 class="mb-2"><a href="#"></a><?php echo $donnees['IntituleActivite'] ;?></h2>
            <div class="d-flex mb-12">
                <span class="cat"><?php echo $donnees['Description'] ;?></span>
                <p class="date"> <?php echo $donnees['DDebut'] ;?> <span> /Date de debut</span></p>

                <p class="date"> <?php echo $donnees['DFin'] ;?> <span> /Date de fin</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>

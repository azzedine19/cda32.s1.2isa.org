<div class="item">
    <div class="testimony-wrap rounded text-center py-4 pb-5">
        <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
        </div>
        <div class="text pt-4">
            <p class="mb-4">Membre.</p>
            <!-- affichage du Nom et prenom adherent-->
            <p class="name"><?php echo $row['Prenom'] .' '. $row['Nom']?></p>
            <?php if(isset($_SESSION['user_level']) && $_SESSION['user_level'] > 1 ){ ?>
            <a class="btn-icon-pop fs--1 fw-600 " href="./index.php?page=members&action=delete&id=<?php echo $row['IdAdherent']; ?>">Suprimer <span class="fa fa-remove" data-fa-transform="grow-10"></span></a>
            <?php } ?></div>
    </div>
</div>
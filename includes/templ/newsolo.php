<div class="row d-flex justify-content-center">

<div class="blog-entry justify-content-end m-auto">
    <a href="./page-information-<?php echo $idnews; ?>" class="img"<?php if($photo == ' ') { ?> style="background-image: url('images/image_1.jpg');"> <?php } else { echo '">'.'<img class="imgsize" src="'.$photo.'">';} ?>
    </a>
    <div class="text px-md-5 pt-4">
        <div class="meta mb-3">
            <div><a href="#"> Date de publication : </a> <?php echo $datenews; ?></div>
            <?php //<div><a href="#"><?php echo $usernews; ></a></div>?>
            </div>
        <h3 class="heading mt-2"><a href="#"><?php echo $titrenews; ?></a></h3>
        <p><?php echo $contenunews; ?></p>
        <p>
            <a href="page-information-<?php echo $idnews; ?>" class="btn btn-primary mb-4">Consulter <span class="icon-long-arrow-right"></span></a>
            <?php if (isset($_SESSION['user_level']) && $_SESSION['user_level'] > 1) { ?>
            <a href="page-information-<?php echo $idnews; ?>-delete" class="btn btn-danger mb-4">Supprimer <span class="icon-long-arrow-right"></span></a>
            <?php } ?>
        </p>
    </div>
</div>
</div>

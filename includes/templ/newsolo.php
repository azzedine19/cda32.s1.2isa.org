<div class="row d-flex justify-content-center">

<div class="blog-entry justify-content-end mb-md-5">
    <a href="./index.php?page=information&id=" class="block-20 img" style="background-image: url('images/image_1.jpg');">
    </a>
    <div class="text px-md-5 pt-4">
        <div class="meta mb-3">
            <div><a href="#"> Date de publication : </a> <?php echo $datenews; ?></div>
            <?php //<div><a href="#"><?php echo $usernews; ></a></div>?>
            </div>
        <h3 class="heading mt-2"><a href="#"><?php echo $titrenews; ?></a></h3>
        <p><?php echo $contenunews; ?></p>
        <p><a href="./index.php?page=information&id=<?php echo $idnews; ?>" class="btn btn-primary">Consulter <span class="icon-long-arrow-right"></span></a></p>
    </div>
</div>
</div>

<?php include('./includes/templ/head_breadcrumb.php') ?>


<div class="col-12 block-9 mb-md-5">
<form id="add-photo-form" class="bg-light p-5 " method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="formulaire" value="photo">

    <div class="form-group">
        <input type="text" class="form-control" name="Titre" placeholder="titre">
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" name="IdAdherent" value="<?php echo $_SESSION['Id'] ?>">
    </div>
    <div class="form-group">
        <select name="IdActivite">
            <?php
            //la requete
            $Reponse = $bdd->query('SELECT * FROM activite');
            //boucle les données récupérées
            while ($Donnees = $Reponse->fetch()) {
                ?>
                <option value="<?php echo $Donnees['IdActivite']; ?>"><?php echo $Donnees['IntituleActivite']; ?></option>
                <?php
            } ?>
        </select>    </div>
<div class="form-group text-center">
    <label for="Ajouter une photo" style="display: block">Ajouter une photo</label>
    <input id="upload-img-input" type="file" hidden class="form-control" name="Fichier" placeholder="Description">
    <img id="upload-img" src="images/placeholder-image.png"></img>
</div>
<div class="form-group text-center">
    <button  id="add-photo-submit" class="btn btn-primary py-3 px-5" >Ajouter une photo</button>
</div>
</form>
</div>
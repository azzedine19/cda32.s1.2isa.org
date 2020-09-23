<?php include ('./includes/templ/head_breadcrumb.php');?>
<div class="container">
    <div class="row d-flex mb-5">
        <div class="col-12 block-9 mb-md-5">
            <form id="add-activite-form" class="bg-light p-5 " method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="formulaire" value="activite">
                <div class="form-group">
                    <input type="number" class="form-control" name="IdAdherent" placeholder="Id Admin">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="IdType" placeholder="Id Type d'activité">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="IntituleActivite" placeholder="Intitulé de l'activité">
                </div>
                <div class="form-group">
                    <label for="Description">Date de début</label>
                    <input type="datetime-local" class="form-control" name="DDebut" placeholder="Date de début">
                </div>
                <div class="form-group">
                    <label for="Description">Date de fin</label>
                    <input type="datetime-local" class="form-control" name="DFin" placeholder="Date de fin">
                </div>
                <div class="form-group">
                    <label for="Description">Date limite pour s'inscrire</label>
                    <input type="datetime-local" class="form-control" name="DLimite" placeholder="Date limite pour s'inscrire">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="TarifAdherent" placeholder="Tarif adherent en €">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="TarifInvite" placeholder="Tarif invité en €">
                </div>
                <div class="form-group">
                        <label for="Description" style="display: block">Photo de couverture</label>
                        <input id="upload-img-input" type="file" hidden class="form-control" name="ImageAct" placeholder="Description">
                        <img id="upload-img" src="images/placeholder-image.png"></img>
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <input id="summernote" type="text" class="form-control" name="Description" placeholder="Description">
                </div>
                <div class="form-group">
                    <button id="add-activite-submit" class="btn btn-primary py-3 px-5" >Ajouter une activité</button>
                </div>
            </form>

        </div>
    </div>
</div>
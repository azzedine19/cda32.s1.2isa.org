<?php include ('./includes/templ/head_breadcrumb.php');?>
<div class="container">
    <div class="row d-flex mb-5">
        <div class="col-12 block-9 mb-md-5">
            <form class="bg-light p-5 " method="post">
                <input type="hidden" class="form-control" name="formulaire" value="activite">

                <div class="form-group">
                    <input type="text" class="form-control" name="IntituleActivite" placeholder="Intitulé de l'activité">
                </div>
                <div class="form-group">
                    <input type="datetime-local" class="form-control" name="DDebut" placeholder="">
                </div>
                <div class="form-group">
                    <input type="datetime-local" class="form-control" name="DFin" placeholder="">
                </div>
                <div class="form-group">
                    <input type="datetime-local" class="form-control" name="DLimite" placeholder="">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="TarifAdherent" placeholder="Tarif adherent en €">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="TarifInvite" placeholder="Tarif invité en €">
                </div>
                <div id ="summernote">
                </div>
                <div class="form-group">
                    <input type="submit" value="Ajouter une activité" class="btn btn-primary py-3 px-5">
                </div>
            </form>

        </div>
    </div>
</div>
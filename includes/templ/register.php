<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">


            <div class=""col-3"><h1><?php echo $Titre;?></h1></div>
            <div class="col-md-8 block-9 mb-md-5">
                <form id="<?php echo $action; ?>" action="#" class="bg-light p-5 contact-form">
                    <?php
                    if (isset($_GET['id'])&&!empty($_GET['id'])){ ?>
                        <input type="hidden" class="form-control" name="id" value="<?php  echo $_GET['id']?>" >
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Login" name="login" value="<?php  echo isset($login) ? $login : ''  ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nom" name="nom" value="<?php  echo isset($nom) ? $nom : ''  ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Prénom" name="prenom"value="<?php  echo isset($prenom) ? $prenom : ''  ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Date de naissance" name="dnaiss" value="<?php  echo isset($DateNaiss) ? $DateNaiss : ''  ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php  echo isset($Email) ? $Email : ''  ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Adresse" name="adresse1" value="<?php  echo isset($Adresse) ? $Adresse : ''  ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ville" name="Ville" value="<?php  echo isset($Ville) ? $Ville : ''  ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Code postal" name="CDpostal" value="<?php  echo isset($CodeP) ? $CodeP : ''  ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Téléphone" name="Tel" value="<?php  echo isset($Tel) ? $Tel : ''  ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Mot de passe" name="Password" value="<?php  echo isset($Password) ? $Password : ''  ?>"required >
                    </div>
                    <div class="col-lg-12">
                        <label for="mobile">Votre cylindrée</label>
                        <br>
                        <input type="radio" name="cylindree" value="125" <?php echo isset($cylindree) && $cylindree == "125" ? 'checked' : '';  ?>/>
                        <label for="mobile">125 cm3</label>
                        <hr>
                        <input type="radio" name="cylindree" value="250" <?php echo isset($cylindree) && $cylindree == "250" ? 'checked' : '';  ?>  />
                        <label for="mobile">250 cm3</label>
                        <hr>
                        <input type="radio" name="cylindree" value=">250" <?php echo isset($cylindree) && $cylindree == ">250" ? 'checked' : '';  ?>  />
                        <label for="mobile"> >250 cm3</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 px-5"><?php echo $btn_register;?> </button>
                </form>

            </div>
        </div>
    </div>
</section>


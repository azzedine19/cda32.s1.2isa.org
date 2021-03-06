<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
                <form action="#" class="bg-light p-5 contact-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Login" name="login">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nom" name="nom">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Prenom" name="prenom">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Date de naissance" name="dnaiss">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Adresse1" name="adresse1">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="CDpostal" name="CDpostal">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ville" name="Ville">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Tel" name="Tel">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Password" name="Password">
                    </div>
                    <div class="col-lg-12">
                        <label for="mobile">Votre cylindrée</label>
                        <br>
                        <input type="radio" name="cylindree" value="125 cm3" <?php echo isset($cylindree) && $cylindree == "125 cm3" ? 'checked' : '';  ?>/>
                        <label for="mobile">125 cm3</label>
                        <hr>
                        <input type="radio" name="cylindree" value="250 cm3" <?php echo isset($cylindree) && $cylindree == "250 cm3" ? 'checked' : '';  ?>  />
                        <label for="mobile">250 cm3</label>
                    </div>
                    <button type="submit" class="register-btn"><?php echo $btn_register; ?></button>
                    <div class="form-group">
                        <input type="submit" value="S'inscrire" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="map" class="bg-white"></div>
            </div>
        </div>
    </div>
</section>


<?php
include('./includes/templ/head_breadcrumb.php');
?>

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
                            <p><span>Adresse:</span> 32 avenue de la republique , Millau 12100</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>Telephone:</span> <a href="tel://1234567920">02 35 23 55 98</a></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">MCMP@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
                <form class="bg-light p-5 contact-form" method="post">
                    <input type="hidden" class="form-control" name="formulaire" value="mail">

                    <div class="form-group">
                        <input type="text" class="form-control" name="expediteur" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mail" placeholder="Votre Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Sujet">
                    </div>
                    <div class="form-group">
                        <textarea name="body" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Envoyer le Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="map2"></div>
            </div>
        </div>
    </div>
</section>


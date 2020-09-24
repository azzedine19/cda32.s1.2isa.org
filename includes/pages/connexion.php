<main>

    <!-- Breadcrumb Section Begin -->
    <?php include('./includes/templ/head_breadcrumb.php') ?>
    <!-- Breadcrumb Section End -->


    <section id="connexion" class="spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form">
                        <h4>Veuillez vous identifier</h4>
                        <form action="./index.php?page=connexion" method="post">
                            <input type="hidden" name="formulaire" value="connexion" />
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="login" placeholder="Votre identifiant">
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" name="password" placeholder="Votre mot de passe">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit">Connexion</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

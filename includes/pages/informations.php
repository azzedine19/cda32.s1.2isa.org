<main>
    <!-- Breadcrumb Section Begin -->
    <?php include('./includes/templ/head_breadcrumb.php') ?>
<section class="ftco-section">
    <div class="container">
<?php
$reponse = $bdd->query('SELECT * FROM nouvelle');
//boucle les données récupérées
while ($donnees = $reponse->fetch()) {
    //Mise du texte de la requête dans une variable
    $texte = $donnees['Texte'];
    //Décode du texte
    $texte = urldecode($texte);
    //Remplacement des balises titres par des espaces pour l'affichage dans la "mininews"
    $texte = str_replace('</h1>', '    ', $texte);
    $texte = str_replace('</h2>', '    ', $texte);
    $texte = str_replace('</h3>', '    ', $texte);
    $texte = str_replace('<script>', ' ', $texte);
    $texte = str_replace('</script>', ' ', $texte);
    $texte = str_replace('<style>', ' ', $texte);
    $texte = str_replace('</style>', ' ', $texte);
    //Balises enlevées
    $contenunews = strip_tags($texte);
    //Mise en variable de la donnée de l'ID de la news
    $idnews = $donnees['IdNouvelle'];
    $titrenews = $donnees['Titre'];
    $datenews = $donnees['DPubli'];
    //On inclus newsolo pour l'affichage de l'aperçu de la news.

    include('./includes/templ/newsolo.php');

}
?>
</main>
</div>
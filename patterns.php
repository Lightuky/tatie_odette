<?php
require_once 'includes/helpers.php';

$patterns = getPatterns();

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="Modèles simples">
    <title>Les modèles | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/patterns.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Seaweed+Script:400|Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Les modèles">
    <?php require_once('includes/head.php') ?>
    <script>
        $(function(){
            $(".filtering").on("click", "span", function () {
                const a = $(".gallery").isotope({});
                const e = $(this).attr("data-filter");
                a.isotope({ filter: e });
                $(this).addClass("active").siblings().removeClass("active");
            });
        })
    </script>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section class="u-clearfix u-section-1" id="carousel_5f27">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-custom-color-2 u-shape u-shape-rectangle u-shape-1"></div>
        <div class="u-container-style u-group u-image u-image-tiles u-image-1" data-image-width="100"
             data-image-height="100">
            <div class="u-container-layout u-container-layout-1"></div>
        </div>
        <div class="u-expanded-width-sm u-expanded-width-xs u-gallery u-layout-grid u-lightbox u-no-transition u-show-text-on-hover u-gallery-1">
            <div class="u-gallery-inner u-gallery-inner-1" style="grid-template-columns: repeat(2, auto);">
                <div class="u-effect-fade u-gallery-item">
                    <div class="u-back-slide">
                        <img class="u-back-image u-expanded"
                             src="images/3d-chrome-front-logo-mockup-modern-facade-sign_145275-181.jpg?rand=5ff7" alt="">
                    </div>
                    <div class="u-over-slide u-shading u-over-slide-1">
                        <h3 class="u-gallery-heading">Animaux</h3>
                        <p class="u-gallery-text"></p>
                    </div>
                </div>
                <div class="u-effect-fade u-gallery-item">
                    <div class="u-back-slide">
                        <img class="u-back-image u-expanded"
                             src="images/notebooks-mockup-with-black-element-black-background_24972-1167.jpg?rand=516f" alt="">
                    </div>
                    <div class="u-over-slide u-shading u-over-slide-2">
                        <h3 class="u-gallery-heading">Monuments</h3>
                        <p class="u-gallery-text"></p>
                    </div>
                </div>
                <div class="u-effect-fade u-gallery-item">
                    <div class="u-back-slide">
                        <img class="u-back-image u-expanded"
                             src="images/logo-mockup-close-up-white-paper_145275-125.jpg?rand=1305" alt="">
                    </div>
                    <div class="u-over-slide u-shading u-over-slide-3">
                        <h3 class="u-gallery-heading">Formes</h3>
                        <p class="u-gallery-text"></p>
                    </div>
                </div>
                <div class="u-effect-fade u-gallery-item">
                    <div class="u-back-slide" data-image-width="626" data-image-height="417">
                        <img class="u-back-image u-expanded"
                             src="images/3d-white-logo-mockup-black-facade-sign_145275-184.jpg?rand=4551" alt="">
                    </div>
                    <div class="u-over-slide u-shading u-over-slide-4">
                        <h3 class="u-gallery-heading">Lettres</h3>
                        <p class="u-gallery-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="u-container-style u-group u-group-2">
            <div class="u-container-layout u-valign-top u-container-layout-2">
                <h4 class="u-custom-font u-text u-text-1">
                    <span class="u-text-body-alt-color">Vous êtes en manque d'idées?</span>
                    <br>
                </h4>
                <p class="u-text u-text-2 mr-0">Imaginez et créez votre modèle !</p>
                <a href="#basePatternsList" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-2" style="margin: 35px auto 0 3px;">
                    Voir nos modèles
                </a>
                <div class="my-1 text-center w-50 font-weight-bold">OU</div>
                <a href="create-info" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-2 mt-0" style="margin: 35px auto 0px 16px;">
                    Créez le vôtre !
                </a>
            </div>
        </div>
        <div class="u-container-style u-group u-opacity u-opacity-65 u-white u-group-3">
            <div class="u-container-layout u-valign-middle u-container-layout-3">
                <h1 class="u-custom-font u-text u-text-custom-color-1 u-title u-text-3">Modèles simples</h1>
            </div>
        </div>
    </div>
</section>
<section class="u-clearfix u-section-2" id="basePatternsList">
    <div class="u-clearfix u-sheet u-sheet-1 text-center">
        <h2 class="u-custom-font u-text u-text-custom-color-1 u-text-1">Liste de nos modèles</h2>
        <h3 class="u-text u-text-custom-color-1 u-text-2 mt-3">Cliquez sur un modèle pour accéder à ses informations</h3>
    </div>
    <section>
        <div class="container my-5">
            <div class="row no-gutters">
                <div class="filtering col-sm-12 text-center">
                    <span data-filter="*" class="active">Tout</span>
                    <span data-filter=".architecture" class="">Architecture</span>
                    <span data-filter=".animaux" class="">Animaux</span>
                    <span data-filter=".formes" class="">Formes</span>
                </div>
                <div class="col-12 text-center w-100 mx-auto">
                    <div class="form-row gallery d-flex justify-content-center">
                        <?php foreach($patterns as $pattern): ?>
                            <div class="col-sm-3 col-lg-2 mb-2 <?php echo $pattern['category'] ?>">
                                <a href="pattern-info?id=<?php echo $pattern['id'] ?>">
                                    <div class="portfolio-wrapper">
                                        <div class="portfolio-image">
                                            <img src="images/patterns/base/<?php echo $pattern['picture'] ?>" alt="<?php echo $pattern['name'] ?>">
                                        </div>
                                        <div class="portfolio-overlay">
                                            <div class="portfolio-content">
                                                <h4><?php echo $pattern['name'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php require_once('includes/footer.php') ?>
</body>
</html>
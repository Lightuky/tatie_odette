<?php
require_once 'includes/helpers.php';

$pattern_id = isset($_GET['id']) ? $_GET['id'] : null;
$pattern = getPattern($pattern_id);

if (!$pattern) {
    $pathError =  "/tatie_odette/404.php";
    header('Location: '. $pathError);
}

require_once 'includes/header.php';

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="">
    <title>Modèle | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/pattern-info.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Seaweed+Script:400|Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Modèle">
    <?php require_once('includes/head.php') ?>
    <script type="text/javascript" src="resources/js/pattern-info.js"></script>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section>
    <div class="container">
        <h2 class="u-custom-font u-text u-text-custom-color-1 u-text-1 text-center mt-4 mb-2"><?php echo ucfirst($pattern['name'])?></h2>
        <div class="d-flex mt-2 mb-4" id="patternInfoBlock">
            <div class="w-75 mr-5">
                <h6 class="h6 pb-3">Personnalisation de la pièce</h6>
                <div class="d-flex mt-3" style="border-bottom: 2px solid rgba(217,216,216,0.29);">
                    <div class="d-flex" style="flex-direction: column;">
                        <img src="images/patterns/base/<?php echo $pattern['picture'] ?>" class="patternImg" alt="<?php echo $pattern['name'] ?>">
                        <div class="h5 text-center mb-2 mt-3 mx-5" style="border: none;">Options</div>
                    </div>
                    <div class="mx-5 w-100">
                        <div class="h5 text-center mb-2 mx-5 pb-2">Description</div>
                        <div class="text-muted text-center my-3"><small><?php echo $pattern['description'] ?></small></div>
                        <div class="h5 text-center mb-3 mx-5 pb-2">Catégorie</div>
                        <div class="text-center pt-1" style="color: #8d8377;"><?php echo ucfirst($pattern['category']) ?></div>
                    </div>
                </div>
                <div class="patternOrderOptions mt-3 d-flex justify-content-around text-center">
                    <div class="patternOrderOptionsCol">
                        <button id="patternOptionType" class="btn">Type de chocolat</button>
                        <div class="row m-3 mt-4 d-none">
                            <div class="col-4"><div class="btn patternOptionTypeBtn patternOptionsActive">Noir</div></div>
                            <div class="col-4"><div class="btn patternOptionTypeBtn">Lait</div></div>
                            <div class="col-4"><div class="btn patternOptionTypeBtn">Blanc</div></div>
                        </div>
                    </div>
                    <div class="patternOrderOptionsCol">
                        <button id="patternOptionWeight" class="btn">Poids de la pièce</button>
                        <div class="row m-3 mt-4 d-none">
                            <div class="col-6"><div class="btn patternOptionWeightBtn patternOptionsActive">20g</div></div>
                            <div class="col-6"><div class="btn patternOptionWeightBtn">50g</div></div>
                        </div>
                    </div>
                    <div class="patternOrderOptionsCol">
                        <button id="patternOptionText" class="btn">Texte à graver</button>
                        <div class="row mx-3 mt-1 d-none">
                            <p class="text-muted small m-0 w-100">(10 lettres maximum)</p>
                            <div class="col-4 m-auto"><div class="btn patternOptionTextBtn patternOptionsActive">Vide</div></div>
                            <div class="col-8">
                                <div class="btn p-0 patternOptionTextInput">
                                    <input type="text" maxlength="10" class="form-control p-0 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-25 ml-2">
                <h6 class="h6 pb-3">Récapitulatif</h6>
                <div class="patternOrderRecap mt-4 small" style="color: #9d8771">
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Nom du modèle</div>
                        <div><?php echo ucfirst($pattern['name'])?></div>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Catégorie</div>
                        <div><?php echo ucfirst($pattern['category'])?></div>
                    </div>
                    <div class="h5 mt-3"></div>
                    <div class="d-flex justify-content-between mb-2 mt-4">
                        <div class="font-weight-bolder">Type de chocolat</div>
                        <div class="orderRecapType">Noir</div>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Poids de la pièce</div>
                        <div class="orderRecapWeight">20g</div>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Texte gravé</div>
                        <div class="orderRecapText">Vide</div>
                    </div>
                </div>
                <form method="post" action="assets/order.php?r=b" class="patternOrderForm mt-4">
                    <input type="hidden" id="pattern_id" name="pattern_id" value="<?php echo $pattern['id'] ?>">
                    <input type="hidden" id="category" name="category" value="<?php echo $pattern['category'] ?>">
                    <input type="hidden" id="chocolate_type" name="chocolate_type" value="Noir">
                    <input type="hidden" id="chocolate_weight" name="chocolate_weight" value="20g">
                    <input type="hidden" id="chocolate_text" name="chocolate_text" value="Vide">
                    <?php if (isset($_SESSION['auth_id'])): ?>
                        <button type="submit" class="btn text-light w-100" style="background-color: #a99b8e">Commander</button>
                    <?php else: ?>
                        <a href="login.php" class="btn text-light w-100" style="background-color: #a99b8e">Commander</a>
                    <?php endif; ?>
                </form>
                <div class="h5 mt-4"></div>
                <div class="text-muted" style="font-size: 71%; font-weight: 300;">
                    <div class="font-weight-bolder text-center">Remboursements:</div>
                    <div class="text-justify">
                        <br>Pour tout dégâts causés durant l'impression avec nos machines Tatie Odette, veuillez contacter le siège
                        Tatie Odette (informations sur la page Contact). Le montant de votre remboursement variera selon le degré de dégât constaté.<br>
                        <br>Si l'impression vous déçoit, vous serez remboursé 20% du prix payé.<br>
                        <br>Nous vous remercions pour votre compréhension.<br>
                        <br>Pour toutes informations complémentaires, n'hésitez-pas à nous contacter !
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('includes/footer.php') ?>
</body>
</html>
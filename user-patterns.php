<?php
require_once 'includes/helpers.php';

date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, array('fr_FR.UTF-8','french.UTF-8'));

$pattern_identifiers = [
    ["name" => "Coeur", "picture" => "choc-creator-v2-chocolat1.jpg"], ["name" => "Fleur et coeur", "picture" => "choc-300x282.png"],
    ["name" => "Flocons", "picture" => "flocon-en-chocolat-imprime-en-3d-1.jpg"], ["name" => "Octogone rempli", "picture" => "choc-creator-v2-chocolat3.jpg"],
    ["name" => "Cylindre spiralé", "picture" => "5e466aee3b62b74f4b7a89a3.png"], ["name" => "Alvéoles", "picture" => "GenacheBLOG1.jpg"],
    ["name" => "Big Ben", "picture" => "chocolate-clock-tower.jpg"], ["name" => "Tour Eiffel", "picture" => "poche-tour-eiffel-fondant.jpg"],
    ["name" => "Arc de Triomphe", "picture" => "arc_triomphe_lait1-510x510.jpg"], ["name" => "Poule", "picture" => "miam-factory-480x280.png"],
    ["name" => "Chat porte-bonheur", "picture" => "20191009093448959.jpg"], ["name" => "Ourson", "picture" => "1478387096279.jpg"],
];
$pattern_picture = $img_src = "";
$userPatternFav = [];
$user_pattern_id = isset($_GET['id']) ? $_GET['id'] : null;
$user_pattern = getUserPattern($user_pattern_id);

if (!$user_pattern) {
    $pathError =  "/tatie_odette/404.php";
    header('Location: '. $pathError);
}

for ($i = 0; $i <= 11; $i++):
    if($pattern_identifiers[$i]['name'] == $user_pattern['pattern_identifier']):
        $pattern_picture = $pattern_identifiers[$i]['picture'];
    endif;
endfor;

if($user_pattern['piece_type'] == "Formes"):
    $img_src = "images/" . $pattern_picture;
else:
    $img_src =  "https://via.placeholder.com/560x560.png?text=" . preg_replace('/\s+/', '+', $user_pattern['chocolate_text']);
endif;

require_once 'includes/header.php';

if (isset($_SESSION['auth_id'])):
    $userPatternFav = getUserFavoritePattern($user_pattern_id, "u", $_SESSION['auth_id']);
endif;

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="">
    <title>Mon modèle | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/pattern-info.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Mes modèles">
    <?php require_once('includes/head.php') ?>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section>
    <div class="container">
        <h2 class="u-custom-font u-text u-text-custom-color-1 u-text-1 text-center mt-4 mb-2"><?php echo ucfirst($user_pattern['name'])?></h2>
        <div class="d-flex mt-2 mb-4" id="patternInfoBlock">
            <div class="w-75 mr-5">
                <h6 class="h6 pb-3">Personnalisation de la pièce</h6>
                <div class="d-flex mt-3">
                    <div class="d-flex" style="flex-direction: column;">
                        <img src="<?php echo $img_src ?>" class="patternImg" alt="<?php echo $user_pattern['name'] ?>" style="width: 280px; height: 280px">
                    </div>
                    <div class="mx-5 w-100">
                        <div class="h5 text-center my-2 mx-5 pb-2">Description</div>
                        <div class="text-muted text-center my-5"><small><?php echo $user_pattern['description'] ?></small></div>
                        <?php if ($user_pattern['piece_type'] == "Formes"): ?>
                        <div class="h5 text-center my-5 mx-5 py-2">Catégorie</div>
                        <div class="text-center pt-1" style="color: #8d8377;"><?php echo ucfirst($user_pattern['category']) ?></div>
                        <?php else: ?>
                        <div class="h5 text-center mb-4 mt-1 mx-5 py-2">Texte gravé</div>
                        <div class="text-center pt-1" style="color: #8d8377;"><?php echo ucfirst($user_pattern['chocolate_text']) ?></div>
                        <div class="h5 text-center mb-4 mt-5 mx-5 py-2">Couleur du texte gravé</div>
                        <div class="text-center pt-1" style="color: #8d8377;"><?php echo ucfirst($user_pattern['chocolate_text_type']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="w-25 ml-2">
                <h6 class="h6 pb-3">Récapitulatif</h6>
                <div class="patternOrderRecap mt-4 small" style="color: #9d8771">
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Nom du modèle</div>
                        <div><?php echo ucfirst($user_pattern['name'])?></div>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Description</div>
                        <div><?php echo ucfirst($user_pattern['description'])?></div>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Type de pièce</div>
                        <div><?php echo ucfirst($user_pattern['piece_type'])?></div>
                    </div>
                    <?php if ($user_pattern['piece_type'] == "Formes"): ?>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Catégorie</div>
                        <div><?php echo ucfirst($user_pattern['category'])?></div>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Identifiant de la pièce</div>
                        <div><?php echo ucfirst($user_pattern['pattern_identifier'])?></div>
                    </div>
                    <?php endif; ?>
                    <div class="h5 mt-3"></div>
                    <div class="d-flex justify-content-between mb-2 mt-4">
                        <div class="font-weight-bolder">Type de chocolat</div>
                        <div class="orderRecapType"><?php echo ucfirst($user_pattern['chocolate_type'])?></div>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Poids de la pièce</div>
                        <div class="orderRecapWeight"><?php echo ucfirst($user_pattern['chocolate_weight'])?></div>
                    </div>
                    <?php if ($user_pattern['piece_type'] == "Formes"): ?>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Texte gravé</div>
                        <div class="orderRecapText"><?php echo ucfirst($user_pattern['chocolate_text'])?></div>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="font-weight-bolder">Couleur du texte gravé</div>
                        <div class="orderRecapText"><?php echo ucfirst($user_pattern['chocolate_text_type'])?></div>
                    </div>
                    <?php endif; ?>
                </div>
                <form method="post" action="assets/order.php?r=b" class="patternOrderForm mt-4 text-center">
                    <input type="hidden" id="pattern_id" name="pattern_id" value="<?php echo $user_pattern['id'] ?>">
                    <input type="hidden" id="category" name="category" value="<?php echo $user_pattern['category'] ?>">
                    <input type="hidden" id="chocolate_type" name="chocolate_type" value="<?php echo $user_pattern['chocolate_type'] ?>">
                    <input type="hidden" id="chocolate_weight" name="chocolate_weight" value="<?php echo $user_pattern['chocolate_weight'] ?>">
                    <input type="hidden" id="chocolate_text" name="chocolate_text" value="<?php echo $user_pattern['chocolate_text'] ?>">
                    <input type="hidden" id="chocolate_text_type" name="chocolate_text_type" value="<?php echo $user_pattern['chocolate_text_type'] ?>">
                    <?php if (isset($_SESSION['auth_id'])): ?>
                        <button type="submit" class="btn text-light w-100" style="background-color: #a99b8e">Commander</button>
                        <div class="small text-muted my-3">OU</div>
                        <?php if(!$userPatternFav): ?>
                            <a class="btn text-light" style="background-color: #76be8c;" href="assets/favorites?id=<?php echo $user_pattern['id'] ?>&t=u&a=a">Ajouter en favori</a>
                        <?php else: ?>
                            <a class="btn text-light" style="background-color: #ec604c;" href="assets/favorites?id=<?php echo $user_pattern['id'] ?>&t=u&a=d">Retirer des favori</a>
                        <?php endif; ?>
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
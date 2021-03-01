<?php
require_once 'includes/helpers.php';

$order_number = isset($_GET['n']) ? $_GET['n'] : null;
$referer = isset($_GET['r']) ? $_GET['r'] : null;
$order = getOrderByNumber($order_number);

if (!$order) {
    $pathError =  "/tatie_odette/404.php";
    header('Location: '. $pathError);
}

require_once 'includes/header.php';

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="">
    <title>Merci ! | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/pattern-info.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Seaweed+Script:400|Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Merci !">
    <?php require_once('includes/head.php') ?>
    <script type="text/javascript" src="resources/js/pattern-info.js"></script>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section>
    <section>
        <div class="container d-flex align-items-center my-5">
            <div class="card text-center mx-auto p-5">
                <div class="card-header rounded ">
                    <h3 class="card-title">Merci pour votre achat !</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">Voici votre code à entrer sur la machine pour commencer votre impression : </p>
                    <p class="h3 font-weight-bold"><?php echo $order['reception_code'] ?></p>
                    <a href="index" class="btn text-light" style="background-color: #7c7069">Continuer à explorer</a>
                </div>
            </div>
        </div>
    </section>
</section>
<?php require_once('includes/footer.php') ?>
</body>
</html>
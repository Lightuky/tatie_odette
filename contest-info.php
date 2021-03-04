<?php
require_once 'includes/helpers.php';

$contest_id = isset($_GET['id']) ? $_GET['id'] : null;
$contest = getContest($contest_id);

if (!$contest) {
    $pathError =  "/tatie_odette/404.php";
    header('Location: '. $pathError);
}

require_once 'includes/header.php';

if (isset($_SESSION['auth_id'])):
    $userPatterns = getUserPatterns($_SESSION['auth_id']);
endif;

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="">
    <title>Participer au concours | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/contests.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Seaweed+Script:400|Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Concours">
    <?php require_once('includes/head.php') ?>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section>
    <h1 class="u-custom-font u-text u-text-custom-color-3 u-text-1 text-center mt-5 contestInfoTitle"><?php echo ucfirst($contest['name']) ?></h1>
    <div class="text-center h6 small mb-3">(Cliquez sur un de vos modèles pour participer avec lui. <b>Ne peut être changé.</b>)</div>
    <div class="userPatternsSubmit w-75 mx-auto my-5">
        <?php if(isset($_SESSION['auth_id'])):
            foreach($userPatterns as $userPattern): ?>
                <a href="assets/contest-submit?id=<?php echo $userPattern['id'] ?>&cid=<?php echo $contest['id'] ?>" class="contestBlock d-flex justify-content-between text-center p-3 my-2 rounded text-decoration-none" style="border: 2px solid #efa940!important;">
                    <div class="u-text u-text-custom-color-3 mx-0 h5 mb-0 ml-3" style="width: 175px"><?php echo ucfirst($userPattern['name']) ?></div>
                    <div class="u-text-custom-color-3 h6 mb-0 my-auto" style="width: 175px">Type : <?php echo $userPattern['piece_type'] ?></div>
                    <?php if($userPattern['piece_type'] == "Formes"): ?>
                        <div class="u-text u-hover small mx-0 u-text-custom-color-3 my-auto w-25" style="width: 175px"><?php echo $userPattern['category'] ?></div>
                        <div class="u-text small mx-0 u-text-custom-color-3 my-auto" style="width: 175px"><?php echo $userPattern['pattern_identifier'] ?></div>
                        <div class="u-text small mx-0 u-text-custom-color-3 my-auto" style="width: 175px"><?php echo $userPattern['chocolate_type'] ?></div>
                        <div class="u-text small mx-0 u-text-custom-color-3 my-auto" style="width: 175px"><?php echo $userPattern['chocolate_weight'] ?></div>
                        <div class="u-text small mx-0 u-text-custom-color-3 my-auto" style="width: 175px"><?php echo $userPattern['chocolate_text'] ?></div>
                        <div class="u-text small mx-0 u-text-custom-color-3 my-auto" style="width: 175px"><?php echo $userPattern['chocolate_text_type'] ?></div>
                    <?php else: ?>
                        <div class="u-text small mx-0 u-text-custom-color-3 my-auto" style="width: 175px"><?php echo $userPattern['chocolate_type'] ?></div>
                        <div class="u-text small mx-0 u-text-custom-color-3 my-auto" style="width: 175px"><?php echo $userPattern['chocolate_weight'] ?></div>
                        <div class="u-text small mx-0 u-text-custom-color-3 my-auto" style="width: 175px"><?php echo $userPattern['chocolate_text'] ?></div>
                        <div class="u-text small mx-0 u-text-custom-color-3 my-auto" style="width: 175px"><?php echo $userPattern['chocolate_text_type'] ?></div>
                    <?php endif; ?>
                </a>
            <?php endforeach;
        endif; ?>
    </div>
</section>
<?php require_once('includes/footer.php') ?>
</body>
</html>
<?php
require_once 'includes/header.php';
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.UTF8');

$contests = getContests();
$endedContests = $currentContests = $currentContestSubmit = [];
$current_datetime = date('Y-m-d H:i:s');
foreach ($contests as $key => $contest):
    if ($contest['end_date'] < $current_datetime):
        $winnerContestPattern = getContestWinnerPattern($contest['id']);
        $contest['winner_pattern_name'] = getUserPattern($winnerContestPattern['pattern_id'])['name'];
        $contest['winner_pattern'] = $winnerContestPattern['pattern_id'];
        $contest['winner_user_name'] = getUser($winnerContestPattern['creator_id'])['first_name'] . " " . getUser($winnerContestPattern['creator_id'])['last_name'];
        $contest['winner_votes'] = $winnerContestPattern['votes'];
        $endedContests[$key] = $contest;
    else:
        $currentContests = $contest;
    endif;
endforeach;

if (isset($_SESSION['auth_id'])):
    $currentContestSubmit = getUserContestPatterns($_SESSION['auth_id'], $currentContests['id']);
endif;

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="">
    <title>Liste des Concours | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/contests.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Seaweed+Script:400|Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Concours">
    <link rel="shortcut icon" type="image/ico" href="images/favicon/logo.ico"/>
    <?php require_once('includes/head.php') ?>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>


<section class="u-align-center u-clearfix u-section-1" id="sec-1306">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h1 class="u-custom-font u-text u-text-custom-color-3 u-text-1">Liste des concours</h1>
    </div>
</section>
<section class="u-clearfix u-section-2" id="sec-b5ba">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-3 u-border-grey-40 u-container-style u-group u-group-1 mt-0">
            <div class="u-container-layout u-container-layout-1">
                <?php if ($currentContests): ?>
                    <h2 class="u-align-center u-custom-font u-text u-text-custom-color-3 u-text-1"><?php echo $currentContests['name'] ?></h2>
                    <h4 class="u-align-center u-custom-font u-text u-text-2 currentEventTheme mt-3">Thème : <?php echo $currentContests['theme'] ?></h4>
                    <p class="u-align-center u-text u-text-2">Date de fin : <?php echo date('d/m/Y', strtotime($currentContests['end_date'])) ?> à <?php echo date('H:i', strtotime($currentContests['end_date'])) ?></p>
                    <div class="u-border-3 u-border-custom-color-3 u-line u-line-horizontal u-line-1" style="color: #d7bb99;"></div>
                    <?php if (isset($_SESSION['auth_id'])): ?>
                        <?php if(!$currentContestSubmit): ?>
                            <a href="contest-info?id=<?php echo $currentContests['id'] ?>" class="u-border-2 u-btn u-btn-round u-none u-radius-50 u-btn-1" id="JoinContest">Participer</a>
                        <?php else: ?>
                            <div class="u-border-2 u-btn u-btn-round u-none u-radius-50 u-btn-1" id="JoinContest">Déja participé !</div>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="login" class="u-border-2 u-btn u-btn-round u-none u-radius-50 u-btn-1" id="JoinContest">Participer</a>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="text-center h3 mt-4" style="color: #d7bb99;">Aucun concours ouvert actuellement</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="u-align-center u-clearfix u-section-3" id="sec-5cf1">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-custom-font u-text u-text-custom-color-3 u-text-1 mt-0">Concours terminés</h2>
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="d-flex justify-content-around">
                    <?php foreach($endedContests as $endedContest): ?>
                        <div class="contestBlock d-flex flex-column text-center p-4 rounded" style="border: 2px solid #efa940!important;">
                            <h3 class="u-custom-font u-text u-text-custom-color-3 mx-0"><?php echo ucfirst($endedContest['name']) ?></h3>
                            <h6 class="u-text-custom-color-3 mt-3">Thème : <?php echo $endedContest['theme'] ?></h6>
                            <p class="u-text small mx-0 my-2">Terminé le : <i class="text-muted"><?php echo date('d/m/Y', strtotime($endedContest['end_date'])) ?></i></p>
                            <p class="u-text mx-0 my-2 small">Modèle gagnant : <i class="text-muted"><?php echo ucfirst($endedContest['winner_pattern_name']) ?></i></p>
                            <p class="u-text mx-0 my-2 small">Par : <i class="text-muted"><?php echo ucfirst($endedContest['winner_user_name']) ?></i></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('includes/footer.php') ?>
</body>
</html>
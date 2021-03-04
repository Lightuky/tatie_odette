<?php
require_once 'includes/header.php';

$errored = isset($_GET['errored']) ? $_GET['errored'] : null;

if (empty($errored)):
    $_SESSION['fields'] = [];
endif;

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="">
    <title>Connexion | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/contests.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Connexion">
    <?php require_once('includes/head.php') ?>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section>
    <div class="container w-50">
        <div class="my-5" style="padding: 60px 0!important;">
            <h2 style="color: #62513f;">Connectez-vous</h2>
            <form method="post" action="assets/login.php" style="color: #95816d" id="loginForm">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="exemple@exemple.com" class="form-control"
                           value="<?php echo($errored ? ((isset($_SESSION['fields']["email"])) ? $_SESSION['fields']["email"]['old'] : NULL) : NULL) ?>"
                           required>
                    <div class="errors form-text text-muted" style="margin-bottom: 10px;">
                        <?php echo (isset($_SESSION['fields']["email"])) ? $_SESSION['fields']["email"]['error'] : NULL ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <div class="errors form-text text-muted" style="margin-bottom: 10px;">
                        <?php echo (isset($_SESSION['fields']["password"])) ? $_SESSION['fields']["password"]['error'] : NULL ?>
                    </div>
                </div>
                <div>
                    <div style="display: flex">
                        <button type="submit" class="btn text-light" style="background-color: #a99b8e">Se Connecter</button>
                        <a href="register.php" class="btn text-light ml-5" style="background-color: #7c7069">Créer un compte</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php require_once('includes/footer.php') ?>
</body>
</html>
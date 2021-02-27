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
    <title>Inscription | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/contests.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Inscription">
    <?php require_once('includes/head.php') ?>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section>
    <div class="container w-50">
        <div class="mb-5" style="padding: 30px 0!important;">
            <h2 style="color: #62513f;">Création de compte</h2>
            <form method="post" action="assets/register.php" style="color: #95816d">
                <div class="form-group">
                    <label for="first_name">Prénom</label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                           value="<?php echo($errored ? ((isset($_SESSION['fields']["first_name"])) ? $_SESSION['fields']["first_name"]['old'] : NULL) : NULL) ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="last_name">Nom</label>
                    <input type="text" name="last_name" id="last_name" class="form-control"
                           value="<?php echo($errored ? ((isset($_SESSION['fields']["last_name"])) ? $_SESSION['fields']["last_name"]['old'] : NULL) : NULL) ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="birth_date">Date de naissance</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control"
                           value="<?php echo($errored ? ((isset($_SESSION['fields']["birth_date"])) ? $_SESSION['fields']["birth_date"]['old'] : NULL) : NULL) ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="exemple@exemple.com"
                           value="<?php echo($errored ? ((isset($_SESSION['fields']["email"])) ? $_SESSION['fields']["email"]['old'] : NULL) : NULL) ?>"
                           required>
                    <div class="errors form-text text-danger small" style="margin-bottom: 10px;">
                        <?php echo (isset($_SESSION['fields']["email"])) ? $_SESSION['fields']["email"]['error'] : NULL ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone_number">Numéro de téléphone</label>
                    <input type="tel" id="phone_number" name="phone_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirmer le mot de passe</label>
                    <input type="password" name="password-confirm" id="password-confirm" class="form-control" required>
                    <div class="errors form-text text-danger small" style="margin-bottom: 10px;">
                        <?php echo (isset($_SESSION['fields']["password"])) ? $_SESSION['fields']["password"]['error'] : NULL ?>
                    </div>
                </div>
                <div>
                    <div style="display: flex">
                        <a href="login.php" class="btn text-light" style="margin-right: 35px; background-color: #7c7069">Retour</a>
                        <button type="submit" class="btn text-light" style="background-color: #a99b8e">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php require_once('includes/footer.php') ?>
</body>
</html>
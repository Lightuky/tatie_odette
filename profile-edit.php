<?php
require_once 'includes/header.php';

if (!isset($_SESSION['auth_id'])):
    $pathError = "/tatie_odette/login.php";
    header('Location: ' . $pathError);
endif;

$errored = isset($_GET['errored']) ? $_GET['errored'] : null;
if (empty($errored)):
    $_SESSION['fields'] = [];
endif;

$user = getUser($_SESSION['auth_id']);

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="">
    <title>Éditer le profil | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/profile.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Éditer le profil">
    <?php require_once('includes/head.php') ?>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section>
    <div class="container w-50">
        <div class="mb-5" style="padding: 30px 0!important;">
            <h2 style="color: #62513f;">Éditer mes infos</h2>
            <form method="post" action="assets/edit-user.php?id=<?php echo $user['id'] ?>" style="color: #95816d">
                <div class="form-group">
                    <label for="first_name">Prénom</label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                           value="<?php echo($errored ? ((isset($_SESSION['fields']["first_name"])) ? $_SESSION['fields']["first_name"]['old'] : NULL) : $user['first_name']) ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="last_name">Nom</label>
                    <input type="text" name="last_name" id="last_name" class="form-control"
                           value="<?php echo($errored ? ((isset($_SESSION['fields']["last_name"])) ? $_SESSION['fields']["last_name"]['old'] : NULL) : $user['last_name']) ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="birth_date">Date de naissance</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control"
                           value="<?php echo($errored ? ((isset($_SESSION['fields']["birth_date"])) ? $_SESSION['fields']["birth_date"]['old'] : NULL) : $user['birth_date']) ?>">
                </div>
                <div class="form-group">
                    <label for="phone_number">Numéro de téléphone</label>
                    <input type="tel" id="phone_number" name="phone_number" class="form-control" value="<?php echo $user['phone_number'] ?>">
                </div>
                <div>
                    <div style="display: flex">
                        <a href="profile?id=<?php echo $user['id'] ?>" class="btn text-light" style="margin-right: 35px; background-color: #7c7069">Retour</a>
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
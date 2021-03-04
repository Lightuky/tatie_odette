<?php
require_once 'includes/helpers.php';
date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, array('fr_FR.UTF-8','french.UTF-8'));

$user_id = isset($_GET['id']) ? $_GET['id'] : null;
$user = getUser($user_id);
$userPatterns = getUserPatterns($user_id);
$userFavorites = getUserFavorites($user_id);

$userOrders = getUserOrders($user_id);
$userPatternOrders = getUserPatternOrders($user_id);

$usersAllOrders = array_merge($userPatternOrders, $userOrders);
$userOrdersCreated = array_column($usersAllOrders, 'created_at');
array_multisort($usersAllOrders, SORT_DESC, $userOrdersCreated);

if (!$user) {
    $pathError = "/tatie_odette/404.php";
    header('Location: ' . $pathError);
}

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="">
    <title>Profil | Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/profile.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Profil">
    <?php require_once('includes/head.php') ?>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section>
    <div class="container my-5">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="images/profile/user.png"
                                     alt="<?php echo ucfirst($user['first_name']) . " " . ucfirst($user['last_name']) ?>"
                                     class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo ucfirst($user['first_name']) . " " . ucfirst($user['last_name']) ?></h4>
                                    <p class="text-muted font-size-sm">Inscrit(e) le <?php echo strftime("%e %B %Y", strtotime($user['created_at'])) ?></p>
                                    <?php if (isset($_SESSION['auth_id'])):
                                        if ($user_id == $_SESSION['auth_id']): ?>
                                            <a href="profile-edit" class="btn profileEditBtn">Éditer mes infos</a>
                                        <?php endif;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['auth_id'])):
                        if ($user_id == $_SESSION['auth_id']): ?>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3">Mes commandes récentes</h6>
                                    <div class="list-group list-group-flush mb-0 h-100">
                                        <?php if($usersAllOrders):
                                            foreach($usersAllOrders as $k => $usersAllOrder):
                                                if ($k <= 4): ?>
                                                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center flex-wrap small px-1">
                                                        <div><?php echo ucfirst($usersAllOrder['name']) ?></div>
                                                        <div><?php echo ucfirst($usersAllOrder['category']) ?></div>
                                                        <div>le <?php echo date('d/m/Y', strtotime($usersAllOrder['created_at'])) ?></div>
                                                    </div>
                                                <?php endif;
                                            endforeach;
                                        else: ?>
                                            <div class="d-flex mx-auto small" style="flex-direction: column;">
                                                <div class="text-muted mt-4">Aucune commande effectuée pour l'instant</div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                    endif; ?>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3" style="color: #917c62;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4"><h6 class="mb-0">Nom</h6></div>
                                <div class="col-sm-8 infoRightText"><?php echo ucfirst($user['first_name']) . " " . ucfirst($user['last_name']) ?></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4"><h6 class="mb-0">Date de naissance</h6></div>
                                <div class="col-sm-8 infoRightText"><?php echo !$user['birth_date'] ? "Non renseigné" : "Né(e) le " . strftime("%e %B %Y", strtotime($user['birth_date'])) ?></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4"><h6 class="mb-0">Numéro de téléphone</h6></div>
                                <div class="col-sm-8 infoRightText"><?php echo !$user['phone_number'] ? "Non renseigné" : $user['phone_number'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex" style="color: #70431d;">
                        <div class="mb-3 mr-2 w-50">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3">
                                        <?php echo (isset($_SESSION['auth_id']) && $user_id == $_SESSION['auth_id']) ? "Mes modèles" : "Ses modèles" ; ?>
                                    </h6>
                                    <ul class="list-group list-group-flush small mb-0 h-100">
                                        <?php if($userPatterns):
                                            foreach($userPatterns as $k => $userPattern):
                                                if ($k <= 4): ?>
                                                    <a href="user-patterns?id=<?php echo $userPattern['id'] ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center flex-wrap">
                                                        <div class="mb-0 font-weight-bolder"><?php echo ucfirst($userPattern['name']) ?></div>
                                                        <span class="text-secondary">Ajouté le : <?php echo date('d/m/Y', strtotime($userPattern['created_at'])) ?></span>
                                                    </a>
                                               <?php endif;
                                            endforeach;
                                        else: ?>
                                            <div class="d-flex mx-auto" style="flex-direction: column;">
                                                <?php if(isset($_SESSION['auth_id']) && $user_id == $_SESSION['auth_id']): ?>
                                                    <div class="text-muted mt-4">Aucun modèle personnel trouvé</div>
                                                    <a href="create-pattern" class="btn emptyFavBtn p-0 mt-3">Créer</a>
                                                <?php else: ?>
                                                    <div class="text-muted mt-4">Aucun modèle personnel trouvé pour ce profil</div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 ml-2 w-50">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3">
                                        <?php echo (isset($_SESSION['auth_id']) && $user_id == $_SESSION['auth_id']) ? "Mes favoris" : "Ses favoris" ; ?>
                                    </h6>
                                    <ul class="list-group list-group-flush small mb-0">
                                        <?php if($userFavorites):
                                            foreach($userFavorites as $k => $userFavorite):
                                                if ($k <= 4): ?>
                                                    <a href="user-favorites?id=<?php echo $userFavorite['id'] ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center flex-wrap">
                                                        <div class="mb-0 font-weight-bolder"><?php echo ucfirst($userFavorite['name']) ?></div>
                                                        <span class="text-secondary"><?php echo ucfirst($userFavorite['category']) ?></span>
                                                    </a>
                                                <?php endif;
                                            endforeach;
                                        else: ?>
                                            <div class="d-flex mx-auto" style="flex-direction: column;">
                                                <?php if(isset($_SESSION['auth_id']) && $user_id == $_SESSION['auth_id']): ?>
                                                    <div class="text-muted mt-4">Aucun modèle favori pour l'instant</div>
                                                    <a href="patterns" class="btn emptyFavBtn p-0 mt-3">Voir les modèles</a>
                                                <?php else: ?>
                                                    <div class="text-muted mt-4">Aucun modèle favori trouvé pour ce profil</div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('includes/footer.php') ?>
</body>
</html>
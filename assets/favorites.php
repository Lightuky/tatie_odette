<?php

require_once '../includes/helpers.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$pattern_type = isset($_GET['t']) ? $_GET['t'] : null;
$btn_action = isset($_GET['a']) ? $_GET['a'] : null;

session_start();
$userFavoritePat = getUserFavoritePattern($id, $pattern_type, $_SESSION['auth_id']);

if ($btn_action == "a"):
    if (!$userFavoritePat):
        setNewUserFavorite($id, $pattern_type, $_SESSION['auth_id']);
    endif;
elseif ($btn_action == "d"):
    if ($userFavoritePat):
        delUserFavorite($id, $pattern_type, $_SESSION['auth_id']);
    endif;
endif;

if ($pattern_type == "b"):
    $pathSuccess =  "/tatie_odette/pattern-info?id=$id";
    header('Location: '. $pathSuccess);
elseif ($pattern_type == "u"):
    $pathSuccess =  "/tatie_odette/user-patterns?id=$id";
    header('Location: '. $pathSuccess);
endif;
<?php

require_once '../includes/helpers.php';

session_start();

$users = getUsers();
$data = [];
$fields = [];
$errored = false;

foreach ($_POST as $name => $value) {
    $errored = !$value ? true : $errored;
    $data[$name] = $value;
    $fields[$name]['old'] = $value;
    $fields[$name]['error'] = !$value ? 'Ce champ est obligatoire' : NULL;
}

if ($users) {
    foreach ($users as $user) {
        if ($user['email'] == $data['email']) {
            if ($user['password'] == sha1($data['password'])) {
                $errored = false;
                break;
            }
            else {
                $errored = true;
                $fields["password"]['error'] = "Erreur dans la combinaison Mot de passe / Email";
                break;
            }
        }
        elseif ((end($users) == $user) && ($user['email'] != $data['email'])) {
            $errored = true;
            $fields["email"]['error'] = "Adresse email inexistante";
        }
    }
}
else {
    $errored = true;
    $fields["email"]['error'] = "Aucun utilisateur n'existe pour ce site";
}


if ($errored) {
    session_start();
    $_SESSION['fields'] = $fields;

    $pathError =  '/tatie_odette/login.php?errored=true';
    header('Location: '. $pathError);
}
else {
    $auth_user = authUser($data);
    foreach ($auth_user as $name => $value):
        $_SESSION["auth_$name"] = $value;
    endforeach;

    $pathSuccess =  "/tatie_odette/profile.php?id=" . $_SESSION['auth_id'];
    header('Location: '. $pathSuccess);
}
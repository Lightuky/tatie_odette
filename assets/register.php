<?php

require_once '../includes/helpers.php';

$data = [];
$fields = [];
$errored = false;
$users = getUsers();

foreach ($_POST as $name => $value):
    $data[$name] = $value;
    $fields[$name]['old'] = $value;
endforeach;

if ($users):
    foreach ($users as $user):
        if ($user['email'] == $data['email']):
                $errored = true;
                $fields["email"]['error'] = "Adresse Email déja utilisée";
                break;
        elseif ($data['password'] != $data['password-confirm']):
            $errored = true;
            $fields["password"]['error'] = "Champs de Mots de passe différents";
        endif;
    endforeach;
endif;

if ($errored):
    session_start();
    $_SESSION['fields'] = $fields;

    $pathError =  '/tatie_odette/register.php?errored=true';
    header('Location: '. $pathError);
else:
    $id = setNewUser($data);
    session_start();
    $_SESSION['auth_id'] = $id;

    $pathSuccess =  "/tatie_odette/profile?id=" . $_SESSION['auth_id'];
    header('Location: '. $pathSuccess);
endif;
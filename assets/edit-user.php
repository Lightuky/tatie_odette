<?php

require_once '../includes/helpers.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;

session_start();

$data = [];

foreach ($_POST as $name => $value) {
    $data[$name] = $value;
    var_dump($data);
}
var_dump($id);
updateUser($data, $id);

$pathSuccess =  "/tatie_odette/profile?id=$id";
header('Location: '. $pathSuccess);



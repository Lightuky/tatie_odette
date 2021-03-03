<?php

require_once '../includes/helpers.php';
session_start();
$data = [];
$patterns_identifiers = ["Coeur", "Fleur et coeur", "Flocons", "Octogone rempli", "Cylindre spiralé", "Alvéoles", "Big Ben",
                        "Tour Eiffel", "Arc de Triomphe", "Poule", "Chat porte-bonheur", "Ourson"];
$chocolate_type_code = $chocolate_weight_code = $chocolate_text_type_code = $pattern_identifier_code = $category_code = "";
$referer = isset($_GET['r']) ? $_GET['r'] : null;

foreach ($_POST as $name => $value) {
    $data[$name] = $value;
}

$data['printing_location'] = "Sur place";
$data['chocolate_type'] == "Noir" ? $chocolate_type_code = "1" : ($data['chocolate_type'] == "Lait" ? $chocolate_type_code = "2" : ($data['chocolate_type'] == "Blanc" ? $chocolate_type_code = "3" : ""));
$data['chocolate_weight'] == "20g" ? $chocolate_weight_code = "1" : $chocolate_weight_code = "2";
$data['category'] == "animaux" ? $category_code = "1" : ($data['category'] == "architecture" ? $category_code = "2" : ($data['category'] == "formes" ? $category_code = "3" : "4"));

if ($referer === 'b'):
    $data['chocolate_text_type'] = "Noir";
    $data['reception_code'] = $_SESSION['auth_id'] . $data['pattern_id'] . $category_code . $chocolate_type_code . $chocolate_weight_code . "1";

    $order_id = setNewOrder($data, $_SESSION['auth_id']);
    setNewOrderNumber(sha1($order_id), $order_id);

    $pathSuccess =  "/tatie_odette/order-confirmation.php?n=" . sha1($order_id) . "&r=b";
    header('Location: '. $pathSuccess);
elseif($referer === 'u'):
    $user_pattern = setNewUserPattern($data, $_SESSION['auth_id']);
    $data['pattern_id'] = $user_pattern;

    for ($i = 0; $i <= 11; $i++):
        if($patterns_identifiers[$i] == $data['pattern_identifier']):
            $pattern_identifier_code = $i;
        endif;
    endfor;
    $data['chocolate_text_type'] == "Noir" ? $chocolate_text_type_code = "1" : ($data['chocolate_text_type'] == "Lait" ? $chocolate_text_type_code = "2" : "3");
    $data['reception_code'] = $_SESSION['auth_id'] . $data['pattern_id'] . $pattern_identifier_code . $category_code . $chocolate_type_code . $chocolate_weight_code . $chocolate_text_type_code;

    $order_id = setNewOrder($data, $_SESSION['auth_id']);
    setNewOrderNumber(sha1($order_id), $order_id);

    $pathSuccess =  "/tatie_odette/order-confirmation.php?n=" . sha1($order_id) . "&r=u";
    header('Location: '. $pathSuccess);
endif;

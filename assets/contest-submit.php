<?php
require_once '../includes/helpers.php';
$pattern_id = isset($_GET['id']) ? $_GET['id'] : null;
$contest_id = isset($_GET['cid']) ? $_GET['cid'] : null;

if (!$pattern_id || !$contest_id) {
    $pathError =  "/tatie_odette/404.php";
    header('Location: '. $pathError);
}

session_start();

$userContestPatterns = getUserContestPatterns($_SESSION['auth_id'], $contest_id);

if (!$userContestPatterns):
    setNewContestPattern($pattern_id, $_SESSION['auth_id'], $contest_id);
endif;

$pathSuccess =  "/tatie_odette/contests";
header('Location: '. $pathSuccess);

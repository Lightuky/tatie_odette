<?php

session_start();
require_once '../includes/helpers.php';

authOut();

header("Location: /tatie_odette/index");
<?php

include("constant.php");
if (SERVER_TYPE == "live") {
    $host = 'localhost';
    $user = 'u857855204_bngtusr';
    $password = 'gjjXh2Ug[';
    $dbname = 'u857855204_bngtdb';
} else {

    $host = 'localhost';
    $user = 'newuser';
    $password = 'password';
    $dbname = 'bharatnextgentech';
}

// Connect to database
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

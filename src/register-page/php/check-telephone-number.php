<?php

require("../../common/php/connection.php");

$mySql = new ConnectionMySQL();
$pdo = $mySql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$userId = $data->userId;
$

$query = $pdo->prepare("");
$query->execute([]);
$result = null;

if ($userData != null) {
    $result = array(
        "data" => null,
        "status" => "already present",
    );
} else {
    $result = array(
        "data" => null,
        "status" => "not present",
    );
}

echo json_encode($result);

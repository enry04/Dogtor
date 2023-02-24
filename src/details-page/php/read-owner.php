<?php

require("../../common/php/connection.php");

$mysql = new ConnectionMySQL();
$pdo = $mysql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$ownerId = $data->ownerId;

$query = $pdo->prepare("SELECT * FROM tUtente INNER JOIN tIndirizzo ON tUtente.idIndirizzo = tIndirizzo.id WHERE tUtente.id=:ownerId");
$query->execute(['ownerId' => $ownerId]);
$ownerData = $query->fetch();
$result = null;
if ($ownerData != null) {
    $result = array(
        "data" => json_encode($ownerData),
        "status" => "success",
    );
} else {
    $result = array(
        "data" => null,
        "status" => "error",
    );
}

echo json_encode($result);

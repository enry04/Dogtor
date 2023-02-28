<?php

require("../../common/php/connection.php");

$mysql = new ConnectionMySQL();
$pdo = $mysql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$prenotationId = $data->prenotationId;

$query = $pdo->prepare("SELECT * FROM tPrenotazione WHERE id=:prenotationId");
$query->execute(['prenotationId' => $prenotationId]);
$prenotationData = $query->fetch();
$result = null;
if($prenotationData != null){
    $result = array(
        "data" => json_encode($prenotationData),
        "status" => "success",
    );
}else {
    $result = array(
        "data" => null,
        "status" => "error",
    );
}

echo json_encode($result);
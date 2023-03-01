<?php

require("../../common/php/connection.php");

$mysql = new ConnectionMySQL();
$pdo = $mysql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$userId = $data->userId;

$query = $pdo->prepare("SELECT * FROM tPrenotazione INNER JOIN tAnimale ON tPrenotazione.idAnimale = tAnimale.id INNER JOIN tUtente ON tAnimale.idProprietario = tUtente.id WHERE tUtente.id = :userId ORDER BY data DESC, ora DESC");
$query->execute(['userId' => $userId]);
$prenotationData = $query->fetchAll();
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
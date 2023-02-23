<?php

require("../../common/php/connection.php");

$connection = new ConnectionMySQL();
$pdo = $connection->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$prenotationId = $data->prenotationId;
$status = $data->status;
$result = null;

try {

    $query = $pdo->prepare("UPDATE tPrenotazione SET stato=:status WHERE id=:prenotationId");
    $query->execute(['prenotationId' => $prenotationId, 'status' => $status]);
    $result = array(
        'data' => null,
        'status' => "success",
    );
} catch (PDOException $e) {
    $result = array(
        'data' => $e,
        'status' => "error",
    );
}

echo json_encode($result);

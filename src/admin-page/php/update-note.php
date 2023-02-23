<?php

require("../../common/php/connection.php");

$connection = new ConnectionMySQL();
$pdo = $connection->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$prenotationId = $data->prenotationId;
$note = $data->note;
$result = null;

try {

    $query = $pdo->prepare("UPDATE tPrenotazione SET nota=:note WHERE id=:prenotationId");
    $query->execute(['prenotationId' => $prenotationId, 'note' => $note]);
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

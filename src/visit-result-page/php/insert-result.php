<?php

require("../../common/php/connection.php");

$connection = new ConnectionMySQL();
$pdo = $connection->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$prenotationId = $data->prenotationId;
$motivation = $data->motivation;
$diagnosis = $data->diagnosis;
$cure = $data->cure;
$price = $data->price;

$result = null;

try {
    $query = $pdo->prepare("INSERT INTO tRisultato (idPrenotazione, motivazione, diagnosi, cura, prezzo) VALUES (:prenotationId,:motivation, :diagnosis, :cure, :price)");
    $query->execute(['prenotationId' => $prenotationId, 'motivation' => $motivation, 'diagnosis' => $diagnosis, 'cure' => $cure, 'price' => $price]);
    $result = array(
        'data' => 'null',
        'status' => "success",
    );
} catch (PDOException $e) {
    $result = array(
        'data' => $e,
        'status' => "error",
    );
}

echo json_encode($result);

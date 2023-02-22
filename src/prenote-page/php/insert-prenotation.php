<?php

require("../../common/php/connection.php");

$connection = new ConnectionMySQL();
$pdo = $connection->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$patientId = $data->patientId;
$motivation = $data->motivation;
$description = $data->description;
$visitDate = $data->visitDate;
$visitTime = $data->visitTime;
$visitState = $data->visitState;

$result = null;

try {
    $query = $pdo->prepare("INSERT INTO `tPrenotazione`(`id`, `idAnimale`, `motivazione`, `descrizione`, `data`, `ora`, `stato`, `gravita`) VALUES (:patientId, :motivation, :descriptione, :visitDate, :visitTime, 'da confermare', :visitState)");
    $query->execute(['patientId' => $patientId, 'motivation' => $motivation, 'description' => $description, 'visitDate' => $visitDate, 'visitTime' => $visitTime, 'visitState' => $visitState]);
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

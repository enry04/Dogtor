<?php

require("../../common/php/connection.php");

$mySql = new ConnectionMySQL();
$pdo = $mySql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$visitDate = $data->visitDate;
$visitTime = $data->visitTime;

$query = $pdo->prepare("SELECT * FROM tPrenotazione WHERE tPrenotazione.data=:visitDate AND HOUR(ora) = HOUR(:visitTime)");
$query->execute(['visitDate' => $visitDate, 'visitTime' => $visitTime]);
$prenotationData = $query->fetch();
$result = null;

if ($prenotationData != null) {
    $result = array(
        "data" => json_encode($prenotationData),
        "status" => "already present",
    );
} else {
    $result = array(
        "data" => null,
        "status" => "not present",
    );
}

echo json_encode($result);

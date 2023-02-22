<?php

require("../../common/php/connection.php");

$mySql = new ConnectionMySQL();
$pdo = $mySql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$patientId = $data->patientId;
$motivation = $data->motivation;
$description = $data->description;
$visitDate = $data->visitDate;

$query = $pdo->prepare("");
$query->execute([]);
$animalData = $query->fetch();
$result = null;

if ($animalData != null) {
    $result = array(
        "data" => json_encode($animalData),
        "status" => "already present",
    );
} else {
    $result = array(
        "data" => null,
        "status" => "not present",
    );
}

echo json_encode($result);

<?php

require("../../common/php/connection.php");

$mysql = new ConnectionMySQL();
$pdo = $mysql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$patientId = $data->patientId;

$query = $pdo->prepare("SELECT * FROM tAnimale WHERE id=:patientId");
$query->execute(['patientId' => $patientId]);
$patientData = $query->fetch();
$result = null;
if($patientData != null){
    $result = array(
        "data" => json_encode($patientData),
        "status" => "success",
    );
}else {
    $result = array(
        "data" => null,
        "status" => "error",
    );
}

echo json_encode($result);
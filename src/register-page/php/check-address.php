<?php

require("../../common/php/connection.php");

$mySql = new ConnectionMySQL();
$pdo = $mySql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$postalCode = $data->postalCode;
$street = $data->street;
$houseNumber = $data->houseNumber;

$query = $pdo->prepare("SELECT * FROM tIndirizzo WHERE CAP=:postalCode AND via=:street AND numeroCivico=:houseNumber");
$query->execute(['postalCode' => $postalCode, 'street' => $street, 'houseNumber' => $houseNumber]);
$addressData = $query->fetch();
$result = null;

if ($addressData != null) {
    $result = array(
        "data" => json_encode($addressData),
        "status" => "already present",
    );
} else {
    $result = array(
        "data" => null,
        "status" => "not present",
    );
}

echo json_encode($result);

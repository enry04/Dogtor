<?php

require("../../common/php/connection.php");

$connection = new ConnectionMySQL();
$pdo = $connection->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$postalCode = $data->postalCode;
$street = $data->street;
$houseNumber = $data->houseNumber;
$result = null;

try {

    $query = $pdo->prepare("INSERT INTO tIndirizzo (CAP, via, numeroCivico) VALUES (:postalCode, :street, :houseNumber)");
    $query->execute(['postalCode' => $postalCode, 'street' => $street, 'houseNumber' => $houseNumber]);
    $getIdQuery = $pdo->query("SELECT LAST_INSERT_ID() FROM tIndirizzo");
    $addressData = $getIdQuery->fetch();
    $result = array(
        'data' => json_encode($addressData),
        'status' => "success",
    );

} catch (PDOException $e) {
    $result = array(
        'data' => $e,
        'status' => "error",
    );
}

echo json_encode($result);
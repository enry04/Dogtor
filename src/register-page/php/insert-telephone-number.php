<?php

require("../../common/php/connection.php");

$connection = new ConnectionMySQL();
$pdo = $connection->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$telephoneNumbers = $data->telephoneNumbers;
$userId = $data->userId;
$result = null;

try {
    if (count($telephoneNumbers) == 1) {
        $number = $telephoneNumbers[0];
        $query = $pdo->prepare("INSERT INTO tTelefono (numero, idUtente) VALUES (:number, :userId)");
        $query->execute(['number' => $number, 'userId' => $userId]);
    } else {
        $numberOne = $telephoneNumbers[0];
        $numberTwo = $telephoneNumbers[1];
        $firstQuery = $pdo->prepare("INSERT INTO tTelefono (numero, idUtente) VALUES (:numberOne, :userId)");
        $firstQuery->execute(['numberOne' => $numberOne, 'userId' => $userId]);
        $secondQuery = $pdo->prepare("INSERT INTO tTelefono (numero, idUtente) VALUES (:numberTwo, :userId)");
        $secondQuery->execute(['numberTwo' => $numberTwo, 'userId' => $userId]);
    }
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

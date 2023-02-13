<?php

require("../../common/php/connection.php");

$connection = new ConnectionMySQL();
$pdo = $connection->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);


$name = $data->name;
$surname = $data->surname;
$taxCode = $data->taxCode;
$username = $data->username;
$password = $data->password;
$email = $data->email;
$adressId = $data->AddressId;
$telephoneNumber = $data->telephoneNumber;

$result = null;

try {

    $query = $pdo->prepare("INSERT INTO ");
    $query->execute([]);
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

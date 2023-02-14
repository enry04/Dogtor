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
$addressId = $data->idAddress;
$type = "utente";
$telephoneNumber = $data->telephoneNumber;

$result = null;

try {

    $query = $pdo->prepare("INSERT INTO tUtente (nome, cognome, codiceFiscale, nomeUtente, password, email, idIndirizzo, tipologia, numeroTelefonoPrincipale) VALUES (:name, :surname, :taxCode, :username, :password, :email, :addressId, :type, :telephoneNumber)");
    $query->execute(['name' => $name, 'surname' => $surname, 'taxCode' => $taxCode, 'username' => $username, 'password' => $password, 'email' => $email, 'addressId' => $addressId, 'type' => $type, 'telephoneNumber' => $telephoneNumber]);
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

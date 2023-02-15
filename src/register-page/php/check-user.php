<?php

require("../../common/php/connection.php");

$mySql = new ConnectionMySQL();
$pdo = $mySql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$username = $data->username;
$email = $data->email;
$taxCode = $data->taxCode;
$telephoneNumber = $data->telephoneNumber;
$query = $pdo->prepare("SELECT * FROM tUtente WHERE username=:username OR email=:email OR codiceFiscale=:taxCode OR numeroTelefonoPrincipale=:telephoneNumber");
$query->execute(['username' => $username, 'email' => $email, 'taxCode' => $taxCode, 'telephoneNumber' => $telephoneNumber]);
$userData = $query->fetch();
$result = null;

if ($userData != null) {
    $result = array(
        "data" => json_encode($userData),
        "status" => "already present",
    );
} else {
    $result = array(
        "data" => null,
        "status" => "not present",
    );
}

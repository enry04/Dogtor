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

$query = $pdo->prepare("SELECT * FROM tUtente WHERE nomeUtente=:user OR email=:mail OR codiceFiscale=:taxCode OR numeroTelefonoPrincipale=:telephoneNumber");
$query->execute(['user' => $username, 'mail' => $email, 'taxCode' => $taxCode, 'telephoneNumber' => $telephoneNumber]);
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

<?php

require("../../common/php/connection.php");

$mySql = new ConnectionMySQL();
$pdo = $mySql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$telephoneNumbers = $data->telephoneNumbers;

if (count($telephoneNumbers) == 1) {
    $number = $telephoneNumbers[0];
    $query = $pdo->prepare("SELECT * FROM tTelefono WHERE numero=:number ");
    $query->execute(["number" => $number]);
} else {
    $numberOne = $telephoneNumbers[0];
    $numberTwo = $telephoneNumbers[1];
    $query = $pdo->prepare("SELECT * FROM tTelefono WHERE numero=:numberOne OR numero=:numberTwo");
    $query->execute(["numberOne" => $numberOne, "numberTwo" => $numberTwo]);
}
$telephoneData = $query->fetch();
$result = null;

if ($telephoneData != null) {
    $result = array(
        "data" => null,
        "status" => "already present",
    );
} else {
    $result = array(
        "data" => null,
        "status" => "not present",
    );
}

echo json_encode($result);

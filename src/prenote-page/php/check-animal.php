<?php

require("../../common/php/connection.php");

$mySql = new ConnectionMySQL();
$pdo = $mySql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$name = $data->name;
$birth = $data->birth;
$bornPlace = $data->bornPlace;
$residence = $data->residence;
$species = $data->species;
$breed = $data->breed;
$ownerId = $data->ownerId;
$companionName = $data->companionName;
$companionSurname = $data->companionSurname;

$query = $pdo->prepare("SELECT * FROM tAnimale WHERE nome=:name AND dataNascita=:birth AND luogoNascita=:bornPlace AND luogoResidenza=:residence AND specie=:species AND razza=:breed AND idProprietario=:ownerId AND nomeAccompagnatore=:companionName AND cognomeAccompagnatore=:companionSurname");
$query->execute(['name' => $name, 'birth' => $birth, 'bornPlace' => $bornPlace, 'residence' => $residence, 'species' => $species, 'breed' => $breed, 'ownerId' => $ownerId, 'companionName' => $companionName, 'companionSurname' => $companionSurname]);
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

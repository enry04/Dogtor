<?php

require("../../common/php/connection.php");

$connection = new ConnectionMySQL();
$pdo = $connection->getConnection();

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
$result = null;

try {
    $query = $pdo->prepare("INSERT INTO tAnimale (nome, dataNascita, luogoNascita, luogoResidenza, specie, razza, idProprietario, nomeAccompagnatore, cognomeAccompagnatore) VALUES (:name, :birth, :bornPlace, :residence, :species, :breed, :ownerId, :companionName, :companionSurname)");
    $query->execute(['name' => $name, 'birth' => $birth, 'bornPlace' => $bornPlace, 'residence' => $residence, 'species' => $species, 'breed' => $breed, 'ownerId' => $ownerId, 'companionName' => $companionName, 'companionSurname' => $companionSurname]);
    $getIdQuery = $pdo->query("SELECT LAST_INSERT_ID() FROM tAnimale");
    $animalData = $getIdQuery->fetch();
    $result = array(
        'data' => json_encode($animalData),
        'status' => "success",
    );
} catch (PDOException $e) {
    $result = array(
        'data' => $e,
        'status' => "error",
    );
}

echo json_encode($result);

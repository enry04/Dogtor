<?php

require("../../common/php/connection.php");

$mysql = new ConnectionMySQL();
$pdo = $mysql->getConnection();

$query = $pdo->query("SELECT tUtente.*, tUtente.nome AS nomeProprietario, tanimale.*, tprenotazione.*, tutente.id AS 'idUtente', tanimale.id AS 'idAnimale', tanimale.nome AS 'nomePaziente', tprenotazione.id AS 'idPrenotazione' FROM `tUtente` INNER JOIN tanimale ON tutente.id = tanimale.idProprietario INNER JOIN tprenotazione ON tanimale.id = tprenotazione.idAnimale WHERE tprenotazione.stato = 'da confermare' ORDER BY data ASC, ora ASC");
$prenotationsData = $query->fetchAll();
$result = null;
if($prenotationsData != null){
    $result = array(
        "data" => json_encode($prenotationsData),
        "status" => "success",
    );
}else {
    $result = array(
        "data" => null,
        "status" => "error",
    );
}

echo json_encode($result);
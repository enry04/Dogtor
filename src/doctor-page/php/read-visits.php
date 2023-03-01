<?php

require("../../common/php/connection.php");

$mysql = new ConnectionMySQL();
$pdo = $mysql->getConnection();

$json = file_get_contents("php://input");
$data = json_decode($json);

$filter = $data->filter;

$query = $pdo->prepare("SELECT * FROM tprenotazione INNER JOIN tanimale ON tprenotazione.idAnimale = tanimale.id WHERE tprenotazione.stato = 'da effettuare' AND tprenotazione.motivazione LIKE CONCAT('%', :filter, '%') OR tprenotazione.descrizione LIKE CONCAT('%', :filter, '%') OR tprenotazione.nota LIKE CONCAT('%', :filter, '%') OR tprenotazione.gravita LIKE CONCAT('%', :filter, '%')");
$query->execute(['filter' => $filter]);
$visitData = $query->fetchAll();
$result = null;
if($visitData != null){
    $result = array(
        "data" => json_encode($visitData),
        "status" => "success",
    );
}else {
    $result = array(
        "data" => null,
        "status" => "error",
    );
}

echo json_encode($result);
<?php

require("../../common/php/connection.php");

$mysql = new ConnectionMySQL();
$pdo = $mysql->getConnection();

$query = $pdo->query("SELECT *, tPrenotazione.motivazione AS mot FROM tRisultato INNER JOIN tPrenotazione ON tRisultato.idPrenotazione = tPrenotazione.id INNER JOIN tAnimale ON tPrenotazione.idAnimale = tAnimale.id WHERE stato = 'effettuata' AND MONTH(data) = MONTH(NOW()) ORDER BY data ASC, ora ASC");
$visitData = $query->fetchAll();
$result = null;
if ($visitData != null) {
    $result = array(
        "data" => json_encode($visitData),
        "status" => "success",
    );
} else {
    $result = array(
        "data" => null,
        "status" => "error",
    );
}

echo json_encode($result);

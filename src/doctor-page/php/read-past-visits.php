<?php

require("../../common/php/connection.php");

$mysql = new ConnectionMySQL();
$pdo = $mysql->getConnection();

$query = $pdo->query("SELECT *, tPrenotazione.id AS idPrenotazione FROM tPrenotazione INNER JOIN tAnimale ON tPrenotazione.idAnimale = tAnimale.id WHERE  stato != 'da confermare' AND stato != 'annullata' AND tPrenotazione.data < DATE(NOW()) OR HOUR(tPrenotazione.ora) < HOUR(NOW()) AND tPrenotazione.data = DATE(NOW()) ORDER BY data ASC, ora ASC");
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

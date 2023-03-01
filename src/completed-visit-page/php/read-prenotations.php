<?php

require("../../common/php/connection.php");

$mysql = new ConnectionMySQL();
$pdo = $mysql->getConnection();

$query = $pdo->query("SELECT COUNT(*) AS nPrenotazioni FROM tPrenotazione WHERE MONTH(data) = MONTH(NOW())");
$visitData = $query->fetch();
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

<?php
require('../../common/php/connection.php');
require('../../common/php/token-manager.php');

$connMySQL = new ConnectionMySQL();
$pdo = $connMySQL->getConnection();

$json = file_get_contents('php://input');
$data = json_decode($json);

$email = $data->email;
$username = $data->username;
$password = $data->password;

$query = $pdo->prepare('SELECT * FROM tUtente WHERE email=:email AND nomeUtente=:username AND password=:password');
$query->execute(['email' => $email, 'username' => $username, 'password' => $password]);
$userData = $query->fetch();
$result = null;

if ($userData != null) {
    $result = array(
        'data' => $userData,
        'status' => "success",
    );

    TokenManager::authenticate($userData['id'], $userData['tipologia']);
} else {
    $result = array(
        'data' => null,
        'status' => "error",
    );
}

echo json_encode($result);

<?php
class TokenManager
{
    function __construct()
    {
        @session_start();

        if (!TokenManager::isLogged()) {
            $_SESSION['user_id'] = @session_id();
            setcookie('user_id', @session_id(), (time() + (60*60*24*10)), '/');
        }
    }
    static function logout()
    {
        TokenManager::unauthenticate();
        unset($_SESSION['user_id']);
        setcookie("user_id", "", time() - (60*60*24), '/');
        header("Location: ../../../index.php");
        setcookie('user_type', "", time() - (60*10), '/');
        exit;
    }

    static function authenticate($userId, $userType)
    {
        setcookie('user_id', $userId, time() + (60*10), '/');
        setcookie('user_type', $userType, time() + (60*10), '/');
    }

    static function unauthenticate()
    {
        setcookie("user_id", "", time() - (60*10), '/');
        setcookie('user_type', "", time() - (60*10), '/');
    }

    static function isAuthenticated()
    {
        return isset($_COOKIE['user_id']);
    }
    static function isLogged()
    {
        if (isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
            $_COOKIE['user_id'] = $_SESSION['user_id'];
        }
        return isset($_COOKIE['user_id']);
    }
}

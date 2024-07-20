<?php
require_once 'config/db.php';
require_once 'models/User.php';

session_start();

class AuthController {
    private $user;

    public function __construct($pdo) {
        $this->user = new User($pdo);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->user->register($username, $email, $password);
            header('Location: index.php');
        } else {
            require 'views/auth/register.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->user->login($email, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: dashboard.php');
            } else {
                echo "Login failed!";
            }
        } else {
            require 'views/auth/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
    }
}
?>

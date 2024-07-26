<?php
class AuthController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, 'user')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                header('Location: index.php?action=login');
                exit;
            } else {
                echo "Registration failed.";
            }
        } else {
            require 'views/register.php';
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: index.php?action=' . ($user['role'] === 'admin' ? 'admin_dashboard' : 'user_dashboard'));
                exit;
            } else {
                echo "Login failed.";
            }
        } else {
            require 'views/login.php';
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
?>

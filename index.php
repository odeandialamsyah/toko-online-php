<?php
require 'config/db.php';
require 'controllers/AuthController.php';
require 'controllers/ProductController.php';

session_start();

$authController = new AuthController($pdo);
$productController = new ProductController($pdo);

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'register':
        $authController->register();
        break;
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'show':
        $id = $_GET['id'] ?? null;
        $productController->show($id);
        break;
    default:
        $productController->index();
        break;
}
?>

<?php
require 'config/db.php';
require 'models/Product.php';
require 'controllers/ProductController.php';

session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

$productController = new ProductController($pdo);

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'create':
        $productController->create();
        break;
    case 'edit':
        $productController->edit($id);
        break;
    case 'delete':
        $productController->delete($id);
        break;
    default:
        $products = $productController->index();
        require 'views/product/index.php';
        break;
}
?>

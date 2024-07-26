<?php
session_start();
require 'config/db.php';
require 'controllers/ProductController.php';
require 'models/Product.php';

$productModel = new Product($pdo);
$productController = new ProductController($productModel);

if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
    $action = $_GET['action'] ?? '';
    if ($action === 'list_products') {
        $productController->index(); // Pastikan pemanggilan ini berada di dalam kondisi yang benar
    } else {
        // Tampilkan halaman dashboard default
        require 'views/admin/dashboard.php';
    }
} else {
    header('Location: index.php');
    exit;
}
?>

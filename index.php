<?php
require 'config/db.php';
require 'controllers/AuthController.php';
require 'controllers/ProductController.php';
require 'models/Product.php';

session_start();

$authController = new AuthController($pdo);
$productModel = new Product($pdo);
$productController = new ProductController($productModel);

$action = $_GET['action'] ?? '';
$adminAction = $_GET['admin_action'] ?? '';

if ($action === 'login') {
    $authController->login();
} elseif ($action === 'register') {
    $authController->register();
} elseif ($action === 'logout') {
    $authController->logout();
} elseif ($action === 'admin_dashboard') {
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
        require 'views/admin/dashboard.php';
    } else {
        header('Location: index.php');
        exit;
    }
} elseif ($action === 'user_dashboard') {
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user') {
        require 'views/user/dashboard.php';
    } else {
        header('Location: index.php');
        exit;
    }
} elseif ($action === 'admin') {
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
        if ($adminAction === 'list_products') {
            $productController->index();
        } elseif ($adminAction === 'create_product') {
            $productController->create();
        } elseif ($adminAction === 'edit_product' && isset($_GET['id'])) {
            $productController->edit($_GET['id']);
        } elseif ($adminAction === 'delete_product' && isset($_GET['id'])) {
            $productController->delete($_GET['id']);
        }
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    // Tampilkan halaman home dengan produk
    $productController->showHome();
}
?>

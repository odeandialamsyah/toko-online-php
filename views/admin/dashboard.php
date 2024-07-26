<?php require 'views/partials/header.php'; ?>

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
    <nav class="mb-4">
        <a href="index.php?action=admin&admin_action=list_products" class="text-blue-500 mr-4">Manage Products</a>
        <a href="index.php?action=admin&admin_action=create_product" class="text-green-500">Add New Product</a>
    </nav>

    <?php
    $adminAction = $_GET['admin_action'] ?? '';
    if ($adminAction === 'list_products') {
        $products = $this->productModel->getAll();
        require 'views/admin/product_list.php';
    } elseif ($adminAction === 'create_product') {
        require 'views/admin/product_create.php';
    }
    ?>
</div>
<div class="h-96"></div>

<?php require 'views/partials/footer.php'; ?>

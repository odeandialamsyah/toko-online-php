<?php

class ProductController
{
    private $productModel;

    public function __construct($productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $products = $this->productModel->getAll();
        require 'views/admin/product_list.php';
    }

    public function showHome()
    {
        // Mengambil data produk dari model
        $query = $_GET['query'] ?? '';
        $products = $this->productModel->search($query);

        if ($products === false || empty($products)) {
            echo "No products available or failed to retrieve products.";
            return;
        }

        require 'views/home.php';
    }

    public function showDashboard() {
        // Ambil data statistik
        $totalProducts = $this->productModel->getTotalProducts();
        $latestProducts = $this->productModel->getLatestProducts();
    
        require 'views/admin/dashboard.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? 0;
            $imageUrl = $_POST['image_url'] ?? '';

            if (!empty($name) && !empty($description) && !empty($price) && !empty($imageUrl)) {
                if ($this->productModel->create($name, $description, $price, $imageUrl)) {
                    header('Location: index.php?action=admin&admin_action=list_products');
                    exit;
                } else {
                    echo "Failed to add product.";
                }
            } else {
                echo "All fields are required.";
            }
        } else {
            require 'views/admin/product_create.php';
        }
    }

    public function edit($id)
    {
        $product = $this->productModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? 0;
            $image_url = $_POST['image_url'] ?? '';

            if (!empty($name) && !empty($description) && !empty($price) && !empty($image_url)) {
                $this->productModel->update($id, $name, $description, $price, $image_url);
                header('Location: index.php?action=admin&admin_action=list_products');
                exit;
            } else {
                echo "Failed to update product.";
            }
        }

        require 'views/admin/product_edit.php';
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        header('Location: index.php?action=admin&admin_action=list_products');
        exit;
    }
}
?>

<?php
require_once 'config/db.php';
require_once 'models/Product.php';

class ProductController {
    private $product;

    public function __construct($pdo) {
        $this->product = new Product($pdo);
    }

    public function index() {
        $search = $_GET['search'] ?? '';
        $products = $this->product->readAll($search);
        require 'views/product/index.php';
    }

    public function show($id) {
        $product = $this->product->read($id);
        require 'views/product/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image_url = $_POST['image_url'];
            $this->product->create($name, $description, $price, $image_url);
            header('Location: dashboard.php');
        } else {
            require 'views/product/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image_url = $_POST['image_url'];
            $this->product->update($id, $name, $description, $price, $image_url);
            header('Location: dashboard.php');
        } else {
            $product = $this->product->read($id);
            require 'views/product/edit.php';
        }
    }

    public function delete($id) {
        $this->product->delete($id);
        header('Location: dashboard.php');
    }
}
?>

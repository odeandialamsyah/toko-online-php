<?php
class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $description, $price, $image_url) {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $image_url]);
    }

    public function readAll($search = '') {
        if ($search) {
            $stmt = $this->pdo->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?");
            $stmt->execute(['%' . $search . '%', '%' . $search . '%']);
        } else {
            $stmt = $this->pdo->query("SELECT * FROM products");
        }
        return $stmt->fetchAll();
    }

    public function read($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $name, $description, $price, $image_url) {
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, image_url = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $price, $image_url, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>

<?php
class Product
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search($query)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM products WHERE name LIKE :query");
            $stmt->execute(['query' => "%$query%"]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
            return [];
        }
    }

    public function create($name, $description, $price, $imageUrl)
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $imageUrl]);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $description, $price, $imageUrl)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE products SET name = :name, description = :description, price = :price, image_url = :image_url WHERE id = :id");
            $stmt->execute([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image_url' => $imageUrl,
                'id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
            return false;
        }
    }
}
?>

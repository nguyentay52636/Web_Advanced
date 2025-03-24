<?php

require_once 'config/DatabaseConnection.php';
require_once 'models/Product.php'; // Đảm bảo bạn đã include file Product.php

class ProductController {
    private $connection;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->connection = $db->getConnection();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM PRODUCTS";
        $result = $this->connection->query($sql);

        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product(
                    $row['ID'],
                    $row['RECIPEID'],
                    $row['PRODUCTNAME'],
                    $row['PRICE'],
                    $row['UNITID']
                );
                $products[] = $product;
            }
        }
        return $products;
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM PRODUCTS WHERE ID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return new Product(
                $row['ID'],
                $row['RECIPEID'],
                $row['PRODUCTNAME'],
                $row['PRICE'],
                $row['UNITID']
            );
        }
        return null;
    }

    public function createProduct(Product $product) {
        $sql = "INSERT INTO PRODUCTS (RECIPEID, PRODUCTNAME, PRICE, UNITID) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("isdi", $product->getRecipeId(), $product->getProductName(), $product->getPrice(), $product->getUnitId());

        if ($stmt->execute()) {
            return $this->connection->insert_id; // Trả về ID sản phẩm mới tạo
        } else {
            return false;
        }
    }

    public function updateProduct(Product $product) {
        $sql = "UPDATE PRODUCTS SET RECIPEID = ?, PRODUCTNAME = ?, PRICE = ?, UNITID = ? WHERE ID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("isdii", $product->getRecipeId(), $product->getProductName(), $product->getPrice(), $product->getUnitId(), $product->getId());

        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM PRODUCTS WHERE ID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}

?>
<?php

require_once 'config/DatabaseConnection.php';
require_once 'models/Cart.php'; // Đảm bảo đường dẫn chính xác

class CartController {
    private $connection;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->connection = $db->getConnection();
    }

    public function getCart($userId) {
        $sql = "SELECT * FROM CARTS WHERE USERID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $carts = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cart = new Cart(
                    $row['ID'],
                    $row['USERID'],
                    $row['PRODUCTID'],
                    $row['QUANTITY']
                );
                $carts[] = $cart;
            }
        }
        $stmt->close();
        return $carts;
    }

    public function addToCart($userId, $productId, $quantity) {
        $sql = "INSERT INTO CARTS (USERID, PRODUCTID, QUANTITY) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("iii", $userId, $productId, $quantity);

        if ($stmt->execute()) {
            $stmt->close();
            return true; // Thêm thành công
        } else {
            $stmt->close();
            return false; // Thêm thất bại
        }
    }

    public function updateCart($cartId, $quantity) {
        $sql = "UPDATE CARTS SET QUANTITY = ? WHERE ID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ii", $quantity, $cartId);

        if ($stmt->execute()) {
            $stmt->close();
            return true; // Cập nhật thành công
        } else {
            $stmt->close();
            return false; // Cập nhật thất bại
        }
    }

    public function removeFromCart($cartId) {
        $sql = "DELETE FROM CARTS WHERE ID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $cartId);

        if ($stmt->execute()) {
            $stmt->close();
            return true; // Xóa thành công
        } else {
            $stmt->close();
            return false; // Xóa thất bại
        }
    }

    public function clearCart($userId) {
        $sql = "DELETE FROM CARTS WHERE USERID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            $stmt->close();
            return true; // Xóa giỏ hàng thành công
        } else {
            $stmt->close();
            return false; // Xóa giỏ hàng thất bại
        }
    }

    public function __destruct() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}

?>
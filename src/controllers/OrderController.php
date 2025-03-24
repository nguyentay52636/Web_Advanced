<?php

require_once 'config/DatabaseConnection.php';
require_once 'models/Order.php'; // Đảm bảo bạn đã bao gồm file Order.php

class OrderController {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DatabaseConnection();
    }

    public function createOrder(Order $order) {
        $conn = $this->dbConnection->getConnection();

        $userId = $order->getUserId();
        $total = $order->getTotal();
        $dateOfOrder = $order->getDateOfOrder();
        $discountId = $order->getDiscountId();

        $sql = "INSERT INTO ORDERS (USERID, TOTAL, DATEOFORDER, DISCOUNTID) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("idss", $userId, $total, $dateOfOrder, $discountId);

        if ($stmt->execute()) {
            $order->setId($conn->insert_id); // Lấy ID vừa được tạo
            $stmt->close();
            return $order;
        } else {
            $stmt->close();
            return null; // Hoặc throw exception
        }
    }

    public function getOrderById($id) {
        $conn = $this->dbConnection->getConnection();

        $sql = "SELECT * FROM ORDERS WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $order = new Order(
                $row['ID'],
                $row['USERID'],
                $row['TOTAL'],
                $row['DATEOFORDER'],
                $row['DISCOUNTID']
            );
            $stmt->close();
            return $order;
        } else {
            $stmt->close();
            return null;
        }
    }

    public function updateOrder(Order $order) {
        $conn = $this->dbConnection->getConnection();

        $id = $order->getId();
        $userId = $order->getUserId();
        $total = $order->getTotal();
        $dateOfOrder = $order->getDateOfOrder();
        $discountId = $order->getDiscountId();

        $sql = "UPDATE ORDERS SET USERID = ?, TOTAL = ?, DATEOFORDER = ?, DISCOUNTID = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("idssi", $userId, $total, $dateOfOrder, $discountId, $id);

        if ($stmt->execute()) {
            $stmt->close();
            return $order;
        } else {
            $stmt->close();
            return null;
        }
    }

    public function deleteOrder($id) {
        $conn = $this->dbConnection->getConnection();

        $sql = "DELETE FROM ORDERS WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function getAllOrders() {
        $conn = $this->dbConnection->getConnection();

        $sql = "SELECT * FROM ORDERS";
        $result = $conn->query($sql);

        $orders = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order = new Order(
                    $row['ID'],
                    $row['USERID'],
                    $row['TOTAL'],
                    $row['DATEOFORDER'],
                    $row['DISCOUNTID']
                );
                $orders[] = $order;
            }
        }
        return $orders;
    }
}

?>
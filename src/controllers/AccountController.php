<?php

require_once 'config/DatabaseConnection.php';
require_once 'models/Account.php'; // Bao gồm file Account model

class AccountController {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new DatabaseConnection();
        $this->conn = $this->db->getConnection();
    }

    public function getAccountById($id) {
        $sql = "SELECT * FROM ACCOUNTS WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return new Account($row['ID'], $row['USENAME'], $row['PASSWORD']);
        } else {
            return null;
        }
    }

    public function createAccount(Account $account) {
        $sql = "INSERT INTO ACCOUNTS (USENAME, PASSWORD) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $account->getUsername(), $account->getPassword());

        if ($stmt->execute()) {
            return $this->conn->insert_id; // Trả về ID của bản ghi vừa tạo
        } else {
            return false;
        }
    }

    public function updateAccount(Account $account) {
        $sql = "UPDATE ACCOUNTS SET USENAME = ?, PASSWORD = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $account->getUsername(), $account->getPassword(), $account->getId());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAccount($id) {
        $sql = "DELETE FROM ACCOUNTS WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllAccounts() {
        $sql = "SELECT * FROM ACCOUNTS";
        $result = $this->conn->query($sql);
        $accounts = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $accounts[] = new Account($row['ID'], $row['USENAME'], $row['PASSWORD']);
            }
        }

        return $accounts;
    }

    // Các phương thức khác có thể được thêm vào tùy theo yêu cầu
}

?>
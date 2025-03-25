<?php

require_once '../models/Recipe.php';
require_once './../config/DatabaseConnection.php';

class RecipeController {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function createRecipe($recipeName) {
        $sql = "INSERT INTO RECIPES (RECIPENAME) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $recipeName);

        if ($stmt->execute()) {
            return new Recipe($this->conn->insert_id, $recipeName);
        } else {
            return null;
        }
    }

    public function getRecipe($id) {
        $sql = "SELECT * FROM RECIPES WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Recipe($row['ID'], $row['RECIPENAME']);
        } else {
            return null;
        }
    }

    // Thêm các phương thức khác như updateRecipe, deleteRecipe nếu cần
}

?>
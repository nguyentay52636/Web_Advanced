<?php

require_once './../models/RecipeDetail.php';
require_once '../config/..';

class RecipeDetailController {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function createRecipeDetail($recipeId, $ingredientId, $quantity, $unitId) {
        $sql = "INSERT INTO RECIPEDETAILS (RECIPEID, INGREDIENTID, QUANTITY, UNITID) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiid", $recipeId, $ingredientId, $quantity, $unitId);

        if ($stmt->execute()) {
            return new RecipeDetail($recipeId, $ingredientId, $quantity, $unitId);
        } else {
            return null;
        }
    }

    public function getRecipeDetail($recipeId, $ingredientId) {
        $sql = "SELECT * FROM RECIPEDETAILS WHERE RECIPEID = ? AND INGREDIENTID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $recipeId, $ingredientId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new RecipeDetail($row['RECIPEID'], $row['INGREDIENTID'], $row['QUANTITY'], $row['UNITID']);
        } else {
            return null;
        }
    }

    // Thêm các phương thức khác như updateRecipeDetail, deleteRecipeDetail nếu cần
}

?>
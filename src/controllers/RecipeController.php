<?php
require_once 'config/DatabaseConnection.php';
require_once 'models/Recipe.php'; // Đảm bảo đường dẫn chính xác

class RecipeController {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new DatabaseConnection();
        $this->conn = $this->db->getConnection();
    }

    public function getAllRecipes() {
        $sql = "SELECT * FROM RECIPES";
        $result = $this->conn->query($sql);
        $recipes = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $recipe = new Recipe(
                    $row['ID'],
                    $row['INFREDIENTID'],
                    $row['QUANTITY'],
                    $row['UNITID']
                );
                $recipes[] = $recipe;
            }
        }

        return $recipes;
    }

    public function getRecipeById($id) {
        $sql = "SELECT * FROM RECIPES WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Recipe(
                $row['ID'],
                $row['INFREDIENTID'],
                $row['QUANTITY'],
                $row['UNITID']
            );
        }

        return null; // Trả về null nếu không tìm thấy
    }

    public function createRecipe(Recipe $recipe) {
        $sql = "INSERT INTO RECIPES (INFREDIENTID, QUANTITY, UNITID) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $ingredientId = $recipe->getIngredientId();
        $quantity = $recipe->getQuantity();
        $unitId = $recipe->getUnitId();

        $stmt->bind_param("idi", $ingredientId, $quantity, $unitId);

        if ($stmt->execute()) {
            return $this->conn->insert_id; // Trả về ID của bản ghi vừa tạo
        } else {
            return false; // Trả về false nếu thất bại
        }
    }

    public function updateRecipe(Recipe $recipe) {
        $sql = "UPDATE RECIPES SET INFREDIENTID = ?, QUANTITY = ?, UNITID = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $ingredientId = $recipe->getIngredientId();
        $quantity = $recipe->getQuantity();
        $unitId = $recipe->getUnitId();
        $id = $recipe->getId();

        $stmt->bind_param("idii", $ingredientId, $quantity, $unitId, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteRecipe($id) {
        $sql = "DELETE FROM RECIPES WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}

?>
<?php

class Recipe {
    private $id;
    private $ingredientId;
    private $quantity;
    private $unitId;

    public function __construct($id = null, $ingredientId = null, $quantity = null, $unitId = null) {
        $this->id = $id;
        $this->ingredientId = $ingredientId;
        $this->quantity = $quantity;
        $this->unitId = $unitId;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIngredientId() {
        return $this->ingredientId;
    }

    public function setIngredientId($ingredientId) {
        $this->ingredientId = $ingredientId;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getUnitId() {
        return $this->unitId;
    }

    public function setUnitId($unitId) {
        $this->unitId = $unitId;
    }
}

?>
<?php

class Order {
    private $id;
    private $userId;
    private $total;
    private $dateOfOrder;
    private $discountId;

    public function __construct($id = null, $userId = null, $total = null, $dateOfOrder = null, $discountId = null) {
        $this->id = $id;
        $this->userId = $userId;
        $this->total = $total;
        $this->dateOfOrder = $dateOfOrder;
        $this->discountId = $discountId;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function getDateOfOrder() {
        return $this->dateOfOrder;
    }

    public function setDateOfOrder($dateOfOrder) {
        $this->dateOfOrder = $dateOfOrder;
    }

    public function getDiscountId() {
        return $this->discountId;
    }

    public function setDiscountId($discountId) {
        $this->discountId = $discountId;
    }
}

?>
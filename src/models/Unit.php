<?php

class Unit {
    private $id;
    private $type;

    public function __construct($id = null, $type = null) {
        $this->id = $id;
        $this->type = $type;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
}

?>
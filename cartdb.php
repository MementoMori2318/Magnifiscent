<?php
class Cartdb{
    private $conn;
    private $tablename = "cartdb";

    public $id;
    public $product_id;
    public $quantity;
    public $user_id	;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
		

<?php
require_once "../Services/DBFunctions.php";
require_once "../src/model/products.php";
class Products{
	public $connection;
	function __construct($connection) {
		$this->connection = $connection;
	}

	function fetchProducts($args){
		$DBFunctions = new DBFunctions($this->connection);
		$query = "SELECT * FROM products";
		$className = "Product";
		//$this->logger->info($query);
		return $DBFunctions->select($query,$args,$className);

	}
}


?>
<?php
class DBFunctions{
	public $connection;

	public function __construct($connection){
		$this->connection = $connection;
	}

	public function select($query,$bindParams,$className){
		//$this->logger->info($query);
		try{
			$statement = $this->connection->prepare($query);
			$statement->execute($bindParams);
			$resultSet = $statement->fetchAll(PDO::FETCH_CLASS,$className);
			return $resultSet;
		}catch(PDOException $exception){
			return $exception->getMessage();
		}
	}
}


?>
<?php
class Database {

	public function Connect() {
			$host = 'localhost';
			$database = 'movie_theatre';
			$username = 'root';
			$password = '';
			$dsn = "mysql:host=$host;dbname=$database";
			///////

			$attrs = array(PDO::ATTR_PERSISTENT => true);

			// connect to PDO
			$connection = new PDO($dsn, $username, $password, $attrs);

			return $connection;
		}	
}
?>
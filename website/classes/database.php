<?php 

	class Database {

		// connect to the database
		private function connect() {
			$string = DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME;
			$conn = new PDO($string, DBUSER, DBPASSWORD); // PDO; PHP data objects

			if (!$conn) {
				die("Could not connect to Database!");
			}
			return $conn;
		}

		// read from or write to database
		public function run($query, $var = []) {
			$conn = $this->connect();
			$statement = $conn->prepare($query);

			if ($statement) {
				// code...
				$check = $statement->execute($var);

				if ($check) {
					// code...
					$data = $statement->fetchAll(PDO::FETCH_OBJ); // fetch objects
					if (is_array($data) && count($data) > 0) {
						// code...
						return $data;
					}
				}
			}

			return false;

		}


	}
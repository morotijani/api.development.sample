<?php 


	class App {
		private $db;
		public $result = "{}";

		function __construct() {
			$this->db = new Database();

			if (isset($_GET['url'])) {
				$rawUrl = $_GET['url'];
				$URL = explode("/", trim($rawUrl, '/')); // trim the url with any last forward slash
				$table = $URL[0]; // grab the table name from the get variable
				unset($URL[0]); // and unset the key 

				$params = array_values($URL); // reset the remaing urls values keys statring tfrom 0

			 	// check if function is callable 
				if (is_callable([$this, $table])) {
			 		$this->result = $this->$table($params);
			 	}
			} else {
				// load home page if there are no parameters 
				$this->index();
			}

		}
		
		// load index page
		private function index() {
			require ("home.php");
		}

		private function users($params = []) {
			// code...
			$id = (isset($params[0]) ? $params[0] : NULL);
			if ($id) {
				// code...
				$data = $this->db->run("SELECT * FROM users WHERE user_id = ? LIMIT 1", [$id]);
				if (is_array($data)) {
					// code...
					return json_encode($data);
				}
			} else {
				$data = $this->db->run("SELECT * FROM users", []);
				if (is_array($data)) {
					// code...
					return json_encode($data);
				} 
			}
			return "{}";
		}

		private function transactions($params = []) {

			$id = (isset($params[0]) ? $params[0] : NULL);
			if ($id) {
				// code...
				$data = $this->db->run("SELECT * FROM transactions WHERE transaction_id = ? LIMIT 1", [$id]);
				if (is_array($data)) {
					// code...
					return json_encode($data);
				}
			} else {
				$data = $this->db->run("SELECT * FROM transactions", []);
				if (is_array($data)) {
					// code...
					return json_encode($data);
				}
			}
			return "{}";
		}



	}
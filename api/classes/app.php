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

				$params = array_values($URL); // reset the remaing urls values keys starting tfrom 0


				if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
					$params = $_POST;
				}

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


			if (count($params) > 1) {
				// check if email exist
				$email = $params['user_email'];
				$data = $this->db->run("SELECT * FROM users WHERE user_email = ? LIMIT 1", [$email]);
				if (is_array($data)) {
					return '{"error":"Email, already exist!"}';
				}

				// check email validity
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					return '{"error":"Invalid, email!"}';
				}
				
				$uid = array('user_id' => '121212');
				$params = array_merge($params, $uid);

				$array_keys = array_keys($params);
				$array_key = implode(',', $array_keys);

				$array_values = array_values($params);

				$values = '';
				for ($i=0; $i < count($array_keys); $i++) { 
					// code...
					$values .= '?,';
				}
				$values = rtrim($values, ',');

				$data = $this->db->run("INSERT INTO users ($array_key) VALUES ($values)", $array_values);
				if ($data) {
					return '{"success":"true"}';
				}
			} else {
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
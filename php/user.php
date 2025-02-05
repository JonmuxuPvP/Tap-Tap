<?php
	
	/**
	 * Represents a User in a class
	 **/
	class User
	{
		private $name;
		private $points;
		private $tapped;

		public function __construct($name, $points, $tapped)
		{
			$this->name = $name;
			$this->points = $points;
			$this->tapped = $tapped;
		}		

		public function getName()
		{
			return $this->name;
		}

		public function getPoints()
		{
			return $this->points;
		}

		public function getTapped()
		{
			return $this->tapped;
		}

		/**
		 * Encodes the properties of the current instance to a readable JSON format.
		 *
		 * This is mainly used due to the fact that PHP will send a response to JavaScript,
		 * which needs to be a parseable JSON that JavaScript can use.
		 * @see login-user.php
		 *
		 * @return JSON - encoded JSON data
		 **/
		public function toJSON()
		{
			$data = array();	
			foreach ($this as $key => $value) {
				$data[$key] = $value;
			}
			return json_encode($data);
		}
	}
?>

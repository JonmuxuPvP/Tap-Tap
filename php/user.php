<?php

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

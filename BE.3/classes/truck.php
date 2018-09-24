<?php
Class Truck extends Vehicle{
	private $wheels;
	public function __construct($brand, $color, $name, $wheels){
		parent::__construct($brand, $color, $name);
		$this->wheels = $wheels;
		$this->setType("truck");
	}
	public function getWheels():string{
		return $this->wheels;
	}

	public function __toString():string{
		return sprintf("%s, %s wheels", parent::__toString(), $this->getWheels());
	}
}
?>
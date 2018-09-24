<?php
Class Car extends Vehicle{
	protected $doors;
	protected $trailer;
	public function __construct($brand, $color, $name, $doors = 3, $trailer = false){
		parent::__construct($brand, $color, $name);
		$this->doors = $doors;
		$this->trailer = $trailer;
		$this->setType("car");
	}
	public function getDoors():string{
		return $this->doors;
	}
	public function getTrailer():string{
		return $this->trailer;
	}
	public function __toString():string{
		return sprintf("%s, %s doors, %s", parent::__toString(), $this->getDoors(), $this->getTrailer() ? "with trailer" : "without trailer");
	}
}
?>
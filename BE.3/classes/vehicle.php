<?php
Class Vehicle{
	private $brand;
	private $color;
	private $name;
	private $tone = "HONK HONK";
	protected $type = "vehicle";
	public function __construct($brand, $color, $name){
		$this->brand = $brand;
		$this->color = $color;
		$this->name = $name;
	}
	public function honk():string{
		return sprintf("<span class='%s'>%s</span>", $this->getType(), $this->getTone());
	}
	public function whoami():string{
		return $this->name;
	}
	public function getTone():string{
		return $this->tone;
	}
	public function getType():string{
		return $this->type;
	}
	public function SetType($type):void{
		$this->type = $type;
	}
	public function __toString():string{
		return sprintf("%s: %s", $this->whoami(), $this->honk());
	}
}
?>
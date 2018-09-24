<?php
Class Country{
	private $iso;
	private $name;
	private $printable_name;
	private $iso3;
	private $numcode;
	public function __construct($iso = "DK", $name = "DENMARK", $iso3 = "DNK", $numcode = 208){
		$this->iso = $iso;
		$this->name = $name;
		$this->iso3 = $iso3;
		$this->numcode = $numcode;
	}
	public function getIso():string{
		return $this->iso;
	}
	public function getIso3():string{
		return $this->iso3;
	}
	public function getName():string{
		return $this->name;
	}
	public function getNumcode():int{
		return $this->iso3;
	}
	public function setNumcode($int):void{
		$this->numcode = $int;
	}
	public function __toString():string{
		return "Country name: $this->name <br> ISO: $this->iso <br> ISO3: $this->iso3 <br> Numcode: $this->numcode";
	}
}
?>
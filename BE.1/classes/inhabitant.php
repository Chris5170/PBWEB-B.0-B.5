<?php
Class Inhabitant{
	private $ssn;
	private $firstname;
	private $surname;
	private $zipcode;
	private $country;
	private $taxpct;
	public function __construct($country, $ssn = "0101700001", $firstname = "John", $surname = "Doe", $zipcode = 6000, $taxpct = 78){
		$this->country = $country;
		$this->ssn = $ssn;
		$this->firstname = $firstname;
		$this->surname = $surname;
		$this->zipcode = $zipcode;
		$this->taxpct = $taxpct;
	}
	public function getSsn():decimal{
		return $this->ssn;
	}
	public function getTaxpct():decimal{
		return $this->taxpctso3;
	}
	public function setTaxpct($dec):void{
		$this->taxpct = $dec;
	}
	public function __toString():string{
		return "Name: $this->firstname $this->surname <br> Social Security Number: $this->ssn <br> Tax percent: $this->taxpct <br> $this->country";
	}
}
?>
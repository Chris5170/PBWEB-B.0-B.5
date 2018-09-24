<?php
Class Area{
	private $country;
	private $zipcode;
	private $population;
	private $name;
	public function __construct($country, $name = "Kolding", $zipcode = "6000", $population = 300){
		$this->country = $country;
		$this->name = $name;
		$this->zipcode = $zipcode;
		$this->population = $population;
	}
	public function getPopulation():int{
		return $this->population;
	}
	public function __toString():string{
		$countryName = $this->country->getName();
		return "City: $this->name <br> ZIP: $this->zipcode <br> Population: $this->population <br> Country: $countryName";
	}
}
?>
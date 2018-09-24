<?php 
class Television implements Sellable{
	private $screenSize;
	private $stockLevel;

	public function __construct($screenSize, $stockLevel){
		$this->screenSize = $screenSize;
		$this->stockLevel = $stockLevel;
	}

	public function getScreenSize(){
		return $this->screenSize;
	}
	public function setScreenSize($screenSize){
		$this->screenSize = $screenSize;
	}
	public function addStock($numItems){
		$this->stockLevel += $numItems;
	}
	public function sellItems($numItems){
		$returnVal = false;
		if($this->stockLevel >= $numItems){
			$this->stockLevel -= $numItems;
			$returnVal = true;
		}
		return $returnVal;
	}
	public function getStockLevel(){
		return $this->stockLevel;
	}
}
?>
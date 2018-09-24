<?php 
class Product extends Sellable{
	protected $stockLevel;
	public function addStock(numItems){
		$this->stockLevel += $numItems;
	}
	public function sellItem(){
		$returnVal = false;
		if($this->stockLevel > 0){
			$this->stockLevel--;
			$returnVal = true;
		}
		return $returnVal;
	}
	public function getStockLevel(){
		return $this->stockLevel;
	}
}
?>
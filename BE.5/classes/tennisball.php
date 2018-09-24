<?php 
class TennisBall implements Sellable{
	private $color;
	private $ballsLeft;

	public function __construct($color, $ballsLeft){
		$this->color = $color;
		$this->ballsLeft = $ballsLeft;
	}

	public function getColor(){
		return $this->color;
	}
	public function setColor($color){
		$this->color = $color;
	}
	public function addStock($numItems){
		$this->ballsLeft += $numItems;
	}
	public function sellItems($numItems){
		$returnVal = false;
		if($this->ballsLeft >= $numItems){
			$this->ballsLeft -= $numItems;
			$returnVal = true;
		}
		return $returnVal;
	}
	public function getStockLevel(){
		return $this->ballsLeft;
	}
}
?>
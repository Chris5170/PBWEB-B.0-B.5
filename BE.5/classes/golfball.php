<?php 
class GolfBall implements Sellable{
	private $color;
	private $indents;
	private $noinstock;

	public function __construct($color, $indents, $noinstock){
		$this->color = $color;
		$this->indents = $indents;
		$this->noinstock = $noinstock;
	}

	public function getColor(){
		return $this->color;
	}
	public function setColor($color){
		$this->color = $color;
	}
	public function getIndents(){
		return $this->indents;
	}
	public function setIndents($indents){
		$this->indents = $indents;
	}
	public function addStock($numItems){
		$this->noinstock += $numItems;
	}
	public function sellItems($numItems){
		$returnVal = false;
		if($this->noinstock >= $numItems){
			$this->noinstock -= $numItems;
			$returnVal = true;
		}
		return $returnVal;
	}
	public function getStockLevel(){
		return $this->noinstock;
	}
}
?>
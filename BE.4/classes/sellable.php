<?php
interface Sellable{
	public function addStock($numItems);
	public function sellItems($numItems);
	public function getStockLevel();
}
?>
<?php
class StoreManager{
	private $productList = array();

	public function addProduct(Sellable $product){
		$this->productList[] = $product;
	}
	public function getProductList(){
		return $this->productList;
	}
	public function getProduct($key){
		return $this->productList[$key];
	}
	public function stockUp(){
		foreach($this->productList as $product){
			$product->addStock(100);
		}
	}
}
?>
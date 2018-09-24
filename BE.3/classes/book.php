<?php
Class Book extends Product{
	protected $pageCount;

	public function __construct($title, $pageCount){
		$this->title = $title;
		$this->pageCount = $pageCount;
		$this->type = "Book";
	}
	public function getPageCount():string{
		return $this->pageCount;
	}
	public function display(){
		printf(
			"<p>%s: %s (%s pages)",
			$this->getProductType(),
			$this->getTitle(),
			$this->getPageCount()
			);
	}
}
?>
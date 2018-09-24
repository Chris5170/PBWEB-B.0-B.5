<?php
Class DVD extends Product{
	protected $duration;

	public function __construct($title, $duration){
		$this->title = $title;
		$this->duration = $duration;
		$this->type = "DVD";
	}
	public function getDuration():string{
		return $this->duration;
	}
	public function display(){
		printf(
			"<p>%s: %s (%s minutes)",
			$this->getProductType(),
			$this->getTitle(),
			$this->getDuration()
			);
	}
}
?>
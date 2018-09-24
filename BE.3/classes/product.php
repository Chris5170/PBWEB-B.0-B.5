<?php
abstract Class Product{
	protected $type;
	protected $title;

	public function getTitle():string{
		return $this->title;
	}
	public function getProductType():string{
		return $this->type;
	}
	abstract public function display();
}
?>
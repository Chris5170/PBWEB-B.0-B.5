<?php
Class LiveLecture extends Product{
	protected $duration;
	protected $lecturer;
	protected $topic;

	public function __construct($title, $duration, $lecturer, $topic){
		$this->title = $title;
		$this->duration = $duration;
		$this->lecturer = $lecturer;
		$this->topic = $topic;
		$this->type = "LiveLecture";
	}
	public function getDuration():string{
		return $this->duration;
	}
	public function getLecturer():string{
		return $this->lecturer;
	}
	public function getTopic():string{
		return $this->topic;
	}
	public function display(){
		printf(
			"<p>%s: %s (%s minutes), lecturer: %s, topic: %s",
			$this->getProductType(),
			$this->getTitle(),
			$this->getDuration(),
			$this->getLecturer(),
			$this->getTopic()
			);
	}
}
?>
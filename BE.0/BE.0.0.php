<?php
$arr = array();
for($x=0;$x<10;$x++){
	for($y=0;$y<10;$y++){
		if($x == $y){
			echo $arr[$x][$y] = 1;
		}
		else{
			echo $arr[$x][$y] = 0;
		}
	}
	echo "<br> \n";
}
echo "<pre>";
print_r($arr);
echo "</pre>";
?>

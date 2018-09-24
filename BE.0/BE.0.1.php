<?php
foreach ($_GET as $key => $value) {
	if($key !== "fields"){
		if(is_numeric($value)){
			$numbers[] = $value;
		}
	}
	else{
		$fields = $value;
	}
}
if(!isset($fields)){
	$fields = 3;
}
?>
<form id="form" action="" method="GET">
<?php
	for($i = 0;$i < $fields;$i++){
		echo "<input name='$i' type='number'>";
	}
?>
<button name="fields" id="addField" value="<?php echo ++$fields; ?>">Flere tal!</button>
<input type="submit" value="Find største nummer">
<label for="checkbox"> benyt JavaScript </label><input id="checkbox" type="checkbox">
</form>
<?php
if(isset($numbers)){
	$largest = largestNumber($numbers);
	$smallest = smallestNumber($numbers);
	foreach ($numbers as $key => $value) {
		echo $value . "<br>";
	}
	echo "<br>";
	echo "The smallest number is " . $smallest . "<br>";
	echo "The largest number is " . $largest;
}
function largestNumber($arr){
	foreach ($arr as $key => $v) {
		if(!isset($largestV) || $v > $largestV){
			$largestV = $v;
		}
	}
	return $largestV;
}
function smallestNumber($arr){
	foreach ($arr as $key => $v) {
		if(!isset($smallestV) || $v < $smallestV){
			$smallestV = $v;
		}
	}
	return $smallestV;
}
?>
<script>

	var addField = document.getElementById("addField");
	var parent = addField.parentNode;
	var checkbox = document.getElementById("checkbox");
	addField.addEventListener("click", function(e){
		if(checkbox.checked){
			e.preventDefault();
			var count = document.getElementById("form").childElementCount - 4;
			var newField = document.createElement("input");
			newField.setAttribute("name", count);
			newField.setAttribute("type", "number");
			parent.insertBefore(newField, addField);
		}
	});
</script>

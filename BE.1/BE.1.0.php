<?php 
require_once("classes/country.php");
require_once("classes/area.php");
require_once("classes/inhabitant.php");
$denmark = new Country();
$kolding = new Area($denmark);
$john = new Inhabitant($denmark);
echo $john;
echo "<br><br>";
echo $kolding
?>
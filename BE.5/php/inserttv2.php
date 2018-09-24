<?php
if(!(isset($_POST['inch']) && isset($_POST['amount']))){
	header("location: ../BE.5.0.php");
}
foreach($_POST as $key => $value){
	$$key = $value;
}
if($amount <= 0){
	$amount = 0;
}
if(is_numeric($inch)){
	require_once("../includes/dbp.php");
	require_once("../includes/dbc.php");
	require_once("../classes/sellable.php");
	require_once("../classes/television.php");
	$dbc = DbC::getInstance();
	$con = $dbc->getCon();
	$tv = new Television($inch, $amount);
	$sql = "INSERT INTO tvs (inch, stocklevel) VALUES (:inch, :amount)";
	try{
        $q = $con->prepare($sql);
        $q->execute(array(
        	":inch" => $inch,
        	":amount" => $amount
        ));
        echo "success";
	}
    catch(PDOException $e) {
        printf("<p>%s</p>\n", $e->getMessage());
    }
}
?>
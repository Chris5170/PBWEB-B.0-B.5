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
	require_once("../includes/dbparams.php");
	require_once("../includes/dbcon.php");
	require_once("../classes/sellable.php");
	require_once("../classes/television.php");
	$tv = new Television($inch, $amount);
	$sql = "INSERT INTO tvs (inch, stocklevel) VALUES (:inch, :amount)";
	try{
        $q = $dbh->prepare($sql);
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
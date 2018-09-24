<?php
if(!(isset($_POST['tvid']) && isset($_POST['tva']) && isset($_POST['tbid']) && isset($_POST['tba']) && isset($_POST['gbid']) && isset($_POST['gba']))){
	echo "one or more field is not set <a href'../BE.4.2.php'><<go back></a>";
}
else{
	require_once("../includes/dbparams.php");
	require_once("../includes/dbcon.php");
	require_once("../classes/sellable.php");
	require_once("../classes/television.php");
	require_once("../classes/tennisball.php");
	require_once("../classes/golfball.php");
	foreach($_POST as $key => $value){
		$$key = $value;
	}


    $sql = "SELECT inch, stocklevel FROM tvs WHERE id = :id";
    try {
        $q = $dbh->prepare($sql);
        $q->bindValue(":id", $tvid);
        $q->execute();
        $obj = $q->fetchObject();
    	$tv = new Television($obj->inch, $obj->stocklevel);
    	$tv->sellItems($tva);
    }
    catch(PDOException $e) {
        printf("<p>%s</p>\n", $e->getMessage());
    }
    $sql = "SELECT color, ballsleft FROM tennisballs WHERE id = :id";
    try {
        $q = $dbh->prepare($sql);
        $q->bindValue(":id", $tbid);
        $q->execute();
        $obj = $q->fetchObject();
    	$tb = new TennisBall($obj->color, $obj->ballsleft);
    	$tb->sellItems($tba);
    }
    catch(PDOException $e) {
        printf("<p>%s</p>\n", $e->getMessage());
    }
    $sql = "SELECT color, dimples, noinstock FROM golfballs WHERE id = :id";
    try {
        $q = $dbh->prepare($sql);
        $q->bindValue(":id", $gbid);
        $q->execute();
        $obj = $q->fetchObject();
    	$gb = new GolfBall($obj->color, $obj->dimples, $obj->noinstock);
    	$gb->sellItems($gba);
    }
    catch(PDOException $e) {
        printf("<p>%s</p>\n", $e->getMessage());
    }

	if($tva > 0){
        $sql = "UPDATE tvs SET stocklevel = :stock WHERE id = :id";
        try {
            $q = $dbh->prepare($sql);
            $q->execute(array(
            	":stock" => $tv->getStockLevel(),
            	":id" => $tvid
            ));
        }
        catch(PDOException $e) {
            printf("<p>%s</p>\n", $e->getMessage());
        }
	}
	if($tba > 0){
        $sql = "UPDATE tennisballs SET ballsleft = :stock WHERE id = :id";
        try {
            $q = $dbh->prepare($sql);
            $q->execute(array(
            	":stock" => $tb->getStockLevel(),
            	":id" => $tbid
            ));
        }
        catch(PDOException $e) {
            printf("<p>%s</p>\n", $e->getMessage());
        }
	}
	if($gba > 0){
        $sql = "UPDATE golfballs SET noinstock = :stock WHERE id = :id";
        try {
            $q = $dbh->prepare($sql);
            $q->execute(array(
            	":stock" => $gb->getStockLevel(),
            	":id" => $gbid
            ));
        }
        catch(PDOException $e) {
            printf("<p>%s</p>\n", $e->getMessage());
        }
	}
}
?>
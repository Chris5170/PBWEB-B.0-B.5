<?php
$dea = abs($x1 - $x2);
$deb = abs($y1 - $y2);
$dec = sqrt(pow($dea, 2) + pow($deb, 2));
$efa = abs($x2 - $x3);
$efb = abs($y2 - $y3);
$efc = sqrt(pow($efa, 2) + pow($efb, 2));
$fda = abs($x1 - $x3);
$fdb = abs($y1 - $y3);
$fdc = sqrt(pow($fda, 2) + pow($fdb, 2));
$D = rad2deg(acos((pow($dec, 2) + pow($fdc, 2) - pow($efc, 2)) / (2 * $dec * $fdc)));
$E = rad2deg(acos((pow($dec, 2) + pow($efc, 2) - pow($fdc, 2)) / (2 * $dec * $efc)));
$F = rad2deg(acos((pow($efc, 2) + pow($fdc, 2) - pow($dec, 2)) / (2 * $efc * $fdc)));
$s = ($dec + $efc + $fdc) / 2;
$area = sqrt($s*($s-$dec)*($s-$efc)*($s-$fdc));
echo "<br>";
echo "DE: " . $dec . "<br>";
echo "EF: " . $efc . "<br>";
echo "FD: " . $fdc . "<br>";
echo "<br>";
echo "D: " . $D . "<br>";
echo "E: " . $E . "<br>";
echo "F: " . $F . "<br>";
echo "<br>";
echo "Area: " . $area;
?>
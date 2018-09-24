<?php
    include_once("includes/dbparams.php");
    include_once("includes/dbcon.php");

        $sql = "SELECT id, inch, stocklevel FROM tvs";
        try {
            $q = $dbh->prepare($sql);
            $q->execute();
            while ($obj = $q->fetchObject()) {
                $tv[$obj->id] = $obj->inch;
            }
        }
        catch(PDOException $e) {
            printf("<p>%s</p>\n", $e->getMessage());
        }

        $sql = "SELECT id, color, ballsleft FROM tennisballs";
        try {
            $q = $dbh->prepare($sql);
            $q->execute();
            while ($obj = $q->fetchObject()) {
                $tb[$obj->id] = $obj->color;
            }
        }
        catch(PDOException $e) {
            printf("<p>%s</p>\n", $e->getMessage());
        }

        $sql = "SELECT id, color, noinstock FROM golfballs";
        try {
            $q = $dbh->prepare($sql);
            $q->execute();
            while ($obj = $q->fetchObject()) {
                $gb[$obj->id] = $obj->color;
            }
        }
        catch(PDOException $e) {
            printf("<p>%s</p>\n", $e->getMessage());
        }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="php/updatestock.php" method="POST">
            <select name="tvid">
                <?php
                foreach ($tv as $key => $value) {
                    echo sprintf("<option value='%s'>%s</option>", $key, $value);
                }
                ?>
            </select>
            <input type="number" name="tva" max="">
            <select name="tbid">
                <?php
                foreach ($tb as $key => $value) {
                    echo sprintf("<option value='%s'>%s</option>", $key, $value);
                }
                ?>
            </select>
            <input type="number" name="tba">
            <select name="gbid">
                <?php
                foreach ($gb as $key => $value) {
                    echo sprintf("<option value='%s'>%s</option>", $key, $value);
                }
                ?>
            </select>
            <input type="number" name="gba">
            <input type="submit" value="submit">
        </form>
    </body>
</html>
<?php
    require_once 'includes/dbparams.php';
    require_once 'includes/dbcon.php';
    $title = 'BE.2.0 - Christoffer H. Knudsen';
    $pop = isset($_GET['pop']) ? $_GET['pop'] : '0';
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title><?php echo $title; ?></title>
        <link rel='stylesheet' href='./css/style.css'/>
    </head>
    <body>
        <header>
            <h1><?php echo $title; ?></h1>
            <h2>Example of Reading from Db</h2>
        </header>
        <main>
        <!-- more html goes here -->
<?php
        $sql = "SELECT continent, name, population AS pop";
        $sql .= " FROM country";
        $sql .= " WHERE population > :pop ORDER BY continent";
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':pop', $pop);
            $q->execute();
            print("<table>\n");
            while ($obj = $q->fetchObject()) {
                printf("<tr><td>%s</td><td>%s</td><td class='num'>%s</td></tr>\n", 
                        $obj->continent, $obj->name,
                        number_format($obj->pop));
            }
            print("</table>\n");
        } catch(PDOException $e) {
            printf("<p>%s</p>\n", $e->getMessage());
        }
?>
        </main>
        <footer><address>&copy; NML, 2014</address></footer>
    </body>
</html>
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
        <style>
            .country td{
                background-color: yellow;
            }
        </style>
    </head>
    <body>
        <header>
            <h1><?php echo $title; ?></h1>
            <h2>Example of Reading from Db</h2>
        </header>
        <main>
        <!-- more html goes here -->
<?php
        $sql = "SELECT continent,
                name, 
                population AS pop,
                language,
                isofficial,
                percentage
        FROM country 
        INNER JOIN countrylanguage 
        ON country.code = countrylanguage.countrycode 
        WHERE population > :pop ORDER BY code";
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':pop', $pop);
            $q->execute();
            print("<table>\n");
            $lastCountry = "";
            while ($obj = $q->fetchObject()) {
                if($lastCountry == $obj->name){
                    if($obj->isofficial == "T"){
                        $official = "Official";
                    }
                    else{
                        $official = "";
                    }
                    printf(
                        "<tr class='languages'><td class='lang'>%s</td><td class='official'>%s&#37;</td><td class='percent'>%s</td></tr>\n", 
                        $obj->language,
                        $obj->percentage,
                        $official
                        );
                }
                else{
                    printf(
                        "<tr class='country'><td>%s</td><td class='num'>%s</td></tr>\n", 
                        $obj->name,
                        number_format($obj->pop)
                        );
                }
                $lastCountry = $obj->name;
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
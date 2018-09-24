<?php
require_once 'includes/dbparams.php';
require_once 'includes/dbcon.php';
require_once 'classes/Sellable.php';
require_once 'classes/Television.php';
require_once 'classes/TennisBall.php';
require_once 'classes/GolfBall.php';
require_once 'classes/StoreManager.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Testing Interface, OO PHP</title>
    </head>
    <body>
<?php
    $tv = new Television();
    $tv->setScreenSize(42);
    
    $ball = new TennisBall();
    $ball->setColor('yellow');
    
    $golfBall = new GolfBall();
    $golfBall->setColor('white');
    $golfBall->setIndents('422');
    
    $manager = new StoreManager();
    $manager->addProduct($tv);
    $manager->addProduct($ball);
    $manager->addProduct($golfBall);
    $manager->stockUp();
    
    printf("<p>There are %s %s-inch televisions, %s "
            . "%s tennis balls in stock and %s %s golf balls with %s dimples in stock.</p>\n"
            , $tv->getStockLevel()
            , $tv->getScreenSize()
            , $ball->getStockLevel()
            , $ball->getColor()
            , $golfBall->getStockLevel()
            , $golfBall->getColor()
            , $golfBall->getIndents());

    print("<p>Selling a television ...</p>\n");
    $tv->sellItem();
    print("<p>Selling two tennis balls...</p>\n");
    $ball->sellItem();
    $ball->sellItem();
    print("<p>Selling 51 golf balls...</p>\n");
    for($i=0;$i<51;$i++){
        $golfBall->sellItem();
    }
    
    printf("<p>There are now %s %s-inch televisions, %s "
            . "%s tennis balls in stock and %s %s golf balls with %s dimples in stock.</p>\n"
            , $tv->getStockLevel()
            , $tv->getScreenSize()
            , $ball->getStockLevel()
            , $ball->getColor()
            , $golfBall->getStockLevel()
            , $golfBall->getColor()
            , $golfBall->getIndents());
?>
    </body>
</html>
<?php
    require_once 'classes/Product.php';
    require_once 'classes/Book.php';
    require_once 'classes/DVD.php';
    require_once 'classes/LiveLecture.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
    $book = new Book('IT Kommunikation', 172);
    $film = new DVD('@Adactio at AEA', '1 h 5 m');
    $ll = new LiveLecture('@Adactio at AEA'
            , '1 h 5 m'
            , 'Jeremy Keith'
            , 'Web Design Principles');
    $book->display();
    $film->display();
    $ll->display();
?>
    </body>
</html>
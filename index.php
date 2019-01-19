<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 1/14/2019
 * Time: 10:10 AM
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload
require_once('vendor/autoload.php');

//Create an instance of the Base Class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {
    echo '<h1>My Pets!</h1>';

    echo "<a href='order'>Order a Pet</a>";
    //$view = new View;
    //echo $view->render('views/home.html');
});

$f3->route('GET /@pet', function($f3, $params) {
    print_r($params);

    $pet = $params['pet'];
    echo "You like $pet";

    if($pet =="dog") {
        echo "<p>Woof!</p>";
    }
    else if($pet == 'cat') {
        echo "<p>Meow!</p>";
    }
    else if($pet == 'chicken') {
        echo "<p>Bok!</p>";
    }
    else if($pet == 'cow') {
        echo "<p>Moo!</p>";
    }
    else if($pet == 'horse') {
        echo "<p>Neigh!</p>";
    }
    else {
        $f3->reroute("");

        //display a 404 error
        $f3->error(404);
    }
});

//Define a lunch route
$f3->route('GET /order', function() {
    $view = new View();
    echo $view->render('views/form1.html');
});

//Run fat free
$f3->run();
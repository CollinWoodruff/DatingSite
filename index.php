<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 1/14/2019
 * Time: 10:10 AM
 */
session_start();
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
    echo '<nav><ul><li><a href="model/Database.php">Member Table</a></li></ul></nav>';
    $view = new View;
    echo $view->render('views/home.html');
});


//Define a form1 route
$f3->route('GET|POST /date', function($f3) {
    echo '<nav><ul><li><a href="model/Database.php">Member Table</a></li></ul></nav>';
    $_SESSION = array();

    if(isset($_POST['membership']))
    {
        $Pmember = $_POST['membership'];
        if (validString($Pmember))
        {
            $_SESSION['membership'] = $Pmember;
        }
    }

    $template = new Template();
    echo $template->render('views/Registration.php');
});

//Define a form2 route
$f3->route('GET|POST /date2', function($f3) {
    echo '<nav><ul><li><a href="model/Database.php">Member Table</a></li></ul></nav>';

include("model/Validation.php");
    $f3->set('first', 'jshmo');



    $template = new Template();
    echo $template->render('views/Profile.html');
});

//Define a form3 route
$f3->route('GET|POST /date3', function($f3) {
    echo '<nav><ul><li><a href="model/Database.php">Member Table</a></li></ul></nav>';

    if(isset($_POST['color']))
    {
        $color = $_POST['color'];
        if (validColor($color))
        {
            $_SESSION['color'] = $color;
            $f3->reroute('results');
        }
        else
        {
            $f3->set("errors['color']", "Please choose a color.");
        }
    }

    $template = new Template();
    echo $template->render('views/Interests.html');
});

//Define a form4 route
$f3->route('GET|POST /date4', function($f3) {
    echo '<nav><ul><li><a href="model/Database.php">Member Table</a></li></ul></nav>';
    $_SESSION['animal'] = $_POST['animal'];

    if(isset($_POST['color']))
    {
        $color = $_POST['color'];
        if (validColor($color))
        {
            $_SESSION['color'] = $color;
            $f3->reroute('results');
        }
        else
        {
            $f3->set("errors['color']", "Please choose a color.");
        }
    }

    $template = new Template();
    echo $template->render('views/Summary.php');
});

//Run fat free
$f3->run();
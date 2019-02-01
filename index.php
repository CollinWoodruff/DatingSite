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
    $view = new View;
    echo $view->render('views/home.html');
    echo "<button id='CreateProfile' class='btns' type='submit'><a href='order'>Create a Profile!</a></button>";
});

//Define a form1 route
$f3->route('GET|POST /order', function($f3) {
    $_SESSION = array();

    if(isset($_POST['animal']))
    {
        $animal = $_POST['animal'];
        if (validString($animal))
        {
            $_SESSION['animal'] = $animal;
            $f3->reroute('order2');
        }
        else
        {
            $f3->set("errors['animal']", "Please enter an animal.");
        }
    }

    $template = new Template();
    echo $template->render('views/PersonalInfo.html');
});

//Define a form2 route
$f3->route('GET|POST /order2', function($f3) {
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
    echo $template->render('views/Profile.html');
});

//Define a form2 route
$f3->route('GET|POST /order3', function($f3) {
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
    echo $template->render('views/Interests.html');
});

//Define a form2 route
$f3->route('GET|POST /order3', function($f3) {
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
    echo $template->render('views/Summary.html');
});



//Run fat free
$f3->run();
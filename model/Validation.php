<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 3/2/2019
 * Time: 4:46 PM
 */
print_r($_POST);
$isValid = $fname = $lname = $age = $sex = $phone = "";
if(!empty($_POST['submit'])) {

    $isValid = true;

    if (!empty($_POST['firstName'])) {
        $fname = $_POST['firstName'];
    } else {
        $errorName = "Please enter a name";
        $isValid = false;
    }

    if (!empty($_POST['lastName'])) {
        $lname = $_POST['lastName'];
    } else {
        $errorName = "Please enter a name";
        $isValid = false;
    }

    if (!empty($_POST['age'])) {
        $age = $_POST['age'];
    } else {
        $errorAge = "Please enter a name";
        $isValid = false;
    }

    if (!empty($_POST['male'])) {
        $sex = $_POST['male'];
    } else if (!empty($_POST['female'])) {
        $sex = $_POST['female'];
    } else {
        $errorSex = "Please enter a name";
        $isValid = false;
    }

    if (!empty($_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        $errorPhone = "Please enter a name";
        $isValid = false;
    }

    return $isValid;
}

if ($isValid == true)
{
    $_SESSION['firstName'] = $fname;
    $_SESSION['lastName'] = $lname;
    $_SESSION['age'] = $age;
    $_SESSION['sex'] = $sex;
    $_SESSION['phone'] = $phone;

    print_r($_SESSION);
}
else
{
    echo "<p>Is not valid</p>";
}
<?php

//This is my controller for the wk6 project

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once ('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define routes
$f3->route('GET /', function () {
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /breakfast', function () {
    //Display the home page
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

$f3->route('GET /lunch', function () {
    echo "<h2>What's for Lunch?</h2>";
    //Display the home page
    $view = new Template();
    echo $view->render('views/lunch.html');
});

$f3->route('GET|POST /order1', function () {

    //If the form has been submitted, add the data to session
    //and send the user to the next order form
    if ($_SERVER['REQUEST_METHOD']  == 'POST') {
        var_dump($_POST);
        $_SESSION['food'] = $_POST['food'];
        $_SESSION['meal'] = $_POST['meal'];
        header('location: order2');
    }

    //Display the order1 page
    $view = new Template();
    echo $view->render('views/order1.html');
});

$f3->route('GET|POST /order2', function () {
    if ($_SERVER['REQUEST_METHOD']  == 'POST') {
        var_dump($_POST);
        //data validation

        $_SESSION['conds'] = implode(", ", $_POST['conds']);
        header('location: summary');
    }

    //Display the order1 page
    $view = new Template();
    echo $view->render('views/order2.html');
});

$f3->route('GET|POST /summary', function () {
    if ($_SERVER['REQUEST_METHOD']  == 'POST') {
        var_dump($_POST);
        //data validation

    }

    //Display the order1 page
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();


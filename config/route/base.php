<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017-03-30
 * Time: 09:30
 */


$app->router->add("", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("take1/home");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("about", function () use ($app) {
    $app->view->add("take1/header", ["title" => "About"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("take1/about");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("report", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Report"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("take1/report");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("status", function () use ($app) {
    $data = [
        "Server" => php_uname(),
        "PHP version" => phpversion(),
        "Included files" => count(get_included_files()),
        "Memory used" => memory_get_peak_usage(true),
        "Execution time" => microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],
    ];

    $app->response->sendJson($data);
});

$app->router->add("details", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Details"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("take1/details");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("diceGame", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Dice Game"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("dice/diceGame");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

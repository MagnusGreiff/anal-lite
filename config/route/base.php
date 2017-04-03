<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017-03-30
 * Time: 09:30
 */


$app->router->add("", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Home"]);
    $app->view->add("take1/navbar");
    $app->view->add("take1/home");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("about", function () use ($app) {
    $app->view->add("take1/header", ["title" => "About"]);
    $app->view->add("take1/navbar");
    $app->view->add("take1/about");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("report", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Report"]);
    $app->view->add("take1/navbar");
    $app->view->add("take1/report");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("status", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Status"]);
    $app->view->add("take1/navbar");
    $app->view->add("take1/status");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("details", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Details"]);
    $app->view->add("take1/navbar");
    $app->view->add("take1/details");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

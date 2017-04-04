<?php
$app->router->add("session", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Session"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("session/session");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("session/destroy", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Session Destroy"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("session/destroy");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("session/increment", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Session Increment"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("session/increment");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("session/decrement", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Session Decrement"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("session/decrement");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("session/status", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Session Status"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("session/status");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("session/dump", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Session Dump"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("session/dump");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

<?php

$app->router->add("shop/**", function () use ($app) {
    $session = new \Radchasay\Session\Session();
    $session->start();
    $login = $app->url->create("login");
    if (!$session->has("name")) {
        $app->response->redirect($login);
    }
});


$app->router->add("shop/shopShow", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Shop Show"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("shop/shopShow");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("shop/shopCreate", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Shop Create"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("shop/shopCreate");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("shop/shopUpdate", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Shop Update"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("shop/shopUpdate");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("shop/shopDelete", function () use ($app) {
    $app->view->add("take1/header", ["title" => "shopDelete"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("shop/shopDelete");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

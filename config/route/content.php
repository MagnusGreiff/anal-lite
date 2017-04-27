<?php

$app->router->add("content/content", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Content"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("content/content");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("content/pages", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Content"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("content/pages");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("content/page", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Content"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("content/page");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("content/blogs", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Content"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("content/blogs");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("content/blog", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Content"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("content/blog");
    $app->view->add("block/footer", ["class" => "footer", "text" => "Skapad av Magnus Greiff - OOPHP"]);

    $app->response->setBody([$app->view, "render"])->send();
});

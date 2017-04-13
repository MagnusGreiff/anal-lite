<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017-03-30
 * Time: 09:29
 */

$app->router->addInternal("404", function () use ($app) {
    $app->view->add("take1/header", ["title" => "404"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("take1/404");

    $app->response->setBody([$app->view, "render"])->send(404);
});

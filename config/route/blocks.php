<?php

$app->router->add("block/block", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Block Testing"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("block/block");
    $app->view->add("block/sidebar", ["links" => [["../admin/admin" => "admin"], ["../admin/createPost" => "Create post"]]]);
    $app->view->add("block/footer", ["class" => "footer", "text" => "Skapad av Magnus Greiff - OOPHP"]);

    $app->response->setBody([$app->view, "render"])->send();
});

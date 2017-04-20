<?php
$app->router->add("admin", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Admin Tools"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/admin");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("search", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Search"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/search");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("adminCreate", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Create User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/create_user");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("adminEdit", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Edit User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/edit_user");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("showAll", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Show All Users"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/showAll");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("adminDelete", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Delete User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/showAll");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("handle_new_user_admin", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Delete User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/handle_new_user_admin");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("adminPassword", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Delete User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/admin_change_password");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

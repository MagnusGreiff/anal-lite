<?php
$app->router->add("admin/**", function () use ($app) {
    $session = new \Radchasay\Session\Session();
    $session->start();
    $login = $app->url->create("login");
    if (!$session->has("name")) {
        $app->response->redirect($login);
    }
});

$app->router->add("admin/admin", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Admin Tools"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/admin");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("admin/search", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Search"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/search");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("admin/adminCreate", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Create User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/create_user");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("admin/adminEdit", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Edit User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/edit_user");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("admin/showAll", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Show All Users"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/showAll");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("admin/adminDelete", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Delete User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/showAll");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("admin/handle_new_user_admin", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Delete User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/handle_new_user_admin");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("admin/adminPassword", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Delete User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/admin_change_password");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("admin/posts", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Show Posts"]);
    $app->view->add("navbar2/navbar2");

    $app->view->add("admin/posts");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("admin/editPost", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Show Posts"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/edit_post");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("admin/createPost", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Show Posts"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/create_post");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("admin/deletePost", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Show Posts"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("admin/delete_post");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

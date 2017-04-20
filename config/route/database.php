<?php
$app->router->add("login", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Login"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("login/login");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("welcome", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Welcome"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("login/welcome");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("create", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Create user"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("login/create_user");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("handle_new_user", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Handle new User"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("login/handle_new_user");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});


$app->router->add("validate", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Validate"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("login/validate");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("logout", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Logout"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("login/logout");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("changepwd", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Change password"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("login/change_password");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

$app->router->add("updateProfile", function () use ($app) {
    $app->view->add("take1/header", ["title" => "Update Profile"]);
    $app->view->add("navbar2/navbar2");
    $app->view->add("login/update_profile");
    $app->view->add("take1/footer");

    $app->response->setBody([$app->view, "render"])->send();
});

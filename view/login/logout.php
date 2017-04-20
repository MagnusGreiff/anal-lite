<?php


require_once("config.php");
$login = $app->url->create("login");

if ($session->has("name")) {
    $session->destroy();
} else {
    echo "<p>No active user</p>";
    echo "<p><a href='$login'>Login again</a></p>";
    die();
}

$has_session = session_status() == PHP_SESSION_ACTIVE;

if (!$has_session) {
    $app->response->redirect($login);
    exit;
}

echo "<p>Destroyed session</p>";

echo "<p><a href='$login'>Login again</a></p>";

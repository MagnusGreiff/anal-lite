<?php
$app->session->start();
$increment = isset($_SESSION["value"]) ? $_SESSION["value"] + 1 : 0;
$app->session->set("value", $increment);
$url = $app->url->create("session");
header("Location: $url");
exit;

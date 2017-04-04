<?php
$app->session->start();

$app->session->destroy();
$url = $app->url->create("session/dump");
header("Location: $url");
exit;

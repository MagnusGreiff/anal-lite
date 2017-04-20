<?php

$app->session->start();
$value = isset($_SESSION["value"]) ? $_SESSION["value"] : 0;
$app->session->set("value", $value);
$destroy = $app->url->create("session/destroy");
$increment = $app->url->create("session/increment");
$decrement = $app->url->create("session/decrement");
$dump = $app->url->create("session/dump");
$status = $app->url->create("session/status");

?>


<div class="sessionDiv">
    <h1>Value: <?= $app->session->get("value") ?></h1>
    <ul>
        <li class="button" id="increment"><a href="<?= $increment ?>">Increment</a></li>
        <li class="button" id="decrement"><a href="<?= $decrement ?>">Decrement</a></li>
        <li class="button" id="status"><a href="<?= $status ?>">Status</a></li>
        <li class="button" id="dump"><a href="<?= $dump ?>">Dump</a></li>
        <li class="button" id="destroy"><a href="<?= $destroy ?>">Destroy</a></li>
    </ul>
</div>

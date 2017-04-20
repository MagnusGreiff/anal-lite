<?php

$welcome = $app->url->create("welcome");
$search = $app->url->create("search");
$adminCreate = $app->url->create("adminCreate");
$adminEdit = $app->url->create("adminEdit");
$showAll = $app->url->create("showAll");
$adminPass = $app->url->create("adminPassword");

?>

<div id="adminTools">
    <ul>
        <li id="welcome"><p><a href='<?= $welcome ?>'>Go back to profile</a></p></li>
        <li id="search"><p><a href=' <?= $search ?>'>Search users</a></p></li>
        <li id="adminCreate"><p><a href=' <?= $adminCreate ?>'>Create user</a></p></li>
        <li id="adminEdit"><p><a href=' <?= $adminEdit ?>'>Edit user</a></p></li>
        <li id="adminDelete"><p><a href=' <?= $showAll ?>'>Delete user</a></p></li>
        <li id="showAll"><p><a href=' <?= $showAll ?>'>Show all users</a></p></li>
        <li id="adminPass"><p><a href=' <?= $adminPass ?>'>Edit password (Users)</a></p></li>
    </ul>
</div>

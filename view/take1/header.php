<?php
$req_uri = $_SERVER['REQUEST_URI'];

if (strpos($req_uri, "?") !== false) {
    $path = substr($req_uri, 0, strrpos($req_uri, '?'));
    $path = basename($path);
} else {
    $path = basename($req_uri);
}

?>
<!doctype html>
<html lang="en" class="<?= $path ?>">
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="<?= $this->asset("css/style.min.css") ?>">
<title><?= $title ?></title>

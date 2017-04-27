<?php

$getPath = $app->request->getGet("route");

$content = $app->content->showPage($getPath);

?>

<article>
    <header>
        <h1><?= htmlentities($content["title"]) ?></h1>
        <p>Created: <?= htmlentities($content["created"])?></p>
    </header>
    <?= $app->filter->doFilter(htmlentities($content["data"]), $content['filter']) ?>
</article>

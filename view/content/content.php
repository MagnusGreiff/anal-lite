<?php

echo "<h1>Content</h1>";

$pages = $app->url->create("content/pages");
$blogs = $app->url->create("content/blogs");
?>
<div class="contentDiv">
    <a href="<?= $pages ?>">Pages</a>
    <a href="<?= $blogs ?>">Blogs</a>
</div>

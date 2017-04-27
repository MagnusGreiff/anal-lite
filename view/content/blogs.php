<?php

$blogs = $app->content->showBlogs();
$blog = $app->url->create("content/blog");


?>

<article>

    <?php foreach ($blogs as $row) : ?>
        <section>
            <header>
                <h1><a href="<?= $blog ?>?route=<?= htmlentities($row["slug"]) ?>"><?= htmlentities($row["title"]) ?></a></h1>
                <p><i>Published: <time datetime="<?= htmlentities($row["published_iso8601"]) ?>" pubdate><?= htmlentities($row["published"])?></time></i></p>
            </header>
            <?= $app->filter->doFilter(htmlentities($row["data"]), $row['filter']) ?>
        </section>
    <?php endforeach; ?>

</article>
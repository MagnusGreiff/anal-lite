<?php

$pages = $app->content->showPages();
$page = $app->url->create("content/page");
?>
<table>
    <tr class="first">
        <th>Id</th>
        <th>Title</th>
        <th>Type</th>
        <th>Published</th>
        <th>Deleted</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Path</th>
        <th>Slug</th>
        <th>Status</th>
    </tr>
    <?php $id = -1; foreach ($pages as $row) :
        $id++;
        ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><a href="<?= $page ?>?route=<?= $row["path"] ?>"><?= $row["title"] ?></a></td>
            <td><?= $row["type"] ?></td>
            <td><?= $row["published"] ?></td>
            <td><?= $row["deleted"] ?></td>
            <td><?= $row["created"] ?></td>
            <td><?= $row["updated"] ?></td>
            <td><?= $row["path"] ?></td>
            <td><?= $row["slug"] ?></td>
            <td><?= $row["status"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>


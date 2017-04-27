<?php


echo "<h1>Posts</h1>";

$test = $app->content->getAllContent();
$adminPostEdit = $app->url->create("admin/editPost");
$adminPostDelete = $app->url->create("admin/deletePost")
?>

<table>
    <tr class="first">
        <th>Rad</th>
        <th>Id</th>
        <th>Title</th>
        <th>Type</th>
        <th>Published</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Deleted</th>
        <th>Actions</th>
    </tr>
    <?php $id = -1; foreach ($test as $row) :
        $id++;
        ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $row["id"] ?></td>
            <td><?= $row["title"] ?></td>
            <td><?= $row["type"] ?></td>
            <td><?= $row["published"] ?></td>
            <td><?= $row["created"] ?></td>
            <td><?= $row["updated"] ?></td>
            <td><?= $row["deleted"] ?></td>
            <td>
                <a class="icons" href="<?= $adminPostEdit ?>?route=edit&amp;id=<?= $row["id"] ?>" title="Edit this content">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
                <a class="icons" href="<?= $adminPostDelete ?>?route=delete&amp;id=<?= $row["id"] ?>" title="Edit this content">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

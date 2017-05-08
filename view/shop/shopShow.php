<?php

$edit = $app->url->create("shop/shopUpdate");
$delete = $app->url->create("shop/shopDelete");
$create = $app->url->create("shop/shopCreate");
$show = $app->url->create("shop/shopShow");

?>


<?php
$hits = $app->request->getGet("hits", 4);
$page = $app->request->getGet("page", 1);
$orderBy = $app->request->getGet("orderby", "id");
$order = $app->request->getGet("order", "asc");

$count = "SELECT COUNT(description) AS max FROM Product;";
$resCount = $app->db->executeFetchAll($count);
$max = ceil($resCount[0]["max"] / $hits);
/*if (!(is_numeric($hits) && $hits > 0 && $hits <= 8)) {
    $redirectHits = $app->user->mergeQueryString(["hits" => 2]);
    $app->response->redirect($redirectHits);
}

if (!(is_numeric($hits) && $page > 0 && $page <= $max)) {
    $redirectPages = $app->user->mergeQueryString(["page" => 1]);
    $app->response->redirect($redirectPages);
}*/
$offset = $hits * ($page - 1);
$res = $app->db->executeFetchAll("SELECT * FROM VProduct ORDER BY $orderBy $order LIMIT $hits OFFSET $offset");
?>
<div>
    <p>Items per page:
        <a href="<?= $app->user->mergeQueryString(["hits" => 2]) ?>">2</a> |
        <a href="<?= $app->user->mergeQueryString(["hits" => 4]) ?>">4</a> |
        <a href="<?= $app->user->mergeQueryString(["hits" => 8]) ?>">8</a>
    </p>
    <table>
        <tr class="first">
            <th>Id <?= $app->user->orderby("id") ?></th>
            <th>Description<?= $app->user->orderby("description") ?></th>
            <th>Price<?= $app->user->orderby("price") ?></th>
            <th>Status<?= $app->user->orderby("Status") ?></th>
            <th>Image<?= $app->user->orderby("image") ?></th>
            <th>Category<?= $app->user->orderby("category") ?></th>
            <th>Actions</th>
        </tr>
        <?php foreach ($res as $row) :
            ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["Description"] ?></td>
                <td><?= $row["Price"] ?></td>
                <td><?= $row["Status"] ?></td>
                <td><?= $row["Image"] ?></td>
                <td><?= $row["Category"] ?></td>
                <td>
                    <a class="icons" href="<?= $edit ?>?route=edit&amp;id=<?= $row["id"] ?>" title="Edit this content">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a class="icons"
                       href="<?= $delete ?>?route=delete&amp;id=<?= $row["id"] ?>&amp;hits=<?= $hits ?>&amp;page=<?= $page ?>"
                       title="Edit this content">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p>
        Pages:
        <?php for ($i = 1; $i <= $max; $i++) : ?>
            <a href="<?= $app->user->mergeQueryString(["page" => $i]) ?>"><?= $i ?></a>
        <?php endfor; ?>
    </p>
</div>

<div>
    <ul>
        <li><a href="<?= $show ?>">Show all products</a></li>
        <li><a href="<?= $create ?>">Create new product</a></li>
    </ul>
</div>

<?php
/*

$hits = $app->request->getGet("hits", 4);
$page = $app->request->getGet("page", 1);
$orderBy = $app->request->getGet("orderby", "name");
$order = $app->request->getGet("order", "asc");
$emailToDelete = $app->request->getPost("emailToDelete");
*/ ?><!--

<div id="showAll">
    <?php
/*
    $app->user->showAllUsers($hits, $page, $orderBy, $order);
    
    
    */ ?>


    <form action="" method="post">
        <label for="">Delete user (Email)</label>
        <input type="email" name="emailToDelete">
        <input type="submit" value="Delete" name="deleteButton">
    </form>
    
    <?php
/*    if (isset($_POST["deleteButton"])) {
        $app->user->deleteUser($emailToDelete);
        echo "User deleted";
    }
    */ ?>
</div>-->

<div id="showAll">
    <p>Items per page:
        <a href="<?= $app->user->mergeQueryString(["hits" => 2]) ?>">2</a> |
        <a href="<?= $app->user->mergeQueryString(["hits" => 4]) ?>">4</a> |
        <a href="<?= $app->user->mergeQueryString(["hits" => 8]) ?>">8</a>
    </p>
    <?php
    
    $hits = $app->request->getGet("hits", 4);
    $page = $app->request->getGet("page", 1);
    $orderBy = $app->request->getGet("orderby", "name");
    $order = $app->request->getGet("order", "asc");
    $emailToDelete = $app->request->getPost("emailToDelete");
    
    $count = "SELECT COUNT(name) AS max FROM setup_user;";
    $resCount = $app->db->executeFetchAll($count);
    $max = ceil($resCount[0]["max"] / $hits);
    if (!(is_numeric($hits) && $hits > 0 && $hits <= 8)) {
        $redirectHits = $app->user->mergeQueryString(["hits" => 2]);
        $app->response->redirect($redirectHits);
    }
    
    if (!(is_numeric($hits) && $page > 0 && $page <= $max)) {
        $redirectPages = $app->user->mergeQueryString(["page" => 1]);
        $app->response->redirect($redirectPages);
    }
    $offset = $hits * ($page - 1);
    $sql = "SELECT name, age, email, type FROM setup_user ORDER BY $orderBy $order LIMIT $hits OFFSET $offset";
    $resSql = $app->db->executeFetchAll($sql);
    $app->user->showAllUsers($resSql);
    
    
    ?>

    <p>
        Pages:
        <?php for ($i = 1; $i <= $max; $i++) : ?>
            <a href="<?= $app->user->mergeQueryString(["page" => $i]) ?>"><?= $i ?></a>
        <?php endfor; ?>
    </p>


    <form action="" method="post">
        <label for="">Delete user (Email)</label>
        <input type="email" name="emailToDelete">
        <input type="submit" value="Delete" name="deleteButton">
    </form>
    
    <?php
    if (isset($_POST["deleteButton"])) {
        $app->user->deleteUser($emailToDelete);
        echo "User deleted";
    }
    ?>
</div>
<?php


$hits = $app->request->getGet("hits", 4);
$page = $app->request->getGet("page", 1);
$orderBy = $app->request->getGet("orderby", "name");
$order = $app->request->getGet("order", "asc");
$emailToDelete = $app->request->getPost("emailToDelete");
?>

<div id="showAll">
    <?php
    
    $app->user->showAllUsers($hits, $page, $orderBy, $order);
    
    
    ?>


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
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2017-04-24
 * Time: 15:11
 */


if ($app->request->getPost("doDelete")) {
    $app->content->deleteContent();
}
$id = $app->request->getGet("id");
$content = $app->content->getAllContentWhereId($id);
?>

<form action="" method="post">
    <fieldset>
        <legend>Edit</legend>
        <p>
            <label>Title:<br>
                <input type="text" name="contentTitle" value="<?= htmlentities($content["title"]); ?>"/>
            </label>
        </p>
        <input type="submit" value="Delete" name="doDelete">
    </fieldset>
</form>

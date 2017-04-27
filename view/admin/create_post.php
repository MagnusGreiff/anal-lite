<?php

if ($app->request->getPost("create")) {
    $title = $app->request->getPost("contentTitle");
    $app->content->insertIntoDatabase($title);
}

?>


<form action="" method="post">
    <fieldset>
        <legend>Create</legend>

        <p>
            <label>Title:<br>
                <input type="text" name="contentTitle"/>
            </label>
        </p>
        <p>
            <input type="submit" value="Create" name="create">
        </p>
    </fieldset>
</form>

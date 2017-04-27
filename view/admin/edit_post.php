<?php

$getId = $app->request->getGet("id");

$getContent = $app->content->getAllContentWhereId($getId);


if (isset($_POST["doSave"])) {
    $app->content->updateContentWhereId();
}

?>

<form method="post">
    <fieldset>
        <legend>Edit</legend>
        <input type="hidden" name="contentId" value="<?= htmlentities($getContent["id"]) ?>"/>

        <p>
            <label>Title:<br>
                <input type="text" name="contentTitle" value="<?= htmlentities($getContent["title"]); ?>"/>
            </label>
        </p>

        <p>
            <label>Path:<br>
                <input type="text" name="contentPath" value="<?= htmlentities($getContent["path"]); ?>"/>
        </p>

        <p>
            <label>Slug:<br>
                <input type="text" name="contentSlug" value="<?= htmlentities($getContent["slug"]);?>"/>
        </p>

        <p>
            <label>Text:<br>

                <textarea name="contentData"><?= htmlentities($getContent["data"]); ?></textarea>
        </p>

        <p>
            <label>Type:<br>
                <input type="text" name="contentType" value="<?= htmlentities($getContent["type"]); ?>"/>
        </p>

        <p>
            <label>Filter:<br>
                <input type="text" name="contentFilter" value="<?= htmlentities($getContent["filter"]); ?>"/>
        </p>

        <p>
            <label>Publish:<br>
                <input type="datetime" name="contentPublish" value="<?= htmlentities($getContent["published"]); ?>"/>
        </p>

        <p>
            <button type="submit" name="doSave"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
            <button type="submit" name="doDelete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </p>
    </fieldset>
</form>

<?php
$searchUser = isset($_GET["searchUser"]) ? $_GET["searchUser"] : null;
$welcome = $app->url->create("welcome");
?>

    <form method="get">
        <fieldset>
            <legend>Search</legend>
            <input type="hidden" name="route" value="search-user">
            <p>
                <label>Search Users:
                    <input type="search" name="searchUser" placeholder="Magnus"/>
                </label>
            </p>
            <p>
                <input type="submit" name="doSearch" value="Search">
            </p>
        </fieldset>
    </form>
    <p class="bwelcome"><a href='<?= $welcome ?>'>Back Welcome Page</a></p>
<?php
if ($searchUser) {
    echo $app->user->searchUsers($searchUser);
}

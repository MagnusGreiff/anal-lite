<?php
// Include config
require_once("config.php");
$logout = $app->url->create("logout");
$login = $app->url->create("login");
$change_pwd = $app->url->create("changepwd");
$updateProfile = $app->url->create("updateProfile");
$admin = $app->url->create("admin");

if (!$session->has("name")) {
    $app->response->redirect($login);
}


/*echo "<p>You are logged in as " . $session->get('name') . "</p>";*/

/*echo "<p><a href='info.php'>View session</a></p>";*/


$res = $app->db->executeFetch("SELECT * FROM setup_user WHERE email = ?", [$session->get("name")]);
$name = $res[0];
$age = $res[2];
$type = $res[3];
$email = $res[4];
?>

<h1 id="h1Welcome">Welcome <?= $res[0] ?></h1>
<h3 id="h3Welcome">Profile</h3>
<div id="profileWrapper">
    <div id="profileInfo">
        <table id="tableWelcome">
            <tr>
                <td>Name: <?= $name ?></td>
            </tr>
            <tr>
                <td>Age: <?= $age ?></td>
            </tr>
            <tr>
                <td>Type: <?= $type ?></td>
            </tr>
            <tr>
                <td>Email: <?= $email ?></td>
            </tr>
        </table>
        <?php
        $app->cookie->set("test", date("Y-m-d H:i:s"));
        ?>
        <p id="lliWelcome">Last logged in: <?= $app->cookie->get("test"); ?></p>
    </div>
    <div id="links">
        <p><a href='<?= $admin ?>'>Admin tools</a></p>
        <p><a href='<?= $change_pwd ?>'>Change password</a></p>
        <p><a href='<?= $updateProfile ?>'>Update Profile</a></p>
        <p><a href='<?= $logout ?>'>Logout</a></p>
    </div>

</div>

<?php
require_once("config.php");

$user_loggedin = "";
$create_user = $app->url->create("create");
$validate = $app->url->create("validate");

if ($session->has("login")) {
    echo "<p>You are already logged in as " . $session->get('name') . "</p>";
    echo "<p><a href='logout.php'>Logout</a></p>";
    $user_loggedin = "disabled";
}


?>

<form action="" method="post">
    <table>
        <legend><h3>Login form</h3></legend>
        <tr>
            <td>Enter Email:</td>
            <td><input type="email" name="email" <?= $user_loggedin ?>></td>
        </tr>
        <tr>
            <td>Enter pass:</td>
            <td><input type="password" name="pass" <?= $user_loggedin ?>></td>
        </tr>
        <tr>
            <td><input type="submit" id="loginSubmit" name="submitForm" value="Login" <?= $user_loggedin ?>></td>
        </tr>
    </table>
</form>
<p id="login"><a href="<?= $create_user ?>">Create user</a></p>


<?php

if ($app->request->getPost("submitForm")) {
    $email = $app->request->getPost("email", null);
    $welcome = $app->url->create("welcome");
    $user_pass = $app->request->getPost("pass", null);
    if ($email != null && $user_pass != null) {
        if ($app->user->exists($email)) {
            $get_hash = $app->user->getHash($email);
            if (password_verify($user_pass, $get_hash)) {
                $session->set("name", "$email");
                $app->response->redirect($welcome);
            } else {
                echo "<p class='infoLogin' id='loginWrongDetails'>Username or password is incorrect.</p>";
            }
        } else {
            // Redirect to login.php
            echo "<p class='infoLogin' id='noUser'>No such user.</p>";
        }
    }
}
?>

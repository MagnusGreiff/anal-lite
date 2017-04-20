<?php


require_once("config.php");

$user = $session->get("name");
$status = "Change password";
$change_pwd = $app->url->create("changepwd");
$login = $app->url->create("login");


$old_pass = $app->request->getPost("old_pass", null);
$new_pass = $app->request->getPost("new_pass", null);
$re_pass = $app->request->getPost("re_pass", null);

if ($old_pass != null && $new_pass != null && $re_pass != null) {
    if (password_verify($old_pass, $app->user->getHash($user))) {
        if ($new_pass == $re_pass) {
            $crypt_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $app->user->changePassword($user, $crypt_pass);
            $status = "Password changed.";
        } else {
            $status = "The passwords do not match.";
        }
    } else {
        $status = "Old password is incorrect.";
    }
} else {
    $status = "All fields must be filled.";
}
?>

<form action="<?= $change_pwd ?>" method="POST">
    <table>
        <legend><h3><?= $status ?></h3></legend>
        <tr>
            <td>Old pass:</td>
            <td><input type="password" name="old_pass"></td>
        </tr>
        <tr>
            <td>New pass:</td>
            <td><input type="password" name="new_pass"></td>
        </tr>
        <tr>
            <td>Re-enter pass:</td>
            <td><input type="password" name="re_pass"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submitForm" value="Change password"></td>
        </tr>
    </table>
</form>
<p id="cpwd"><a href='<?= $login ?>'>Back to login</a></p>


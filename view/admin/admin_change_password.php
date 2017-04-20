<?php
echo "<h1 id='cpwdh1'>Change Password (Users)</h1>";
$adminPassword = $app->url->create("adminPassword");
$adminTools = $app->url->create("admin");
$status = "Change password";
echo $app->dropdown->createDropdownList();

$getUser = $app->request->getPost("userSelect");

if ($app->request->getPost("userSelect") && $app->user->exists($getUser)) {
    $app->response->redirect("?route=user-edit&user=$getUser");
    exit;
}

if ($app->request->getGet("user")) {
    $user = $app->request->getGet("user");
    ?>

    <form action="<?= $adminPassword ?>" method="POST">
        <table>
            <legend><h3><?= $status ?></h3></legend>
            <label for=""><h3>You are current editing the profile for: <?= $user ?></h3></label>
            <input type="hidden" name="user" value="<?= $user ?>">
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
    <p class="bwelcome"><a href='<?= $adminTools ?>'>Back to Admin Tools</a></p>
    
    
    <?php
}


$new_pass = $app->request->getPost("new_pass", null);
$re_pass = $app->request->getPost("re_pass", null);

if ($app->request->getPost("submitForm")) {
    if ($new_pass != null && $re_pass != null) {
        if ($new_pass === $re_pass) {
            $crypt_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $orgUser = $app->request->getPost("user");
            $app->user->changePassword($orgUser, $crypt_pass);
            $status = "Password changed";
            $app->response->redirect($adminPassword);
            exit;
        } else {
            $status = "The password do not match.";
        }
    } else {
        $status = "All fields must be filled";
    }
}
?>

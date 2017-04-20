<?php
require_once("config.php");

$user = $session->get("name");
$status = "Update Profile";
$updateProfile = $app->url->create("updateProfile");
#$login = $app->url->create("login");
$welcome = $app->url->create("welcome");


$newName = $app->request->getPost("newName", null);
$newAge = $app->request->getPost("newAge", null);
$newType = $app->request->getPost("newType", null);
$newEmail = $app->request->getPost("newEmail", null);

$res = $app->db->executeFetch("SELECT * FROM setup_user WHERE email = ?", [$session->get("name")]);
$name = $res[0];
$age = $res[2];
$type = $res[3];
$email = $res[4];

if ($newName != null && $newAge != null && $newType != null && $newEmail != null) {
    if ($newEmail == $user) {
        $app->user->updateProfile($user, $newName, $newAge, $newType, $newEmail);
        $status = "Profile updated. Reload to see changes";
    } else if (!$app->user->exists($newEmail)) {
        $app->user->updateProfile($user, $newName, $newAge, $newType, $newEmail);
        $session->set("name", "$newEmail");
        $status = "Profile updated. Reload to see changes";
    } else {
        echo "User already exists! Choose another email.";
        $app->response->refresh(2, $updateProfile);
    }
} else {
    $status = "All fields must be filled.";
}


?>

<form action="<?= $updateProfile ?>" method="POST">
    <table>
        <legend><h3><?= $status ?></h3></legend>
        <tr>
            <td>New Name:</td>
            <td><input type="text" name="newName" value="<?= $name ?>"></td>
        </tr>
        <tr>
            <td>Age:</td>
            <td><input type="number" name="newAge" value="<?= $age ?>"></td>
        </tr>
        <td>Type:</td>
        <td>
            <select name="newType">
                <?php echo $type ?>
                <option value="Male" <?php echo ($type == "Male") ? 'selected="selected"' : '' ?>>Male</option>
                <option value="female" <?php echo ($type == "female") ? 'selected="selected"' : '' ?>>Female</option>
            </select>
        </td>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="newEmail" value="<?= $email ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submitForm" value="Update Profile"></td>
        </tr>
    </table>
</form>
<p class="bwelcome"><a href='<?= $welcome ?>'>Back Welcome Page</a></p>
<p id="reload"><a href="<?= $updateProfile ?>">Reload</a></p>

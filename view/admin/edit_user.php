<?php

$adminEdit = $app->url->create("adminEdit");
echo $app->dropdown->createDropdownList();

$getUser = $app->request->getPost("userSelect");


if ($app->request->getPost("userSelect") && $app->user->exists($getUser)) {
    $app->response->redirect("?route=user-edit&user=$getUser");
    exit;
}

if ($app->request->getGet("user")) {
    $user = $app->request->getGet("user");
    $sql = "SELECT name, age ,type, email FROM setup_user WHERE email=?";
    $res = $app->db->executeFetchAll($sql, [$user]);
    ?>
    <form action="<?= $adminEdit ?>" method="POST" id="editForm">
        <label for=""><h3>You are current editing the profile for: <?= $user ?></h3></label>
        <table>
            <tr>
                <td>New Name:</td>
                <input type="hidden" name="user" value="<?= $user ?>">
                <td><input type="text" name="newName" value="<?= $res[0]["name"] ?>"></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="number" name="newAge" value="<?= $res[0]["age"] ?>"></td>
            </tr>
            <td>Type:</td>
            <td>
                <select name="newType">
                    <option value="male" <?php echo ($res[0]["type"] == "male") ? 'selected="selected"' : '' ?>>Male
                    </option>
                    <option value="female" <?php echo ($res[0]["type"] == "female") ? 'selected="selected"' : '' ?>>
                        Female
                    </option>
                </select>
            </td>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="newEmail" value="<?= $res[0]["email"] ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submitForm" value="Update User"></td>
            </tr>
        </table>
    </form>
    <?php
}
$newName = $app->request->getPost("newName");
$newAge = $app->request->getPost("newAge");
$newType = $app->request->getPost("newType");
$newEmail = $app->request->getPost("newEmail");
$orgUser = $app->request->getPost("user");

if ($app->request->getPost("submitForm")) {
    if ($newEmail === $orgUser) {
        $app->user->updateProfile($orgUser, $newName, $newAge, $newType, $newEmail);
        echo "User updated";
        $app->response->redirect($adminEdit);
        exit;
    } else {
        if (!$app->user->exists($newEmail)) {
            $app->user->updateProfile($orgUser, $newName, $newAge, $newType, $newEmail);
            echo "User updated";
            $app->response->redirect($adminEdit);
            exit;
        } else {
            echo "<p id='ae'>User already exists! Choose another email. In two seconds you will be returned to the form</p>";
            $app->response->refresh(2, "$adminEdit?route=user-edit&user=$orgUser");
            exit;
        }
    }
}

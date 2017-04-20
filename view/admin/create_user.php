<?php
$adminTools = $app->url->create("admin");
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create user</title>
    </head>
    <body>
    <form action="" method="post">
        <table>
            <legend><h3>Create user</h3></legend>
            <tr>
                <td>Enter name:</td>
                <td><input type="text" name="new_name" required></td>
            </tr>
            <tr>
                <td>Choose pass:</td>
                <td><input type="password" name="new_pass" required></td>
            </tr>
            <tr>
                <td>Re-enter pass:</td>
                <td><input type="password" name="re_pass" required></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="number" name="age" min="0" max="100" required></td>
            </tr>
            <tr>
                <td>Type:</td>
                <td>
                    <select name="selectType">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submitCreateForm" value="Create"></td>
            </tr>
        </table>
    </form>
    <p id="rtat"><a href="<?= $adminTools ?>">Back to admin tools</a></p>
    </body>
    </html>

<?php

if ($app->request->getPost("submitCreateForm")) {
    $user_name = $app->request->getPost("new_name", null);
    $user_pass = $app->request->getPost("new_pass", null);
    $re_user_pass = $app->request->getPost("re_pass", null);
    $age = $app->request->getPost("age", null);
    $type = $app->request->getPost("selectType", null);
    $email = $app->request->getPost("email", null);

    $adminTools = $app->url->create("admin");
    $create = $app->url->create("adminCreate");

    $emailParts = explode("@", $email);
    $emailPart1 = $emailParts[0];
    $emailPart2 = $emailParts[1];

    if (!$app->user->exists($email)) {
        if ($user_pass != $re_user_pass) {
            echo "<p class='infoCreate' id='passwordNotMatching'>Passwords do not match</p>";
        } else {
            $crypt_pass = password_hash($user_pass, PASSWORD_DEFAULT);
            $app->user->addUser($user_name, $crypt_pass, $age, $type, $emailPart1, $emailPart2);
            echo "<p class='infoCreate' id='passwordSuccess'>Successfully added " . $user_name . "!</p>";
        }
    } else {
        echo "<p class='infoCreate' id='passwordAlreadyExists'>User already exists! Choose another username.</p>";
    }
}

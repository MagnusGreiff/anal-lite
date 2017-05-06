<?php
$showShow = $app->url->create("shop/shopShow");
?>
    <form action="" method="post">
        <table>
            <legend><h3>Create Product</h3></legend>
            <tr>
                <td>Enter description(name):</td>
                <td><input type="text" name="new_desc" maxlength="20" required></td>
            </tr>
            <tr>
                <td>Enter Price:</td>
                <td><input type="number" name="new_price" required></td>
            </tr>
            <tr>
                <td>Enter lStatus:</td>
                <td><input type="number" name="new_lStatus" required></td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>
                    <select name="selectCategory">
                        <option value="1">Desktop</option>
                        <option value="2">Laptop</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Image(path to image):</td>
                <td><input type="text" name="image" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submitCreateForm" value="Create Product"></td>
            </tr>
        </table>
        <p id="rtat"><a href="<?= $showShow ?>">Back to all products</a></p>
    </form>

<?php

if ($app->request->getPost("submitCreateForm")) {
    $description = $app->request->getPost("new_desc", null);
    $price = $app->request->getPost("new_price", null);
    $lStatus = $app->request->getPost("new_lStatus", null);
    $category = $app->request->getPost("selectCategory", null);
    $image = $app->request->getPost("image", null);

    $adminTools = $app->url->create("shop/shop");
    $create = $app->url->create("shop/shopCreate");

    $app->db->execute("INSERT INTO Product (description, price, lStatus, image) VALUES ('$description', '$price', '$lStatus', '$image')");
    $lastId = $app->db->lastInsertId();
    $app->db->execute("INSERT INTO Prod2Cat (prod_id, cat_id) VALUES ($lastId, $category)");
    //$app->user->addUser($user_name, $crypt_pass, $age, $type, $emailPart1, $emailPart2);
}

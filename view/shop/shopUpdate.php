<?php

$getId = $app->request->getGet("id");
$edit = $app->url->create("shop/shopUpdate?route=edit&id=$getId");
$res = $app->db->executeFetch("SELECT * FROM VProduct WHERE id = $getId");
$shopShow = $app->url->create("shop/shopShow");

?>

<form action="" method="POST" id="editForm">
    <table>
        <tr>
            <td>New Description:</td>
            <td><input type="text" name="new_desc" value="<?= $res["Description"] ?>"></td>
        </tr>
        <tr>
            <td>New Price:</td>
            <td><input type="number" name="new_price" value="<?= $res["Price"] ?>"></td>
        </tr>
        <tr>
            <td>New lStatus:</td>
            <td><input type="number" name="new_lStatus" value="<?= $res["Status"] ?>"></td>
        </tr>
        <td>Category:</td>
        <td>
            <select name="new_category">
                <option value="1" <?php echo ($res["Category"] == "desktop") ? 'selected="selected"' : '' ?>>Desktop
                </option>
                <option value="2" <?php echo ($res["Category"] == "laptop") ? 'selected="selected"' : '' ?>>
                    Laptop
                </option>
            </select>
        </td>
        <tr>
            <td>New Image</td>
            <td><input type="text" name="new_image" value="<?= $res["Image"] ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submitForm" value="Update Product"></td>
        </tr>
    </table>
    <a href="<?= $shopShow ?>">Back to all products</a>
</form>
<?php

$new_desc = $app->request->getPost("new_desc");
$new_price = $app->request->getPost("new_price");
$new_lStatus = $app->request->getPost("new_lStatus");
$new_category = $app->request->getPost("new_category");
$new_image = $app->request->getPost("new_image");


if ($app->request->getPost("submitForm")) {
    $app->db->execute("UPDATE Product SET description='$new_desc', price='$new_price', lStatus='$new_lStatus', image='$new_image' WHERE id=$getId");
    $app->db->execute("UPDATE Prod2Cat SET cat_id='$new_category' WHERE prod_id='$getId'");
    $app->response->refresh(0, "$edit");
    //$this->app->db->execute("UPDATE setup_user SET name='$name', age='$age', type='$type', email='$email' WHERE email='$userEmail'");
}
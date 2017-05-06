<?php

$getId = $app->request->getGet("id");
$getHits = $app->request->getGet("hits");


$app->db->execute("DELETE FROM Prod2Cat WHERE id=$getId");
$app->db->execute("DELETE FROM OrderRow WHERE product = $getId");
$app->db->execute("DELETE FROM Basket WHERE products = $getId");
$app->db->execute("DELETE FROM lStatusLog WHERE product = $getId");
$app->db->execute("DELETE FROM Product WHERE id=$getId");

$app->response->redirect("shopShow?hits=$getHits");

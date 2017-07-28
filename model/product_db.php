<?php
function get_products_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE products.categoryID = :category_id
              ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_product($product_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($category_id, $name, $status) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productName, status)
              VALUES
                 (:category_id, :name, :status)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':status', $status);
    $statement->execute();
    $statement->closeCursor();
}
?>
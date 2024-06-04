<?php

include $_SERVER['DOCUMENT_ROOT'] . '/libs/load.php';

Session::ensureLogin();

if (is_numeric($_POST['prodId'])) {
    try {
        $id = $_POST['prodId'];
        $userid = Session::getUser()->getId();
        $conn = Database::getConnection();

        $sql = "SELECT * FROM drug_data WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $drug_name = $row['drug_name'];
        $price = $row['price'];
        $quantity = 1;

        $sql = "SELECT * FROM cart WHERE drug_name = '$drug_name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $new_quantity = $row['quantity'] + $quantity;
            $sql = "UPDATE cart SET quantity = $new_quantity WHERE drug_name = '$drug_name'";
            $conn->query($sql);
            echo "success";
        } else {
            $userid = Session::getUser()->getId();
            $sql = "INSERT INTO cart (id, user_id, drug_name, price, quantity) VALUES ($id, $userid, '$drug_name', $price, $quantity)";
            $conn->query($sql);
            echo "success";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: No ID provided";
}

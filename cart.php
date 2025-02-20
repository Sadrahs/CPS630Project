<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST["item_id"];

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    if (isset($_SESSION["cart"][$item_id])) {
        $_SESSION["cart"][$item_id]++;
    } else {
        $_SESSION["cart"][$item_id] = 1;
    }

    echo "Item added to cart!";
}
?>

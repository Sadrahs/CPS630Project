<?php
session_start();
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    die("Please login to checkout.");
}

$user_id = $_SESSION["user_id"];
$total_price = 0;

foreach ($_SESSION["cart"] as $item_id => $quantity) {
    $result = $conn->query("SELECT price FROM items WHERE id = $item_id");
    $row = $result->fetch_assoc();
    $subtotal = $row["price"] * $quantity;
    $total_price += $subtotal;
}

// Insert order into `orders` table
$conn->query("INSERT INTO orders (user_id, total_price) VALUES ($user_id, $total_price)");
$order_id = $conn->insert_id;

// Insert order details into `order_details` table
foreach ($_SESSION["cart"] as $item_id => $quantity) {
    $conn->query("INSERT INTO order_details (order_id, item_id, quantity, subtotal) 
                  VALUES ($order_id, $item_id, $quantity, (SELECT price FROM items WHERE id=$item_id) * $quantity)");
}

// Clear the cart session
unset($_SESSION["cart"]);

echo "Order placed successfully!";
?>

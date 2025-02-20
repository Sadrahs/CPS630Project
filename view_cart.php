<?php
session_start();
include 'config.php';

echo "<h2>Shopping Cart</h2>";

if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
    echo "Your cart is empty.";
    exit;
}

echo "<ul>";
foreach ($_SESSION["cart"] as $item_id => $quantity) {
    $sql = "SELECT * FROM items WHERE id = $item_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    echo "<li>" . $row['name'] . " - $" . $row['price'] . " x " . $quantity . "</li>";
}
echo "</ul>";

echo "<a href='checkout.php'><button>Proceed to Checkout</button></a>";
?>

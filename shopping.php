<?php
include 'config.php';

$sql = "SELECT * FROM items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping - OSP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="shopping.php">Shopping</a></li>
                <li><a href="delivery.html">Delivery</a></li>
                <li><a href="payment.html">Payment</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="signup.html">Sign Up</a></li>
                <li><a href="signin.html">Sign In</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Available Products</h2>
        <div id="products">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='item'>";
                    echo "<img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                    echo "<h3>" . $row['name'] . "</h3>";
                    echo "<p>Price: $" . $row['price'] . "</p>";
                    echo "<button onclick='addToCart(" . $row['id'] . ")'>Add to Cart</button>";
                    echo "</div>";
                }
            } else {
                echo "No products available.";
            }
            ?>
        </div>
    </section>

    <script>
        function addToCart(itemId) {
            fetch("cart.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "item_id=" + itemId
            }).then(response => response.text())
              .then(data => alert(data));
        }
    </script>

</body>
</html>

<?php $conn->close(); ?>

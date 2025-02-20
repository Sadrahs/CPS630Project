<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $sql = "INSERT INTO users (name, email, password, phone, address) VALUES ('$name', '$email', '$password', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='signin.html'>Login here</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

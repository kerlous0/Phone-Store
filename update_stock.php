<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phonestore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Update the stock in the database
$sql = "UPDATE products SET stock = stock - $quantity WHERE id = $product_id";

if ($conn->query($sql) === TRUE) {
    echo "Stock updated successfully";
} else {
    echo "Error updating stock: " . $conn->error;
}

$conn->close();

<?php
// Include the database connection file
include '../database/database.php';

// Check if the product ID is passed via the URL
if (isset($_GET['id'])) {
    // Get the product ID
    $product_id = $_GET['id'];

    // Prepare the SQL query to delete the product from the database
    $sql = "DELETE FROM products WHERE id = $product_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the index page after successful deletion
        header('Location: ../index.php');
        exit();
    } else {
        // Handle errors (optional)
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If no product ID is provided, redirect to the index page
    header('Location: ../index.php');
    exit();
}
?>

<?php
// Include the database connection file
include '../database/database.php';

// Check if an ID is passed via the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch the current product details from the database
    $result = $conn->query("SELECT * FROM products WHERE id = $product_id");
    $product = $result->fetch_assoc();

    // If no product is found, redirect to the main page
    if (!$product) {
        header('Location: ../index.php');
        exit();
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Prepare the SQL query to update the product
    $sql = "UPDATE products SET name = '$name', description = '$description', price = '$price', status = '$status' WHERE id = $product_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the main page after successful update
        header('Location: ../index.php');
        exit();
    } else {
        // Handle errors (optional)
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Edit Product </title>
  <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
  <script src="../statics/js/bootstrap.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
      <div class="col-6">
        <div class="row">
          <p class="display-5 fw-bold">Edit Product</p>
        </div>
        <div class="row">
          <form class="form" method="POST">
            <div class="my-3">
              <label for="name">Product Name</label>
              <input class="form-control" type="text" name="name" id="name" value="<?= $product['name'] ?>" required />
            </div>
            <div class="my-3">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" required><?= $product['description'] ?></textarea>
            </div>
            <div class="my-3">
              <label for="price">Price</label>
              <input class="form-control" type="number" step="0.01" name="price" id="price" value="<?= $product['price'] ?>" required />
            </div>
            <div class="my-3">
              <label for="status">Availability</label>
              <select class="form-control" name="status" id="status" required>
                <option value="1" <?= $product['status'] == 1 ? 'selected' : '' ?>>In Stock</option>
                <option value="0" <?= $product['status'] == 0 ? 'selected' : '' ?>>Out of Stock</option>
              </select>
            </div>
            <div class="my-3">
              <button type="submit" class="btn btn-outline-dark">Update Product</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>

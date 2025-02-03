<?php
// Include the database connection file
include '../database/database.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Prepare the SQL query to insert the product into the database
    $sql = "INSERT INTO products (name, description, price, status) 
            VALUES ('$name', '$description', '$price', '$status')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the index page after successful insertion
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
  <title> Create Product </title>
  <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
  <script src="../statics/js/bootstrap.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
      <div class="col-6">
        <div class="row">
          <p class="display-5 fw-bold">Create Product</p>
        </div>
        <div class="row">
          <form class="form" method="POST">
            <div class="my-3">
              <label for="name">Product Name</label>
              <input class="form-control" type="text" name="name" id="name" required />
            </div>
            <div class="my-3">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" required></textarea>
            </div>
            <div class="my-3">
              <label for="price">Price</label>
              <input class="form-control" type="number" step="0.01" name="price" id="price" required />
            </div>
            <div class="my-3">
              <label for="status">Availability</label>
              <select class="form-control" name="status" id="status" required>
                <option value="1">In Stock</option>
                <option value="0">Out of Stock</option>
              </select>
            </div>
            <div class="my-3">
              <button type="submit" class="btn btn-outline-dark">Create Product</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>

<?php

try {
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "ordering_app";

  // Enable exceptions for mysqli
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  $conn = new mysqli($host, $username, $password, $database);

  // Check if the connection is successful
  if ($conn->connect_error) {
    die("Database connection unsuccessful: " . $conn->connect_error);
  }

  // echo "database connection success";

} catch (\Exception $e) {
  echo "Error: " . $e->getMessage();
}

?>

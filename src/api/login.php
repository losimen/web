<?php
$host = "dbnet";
$port = "5432";
$dbname = "cv_db";
$user = "postgres";
$password = "postgres";

$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

$email = $_GET['email'];
$password = $_GET['password'];

try {
  if (!$db) {
    throw new Exception("Failed to connect to database");
  }

  // Prepare the SQL query
  $sql = "SELECT * FROM users WHERE email = '$email'";

  // Execute the query
  $result = pg_query($db, $sql);

  // Check if any rows are returned
  if (pg_num_rows($result) > 0) {
    // Fetch the first row
    $row = pg_fetch_assoc($result);

    // Verify the password
    if (password_verify($password, $row['password'])) {
      echo "Login successful"; // Password is correct
    } else {
      throw new Exception("Wrong password"); // Password is incorrect
    }
  } else {
    throw new Exception("User not found"); // User with provided email doesn't exist
  }
} catch (Exception $err) {
  echo "Error: " . $err->getMessage();
}
?>

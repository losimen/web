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

  // Check if the provided email already exists in the database
  $checkExistingUserQuery = "SELECT * FROM users WHERE email = '$email'";
  $existingUserResult = pg_query($db, $checkExistingUserQuery);

  if (pg_num_rows($existingUserResult) > 0) {
    throw new Exception("Email already exists"); // Email is already registered
  }

  // Insert the new user into the database
  $insertUserQuery = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
  $insertResult = pg_query($db, $insertUserQuery);

  if ($insertResult) {
    echo "Signup successful"; // User successfully signed up
  } else {
    throw new Exception("Failed to insert user"); // Failed to insert user into the database
  }
} catch (Exception $err) {
  http_response_code(401);
  echo "Error: " . $err->getMessage();
}
?>

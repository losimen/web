<?php
$host = "dbnet";
$port = "5432";
$dbname = "cv_db";
$user = "postgres";
$password = "postgres";

$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

$email =  $_GET['email'];
$password = $_GET['password'];

try {
  if (!$db) {
    throw new Exception("Failed to connect to database");
  }

  $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

  $result = @pg_query($db, $sql);

  if ($result === false) {
    if (strpos(pg_last_error($db), 'duplicate key value violates unique constraint') !== false) {
      throw new Exception("User already exists");
    } else {
      throw new Exception("Error executing query: " . pg_last_error($db));
    }
  }

  echo "success";
} catch (Exception $err) {
  echo "wrong password or email";
}
?>

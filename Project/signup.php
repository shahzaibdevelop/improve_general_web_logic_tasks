<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "project");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Insert the new user into the database
  $sql = "INSERT INTO user (name, username, email, password)
  VALUES ('$name', '$username', '$email', '$password')";
  if (mysqli_query($conn, $sql)) {
    header("Location: login.html");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}

?>

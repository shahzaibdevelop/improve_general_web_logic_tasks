
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "project");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Check if the username and password are correct
  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // Log in the user
    header("Location: dashboard.php");
  } else {
    echo "Login failed: incorrect username or password";
  }

  mysqli_close($conn);
}

?>

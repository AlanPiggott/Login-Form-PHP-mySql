<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Testing</title>
  </head>
  <body>

    <form class="signup" action="index.php" method="post">
      <input type="text" name="firstName" placeholder="First name">
      <br>
      <input type="text" name="lastName" placeholder="Last name">
      <br>
      <input type="text" name="email" placeholder="Email">
      <br>
      <input type="text" name="password" placeholder="Password">
      <br>
      <button type="submit" name="submitButton">Sign up</button>
    </form>

    <?php
    //hosting details
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "phptesting";

    //fuction that connects to the database
      $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    //post error message if it fails to connect to phpMyAdmin
      if ($conn->connect_error) {
        die("Connecction failed: " . $conn->connect_error);
      }
      echo "Connected successfully";
      //checks if value is in $_POST name
      if (isset($_POST["firstName"]))
      {
        $first = $_POST["firstName"];
      } else {
        $first = null;
        echo "No first name found";
      }

      if (isset($_POST["lastName"]))
      {
        $last = $_POST["lastName"];
      } else {
        $last = null;
        echo "No last name found";
      }

      if (isset($_POST["email"]))
      {
        $email = $_POST["email"];
      } else {
        $email = null;
        echo "No email found";
      }

      if (isset($_POST["password"]))
      {
        $password = $_POST["password"];
      } else {
        $password = null;
        echo "No password found";
      }

      //inserts values into mySql Table
      $sql = "INSERT INTO `newuser` (`firstName`, `lastName`, `email`, `password`) 
      VALUES ('$first', '$last', '$email', '$password');";
      mysqli_query($conn, $sql);
     ?>
  </body>
</html>

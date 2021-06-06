<?php
include_once('config/conn.php');
if (isset($_POST['submit'])) {
  $name = $_POST['fullName'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $image = $_POST['image'];
  $phone_no = $_POST['phone_no'];
  $password = $_POST['password'];
$Erremail = $Errname = $Errpass = $Erraddress = $Errphone = "";

  if (empty($name) || empty($address) || empty($phone_no) || empty($password) || empty($email)) {
    if (empty($name)) {
       $Errname = "<p style = 'color:red'>Name field is empty";
    }
    if (empty($address)) {
       $Erraddress = "<p style = 'color:red'>Address field is empty";
    }
    if (empty($phone_no)) {
       $Errphone = "<p style = 'color:red'>Phone No field is empty";
    }
    if (empty($password)) {
       $Errpass = "<p style = 'color:red'>Password field is empty";
    }

    if (empty($image)) {
       $Errpass = "<p style = 'color:red'>Image field is empty";
    }

    if (empty($email)) {
       echo "<p style = 'color:red'>Email field is empty";
    }
    if (empty($password)) {
       echo "<p style = 'color:red'>Password field is empty";
    }

    if (empty($email)) {
       echo "<p style = 'color:red'>Email field is empty";
    }
    echo "<br> <a href='javascript:self.history.back();'>Go back</a>";
    }
    else{
      $query = "INSERT INTO user(name, image, email, address, password, phone_no)
    VALUES('$name', '$image', '$email', '$address','$password','$phone_no')";
    $result = mysqli_query($mysqli, $query);
    // msg
    header('location: index.php');
  }
}

?>




 
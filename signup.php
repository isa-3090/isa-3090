<?php include_once('config/conn.php');?>


<?php
$Erremail = $Errname = $Errpass = $Erraddress = $Errphone = "";
if (isset($_POST['submit'])) {
  $name = $_POST['fullName'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $image = $_POST['image'];
  $phone_no = $_POST['phone_no'];
  $password = $_POST['password'];


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
       $Erremail = "<p style = 'color:red'>Email field is empty";
    }
    if (empty($password)) {
       $Errpass = "<p style = 'color:red'>Password field is empty";
    }
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


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="signup.php"><b>AA MIA</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg"></p>

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="fullName">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <small><?php echo $Errname; ?></small>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <small><?php echo $Erremail; ?></small>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Address" name="address">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
        <small><?php echo $Erraddress; ?></small>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Phone No" name="phone_no">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <small><?php echo $Errphone; ?></small>
      </div>
      
      <div class="form-group has-feedback">
        <input type="file" name="image">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <small><?php echo $Errpass; ?></small>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
              <br>
              <a href="index.php" class="text-center">I already have a membership</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" data-toggle="modal" data-target="#modal">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

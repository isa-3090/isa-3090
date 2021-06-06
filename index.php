<?php include_once('config/conn.php');?>


<?php
$Erremail = $Errpass = $db_email = $db_password = "";
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


  if (empty($email) || empty($password)) {
    if (empty($email)) {
       $Erremail = "<p style = 'color:red'>Email field is empty";
    }
    if (empty($password)) {
       $Errpass = "<p style = 'color:red'>Password field is empty";
    }
  }
  
  // if correct entries are detected, connect to the database
  if($email && $password) {
    $sql="SELECT * FROM user where email = $email";
      $result =mysqli_query($mysqli, $sql);

    // store basic variables
    while($row = mysqli_fetch_assoc($result)) {
      $db_email = $row['email'];
      $db_password = $row['password'];                   

    }
    if($email === $db_email && $password === $db_password) {
                              
      // store data in session variables by grabbing data in the while loop above
      header("Location: home.php");
    
      } else {
      // $db_password did not match
      echo "<div class='alert alert-danger alert-dismissible fade show'><strong>Oops! </strong>wrong username/password. Try again<button type='button' class='close' data-dismiss='alert' aria-label='Close'>   <span aria-hidden='true'>&times;</span></div>."."<br>";
      }      
  }  
}


?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>AA MIA</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <small><?php echo $Erremail; ?></small>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <small><?php echo $Errpass; ?></small>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="#">I forgot my password</a><br>
    <a href="signup.php" class="text-center">Register a new membership</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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

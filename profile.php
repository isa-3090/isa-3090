<?php 'config/conn.php';?>
<?php
if (isset($_POST['Update'])) {
  $name = $_POST['fullName'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone_no = $_POST['phone_no'];
  $password = $_POST['image'];
  $id = $_POST['id'];

  if (empty($name) || empty($address) || empty($phone_no) || empty($image) || empty($email)) {
    if (empty($name)) {
       $Errname = "<p style = 'color:red'>Name field is empty";
    }
    if (empty($address)) {
       $Erraddress = "<p style = 'color:red'>Address field is empty";
    }
    if (empty($phone_no)) {
       $Errphone = "<p style = 'color:red'>Phone No field is empty";
    }

    if (empty($email)) {
       $Erremail = "<p style = 'color:red'>Email field is empty";
    }
    // echo "<br> <a href='javascript:self.history.back();'>Go back</a>";
    }
    else{
      $query = "UPDATE user set image = '$image', name = '$name', email = '$email', address = '$address', phone_no = '$phone_no' where id = 1";
      $result = mysqli_query($mysqli, $query);
      header('location: home.php');
    }
}


// $id = $_GET['id'];

$newquery ="SELECT * from user where id = 1";
$result = mysqli_query($mysqli, $newquery);

while ($res = mysqli_fetch_array($result)) {
  $name = $res['name'];
  $image = $res['image'];
  $email = $res['email'];
  $address = $res['address'];
  $phone_no = $res['phone_no'];
}

?>




    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="img-fluid img-circle" src="dist/img/avatar.png" alt="User profile picture">
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Name</strong>

              <p class="text-muted">
                <?php 
                    $sql="SELECT name FROM user where id = 1";
                    $result1=mysqli_query($mysqli, $sql);

                    while ($row = mysqli_fetch_assoc($result1)) {
                      echo $row['name'];
                    }

                ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

              <p class="text-muted">
              <?php 
                    $sql="SELECT address FROM user where id = 1";
                    $result1=mysqli_query($mysqli, $sql);

                    while ($row = mysqli_fetch_assoc($result1)) {
                      echo $row['address'];
                    }

                ?>
                </p>

              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Phone Number</strong>

              <p class="text-muted">
              <?php 
                    $sql="SELECT phone_no FROM user where id = 1";
                    $result1=mysqli_query($mysqli, $sql);

                    while ($row = mysqli_fetch_assoc($result1)) {
                      echo $row['phone_no'];
                    }

                ?>
                </p>

                <hr>
              <p class="text-muted">
                <button class="btn btn-block btn-primary btn-lg" type="button" data-toggle="modal" data-target="#modal-default" >Edit Profile</button>
              </p>

              <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Profile</h4>
              </div>
              <div class="modal-body">        
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" value="<?= $name; ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="email" class="form-control" value="<?= $email; ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" value="<?= $address; ?>">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                  </div>
                  
                  <div class="form-group has-feedback">
                    <input type="number" class="form-control" value="<?= $phone_no; ?>">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="file" name="image">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="Update"><i class="fa fa-check-square-o"></i> Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  
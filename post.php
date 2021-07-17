<?php
  session_start();
 include'config/conn.php';?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
#post-message {
    margin-left: 20px;
    color: #189a18;
    display: none;
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AA MIA | Post</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include'include/header.php';?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include'include/aside.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-post"></i>
       Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="comment.php"><i class="fa fa-post "></i> Post</a></li>
      </ol>
    </section>
    <section class="content-body">
    <div class="post-form-container">
            <form id="frm-post">
                <div class="input-row">
                    <input type="hidden" name="post_id" id="postId"
                        placeholder="Name" /> <input class="input-field"
                        type="hidden" name="name" id="name" placeholder="Name" value="<?php
                    if (isset($_SESSION['userName'])) {
                      echo $_SESSION['userName'];
                    }
                  ?>" />
                </div>
                <div class="input-row">
                  <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="post" id="post">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" id="submitButton">Go!</button>
                        </span>
                  </div>
                  <div id="post-message">Post Successfully!</div>
                </div>
            </form>
            <br>
            <ul class="timeline">            
                <!-- timeline item -->
                <?php

                $sql="SELECT * FROM tbl_post";
                  $result =mysqli_query($conn, $sql);

                // store basic variables
                while($row = mysqli_fetch_assoc($result)) {
                  $db_post = $row['post'];
                  $db_date = $row['date'];
                  $db_name = $row['post_sender_name']; 
                  $db_id = $row['parent_comment_id'];                  
                  $_SESSION['parent_comment_id'] = $db_id;
                

                ?>
                <li>
                <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $db_date; ?></span>

                    <h3 class="timeline-header"><a href="#"><?php echo $db_name; ?></a></h3>

                    <div class="timeline-body"><?php echo $db_post; ?></div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs" href="comment.php?postid=<?php echo htmlentities($db_id);?>">Comments</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <?php } ?>
              </ul>
        </div>
</section>





<div id="output"></div>
    <script>
            function postReply(postId) {
                $('#postId').val(postId);
                $("#post").focus();
            }

            $("#submitButton").click(function () {
                   $("#post-message").css('display', 'none');
                var str = $("#frm-post").serialize();

                $.ajax({
                    url: "pages/post-add.php",
                    data: str,
                    type: 'post',
                    success: function (response)
                    {
                        var result = eval('(' + response + ')');
                        if (response)
                        {
                            $("#post-message").css('display', 'inline-block');
                            $("#name").val("");
                            $("#post").val("");
                            $("#postId").val("");
                           listpost();
                        } else
                        {
                            alert("Failed to add Post !");
                            return false;
                        }
                    }
                });
            });
            
            $(document).ready(function () {
                   listpost();
            });

            function listpost() {
                $.post("pages/post-list.php",
                        function (data) {
                               var data = JSON.parse(data);
                            
                            var posts = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='outer-post'>");
                            var item = $("<li>").html(posts);

                            for (var i = 0; (i < data.length); i++)
                            {
                                var postId = data[i]['post_id'];
                                parent = data[i]['parent_post_id'];

                                if (parent == "0")
                                {
                                    posts = "";

                                    var item = $("<li>").html(posts);
                                    list.append(item);
                                    var reply_list = $('<ul>');
                                    item.append(reply_list);
                                    listReplies(postId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
            }
        </script>
 

 <?php include'include/footer.php';?>

 
       </div>
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


</body>
</html>

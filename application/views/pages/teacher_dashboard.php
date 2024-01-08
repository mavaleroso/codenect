<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/img/logo3.ico">
    <title>CODENECT</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/dashboard.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/new.css"> -->

    <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl"/>

  </head>
  <body>
    <!-- nav -->
    <nav class="navbar navbar-inverse navbar-fixed-top nav-teach">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="../assets/img/logo2.png" style="position: absolute; width: 60px; height: 60px;margin-top: -13px;">
          <a class="navbar-brand" href="#" style="margin-left: 40px;">CODE<span style="color: #0c8564">NECT</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="teacher_dashboard.php">Dashboard</a></li>
            <li><a href="teacher_profile.php">Profile</a></li>
            <li><a href="teacher_students.php">Students</a></li>
            <li><a href="teacher_courses.php">Courses</a></li>
            <li style="border-top:1px outset #333"><a href="teacher/logout">Log out</a></li>
          </ul>
          <a href="teacher/logout"><button class="btn btn-primary btn-logout">Log out</button></a>
        </div>
      </div>
    </nav>
    <!-- end nav -->
    <div class="container-fluid">
      <div class="row">
        <div id="navbar" class="navbar-collapse collapse">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar sidebar-teach">,
            <div id="img-holder">
            </div>
            <h4 id="name"><?php echo $userData2['fname']  ?></h4>
            <h5 id="student">Teacher</h5>
            <li class="active"><a href="../index.php/teacher_dashboard" class="sidebar-text">Dasboard</a></li>
            <li><a href="../index.php/teacher_profile" class="sidebar-text">Profile</a></li>
            <li><a href="../index.php/teacher_students" class="sidebar-text">Students</a></li>
            <li><a href="../index.php/teacher_courses" class="sidebar-text">Courses</a></li>
          </ul>
        </div>
      </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="sectionv1 animated fadeInDown">
          <h1 class="page-header">Students Progress<button class="btn btn-primary" onclick="add_student()" style="float: right;">Add Student</button></h1>
          <ul class="y-axis">
            <li><span>100%</span></li>
            <li><span>80%</span></li>
            <li><span>60%</span></li>
            <li><span>40%</span></li>
            <li><span>20%</span></li>
            <li><span>0</span></li>
          </ul>
           <div class="custom-bar-chart">
               <!-- <div class="bar">
                 <div class="title">Saluta</div>
                 <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
               </div>
               <div class="bar" style="margin-left:  -3.8%;">
                 <div style="background-color: #0c8564" class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
               </div>-->
          </div>
          <div style="margin:auto; width: 130px; margin-top: 60px; ">
              <div style="width: 20px; height: 20px; background-color: #222; border-radius: 5px;"></div><img src="../assets/img/c.png" width="40px" height="40px;" style="margin-top: -44px; margin-left: 20px;">
              <div style="width: 20px; height: 20px; background-color: #0c8564; border-radius: 5px; margin-top: -40px; margin-left: 70px;"></div><img src="../assets/img/java.png" width="40px" height="40px;" style="margin-top: -45px; margin-left: 90px">
          </div>
          </div>
          <div class="section2">
          <h2 class="sub-header">Learnings</h2>
          </div>
        </div>
      </div>

    </div>
    <footer>
      <p style="color: white; text-align: center; margin-top: 10px;">© 2018 CODE<span style="color:#0c8564 ">NECT</span></p>
    </footer>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
          </div>
          <div class="modal-body user-modal">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <script src="../assets/bootstrap/jquery.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/nicescroll.js"></script>
  <script src="../assets/js/common.js"></script>
  <script src="../assets/js/main.js"></script>
  <script type="text/javascript">

    var base_url = $('#baseurl').val();
    $students_id = '';
    $student_name = '';
    $student_c = 0;
    $student_java = 0;

    function add_student() {
      $('#addModal').modal('show');
      $('.user-modal').empty();
      $.ajax({
          url: base_url + "index.php/teacher/get_student",
          method: 'POST',
          data:{ studID: $students_id },
          success:function(result) {
            var d = JSON.parse(result);
            $.each(d, function(k, v) {
              $('.user-modal').append('<table style="width:100%;"><td><button class="btn btn-success" data-dismiss="modal" onclick="insertStudent('+ v.id +')">Add</button></td><td> | Email: '+ v.email +'</td><td>|  Name:'+ v.fname +'</td><td>'+ v.lname+'</td></table>')
            });
          }
      });
    }

    get_students();
    function get_students() {
      $.ajax({
          url: base_url + "index.php/teacher/get_students",
          method: 'POST',
          success:function(result) {
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  $students_id = v.student_id;
                  get_students_progress_c();
                  get_students_progress_java();
                  student_data();
                });
          }
      });
    }

    function get_students_progress_c() {
      var count = 0;
      $.ajax({
          url: base_url + "index.php/teacher/get_students_progress_c",
          method: 'POST',
          data: { studID: $students_id},
          success:function(result) {
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  count = count + parseInt(v.game_progress);
                });
                $student_c = count;
          }
      });
    }

    function get_students_progress_java() {
      var count = 0;
      $.ajax({
          url: base_url + "index.php/teacher/get_students_progress_java",
          method: 'POST',
          data: { studID: $students_id},
          success:function(result) {
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  count = count + parseInt(v.game_progress);
                });
                $student_java = count;
          }
      });
    }

    function student_data() {
      $.ajax({
          url: base_url + "index.php/teacher/student_data",
          method: 'POST',
          data: { studID: $students_id },
          success:function(result) {
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  $student_name = v.fname;
                });
                stats_progress();
          }
      });
    }

    function stats_progress() {
      $('.custom-bar-chart').append('<div class="bar">' +
                                     '<div class="title">'+ $student_name +'</div>' +
                                       '<div style="height:'+Math.round(10* ((parseInt($student_c) / 60) * 100) )/10+'%" class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top"></div>' +
                                     '</div>' +
                                     '<div class="bar" style="margin-left:  -3.8%;">' +
                                       '<div style="height:'+ Math.round(10* ((parseInt($student_java) / 60) * 100) )/10 +'%;background-color: #0c8564" class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top"></div>' +
                                     '</div>');
    }

    function insertStudent($id) {
      $.ajax({
          url: base_url + "index.php/teacher/add_student",
          method: 'POST',
          data: { id_c : $id },
          success:function(result) {
              // teacher_students();
              location.reload();
          }
      });
    }
  </script>
  </body>
</html>

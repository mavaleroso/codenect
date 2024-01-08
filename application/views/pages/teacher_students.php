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
    <link href="../assets/font-awesome/css/all.css" rel="stylesheet">

    <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl"/>

    <!-- <link rel="stylesheet" type="text/css" href="../assets/new.css"> -->
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
            <li><a href="../index.php/teacher_dashboard" class="sidebar-text">Dasboard</a></li>
            <li><a href="../index.php/teacher_profile" class="sidebar-text">Profile</a></li>
            <li class="active"><a href="../index.php/teacher_students" class="sidebar-text">Students</a></li>
            <li><a href="../index.php/teacher_courses" class="sidebar-text">Courses</a></li>
          </ul>
        </div>
      </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="ranking_form animated fadeInDown">
          <h3>STUDENTS</h3>
          <button style="float: right; margin-top: -40px" onclick="add_student()" class="btn btn-success" type="button" name="button">+ Add</button>
          <div class="table-responsive">
          <table class="table table-striped">
            <thead style="font-size:12px;font-family: arial;">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>School</th>
                <th>C Progress</th>
                <th>C Mistakes</th>
                <th>Java Progress</th>
                <th>Java Mistakes</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody class="student-table"></tbody>
          </table>
          </div>
          </div>
        </div>
      </div>

    </div>
    <footer style="position:absolute; bottom: 0">
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
  <script type="text/javascript" src="../assets/js/main.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/js/nicescroll.js"></script>
  <script type="text/javascript" src="../assets/js/common.js"></script>
  <script type="text/javascript">
  var base_url = $('#baseurl').val();
  $students_id = '';
  $student_name = '';
  $student_fullname = '';
  $student_email = '';
  $student_school = '';
  $student_c = 0;
  $student_java = 0;

  $student_c_mistakes = 0;
  $student_java_mistakes = 0;

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
    var count1 = 0;
    $.ajax({
        url: base_url + "index.php/teacher/get_students_progress_c",
        method: 'POST',
        data: { studID: $students_id},
        success:function(result) {
              var d = JSON.parse(result);
              $.each(d, function(k, v) {
                count = count + parseInt(v.game_progress);
                count1 = count1 + parseInt(v.game_mistakes);
              });
              $student_c = count;
              $student_c_mistakes = count1;
        }
    });
  }

  function get_students_progress_java() {
    var count = 0;
    var count1 = 0;
    $.ajax({
        url: base_url + "index.php/teacher/get_students_progress_java",
        method: 'POST',
        data: { studID: $students_id},
        success:function(result) {
              var d = JSON.parse(result);
              $.each(d, function(k, v) {
                count = count + parseInt(v.game_progress);
                count1 = count1 + parseInt(v.game_mistakes);
              });
              $student_java = count;
              $student_java_mistakes = count1;
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
                $student_fullname = v.fname + ' ' + v.mname + ' ' + v.lname;
                $student_email = v.email;
                $student_school = v.school
              });
              student_table();
        }
    });
  }

  function student_table() {
    $('.student-table').append('<tr>' +
                                  '<td>'+ $students_id +'</td>' +
                                  '<td>'+ $student_fullname +'</td>' +
                                  '<td>'+ $student_email +'</td>' +
                                  '<td>'+ $student_school +'</td>' +
                                  '<td>'+ Math.round(10* ((parseInt($student_c) / 60) * 100) )/10 +'%</td>' +
                                  '<td>'+ $student_c_mistakes +'</td>' +
                                  '<td>'+ Math.round(10* ((parseInt($student_java) / 60) * 100) )/10 +'%</td>' +
                                  '<td>'+ $student_java_mistakes +'</td>' +
                                  '<td><i class="fas fa-trash-alt icon" id="" onclick="removeStudents('+ $students_id +')"></i></td>' +
                                '</tr>')
  }

  function removeStudents($id) {
    $.ajax({
        url: base_url + "index.php/teacher/remove_student",
        method: 'POST',
        data: { studID: $id },
        success:function(result) {
          location.reload();
        }
    });
  }

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

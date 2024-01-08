<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="autdor" content="">
    <link rel="icon" href="../assets/img/logo3.ico">
    <title>CODENECT</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/dashboard.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl"/>
    <input type="hidden" value="<?php echo $userData['teacher_id']  ?>" id="teacher"/>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="../assets/img/logo3.png" style="position: absolute; width: 40px; height: 40px;margin-top: 5px;">
          <a class="navbar-brand" href="#" style="margin-left: 40px;">CODE<span style="color: #0c8564">NECT</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="student_dashboard.php">Dashboard</a></li>
            <li><a href="student_profile.php">Profile</a></li>
            <li><a href="student_games.php">Games</a></li>
            <li style="border-top:1px outset #333"><a href="student/logout">Log out</a></li>
          </ul>
          <a href="student/logout"><button class="btn btn-primary btn-logout">Log out</button></a>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

    <div class="container-fluid">
      <div class="row">
        <div id="navbar" class="navbar-collapse collapse">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <div id="img-holder">
            </div>
            <h4 id="name"><?php echo $userData['fname']  ?></h4>
            <h5 id="student">Student</h5>
            <li><a href="../index.php/student_dashboard" class="sidebar-text">Dasboard</a></li>
            <li class="active"><a href="../index.php/student_profile"class="sidebar-text">Profile</a></li>
            <li><a href="../index.php/student_courses" class="sidebar-text">Courses</a></li>
          </ul>
        </div>
      </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="profile1 animated fadeInDown">
            <div class="row">
              <div class="col-md-4 prof">
                <div class="img_profile"></div>
              </div>
              <div class="col-md-4 inf1">
                <h3><?php echo $userData['fname'] .' '. $userData['mname'] .' '. $userData['lname']  ?></h3>
                <p><?php echo $userData['educational_stats']  ?></p>
                <button class="btn btn-primary" onclick="edit_profile()" data-toggle="modal" data-target="#profileModal">EDIT PROFILE</button>
              </div>
              <div class="col-md-4 extra">
                <h3>Skills</h3>
              </div>
            </div>
          </div>
          <div class="profile2 animated fadeInDown">
            <div class="row">
              <div class="col-lg-6 profinfo">
                <h2 style="padding: 5px">Profile</h2>
                <h4 class="inform"><span style="color: #0c8564">Name: </span><?php echo $userData['fname'] .' '. $userData['mname'] .' '. $userData['lname']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">Age:</span><?php echo $userData['age']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">Birtddate</span><?php echo $userData['birthdate']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">Gender:</span> <?php echo $userData['gender']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">Educational Status:</span><?php echo $userData['educational_stats']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">School:</span><?php echo $userData['school']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">Email: </span><?php echo $userData['email']   ?></h4>
              </div>
              <div class="col-lg-6 otders">
                <h2 style="padding: 5px">Others</h2>
                <button id="add-teacher" class="btn btn-primary" style="float: left;" data-toggle="modal" data-target="#addeModal" onclick="addTeacher()">ADD TEACHER</button>
                <div class="teacher-area" hidden>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <footer>
      <p style="color: white; text-align: center; margin-top: 10px;">© 2018 CODE<span style="color:#0c8564 ">NECT</span></p>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="addeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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

    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLabel"></h5>
          </div>
          <div class="modal-body modal-profile">
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>

  <script src="../assets/bootstrap/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/main.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  var base_url = $('#baseurl').val();
  $teacher_id = '';

    teacher_students();
    function teacher_students() {
      $.ajax({
          url: base_url + "index.php/student/teacher_students",
          method: 'POST',
          success:function(result) {
            var d = JSON.parse(result);
            $.each(d, function(k, v) {
              $teacher_id = v.teacher_id;
              view_teacher();
            });
          }
      });
    }

    function edit_profile() {
      $('.modal-profile').empty();
      $('.modal-profile').append('<div class="form-inline">'+
                                    '<div class="form-group">' +
                                    '<label for="fname">Firstname: </label>' +
                                    '<input type="email" class="form-control" id="fname" value="<?php echo $userData['fname']  ?>">'+
                                    '</div>'+
                                    '<div class="form-group">' +
                                    '<label for="fname">Middlename: </label>' +
                                    '<input type="email" class="form-control" id="mname" value="<?php echo $userData['mname']  ?>">'+
                                    '</div>'+
                                    '<div class="form-group">' +
                                    '<label for="fname">Lastname: </label>' +
                                    '<input type="email" class="form-control" id="lname" value="<?php echo $userData['lname']  ?>">'+
                                    '</div>'+
                                    '<div class="form-group">' +
                                    '<label for="fname">Age: </label>' +
                                    '<input type="email" class="form-control" id="age" value="<?php echo $userData['age']  ?>">'+
                                    '</div>'+
                                    '<div class="form-group">' +
                                    '<label for="fname">Birthdate: </label>' +
                                    '<input type="email" class="form-control" id="bday" value="<?php echo $userData['birthdate']  ?>">'+
                                    '</div>'+
                                    '<div class="form-group">' +
                                    '<label for="fname">Gender: </label>' +
                                    '<input type="email" class="form-control" id="gender" value="<?php echo $userData['gender']  ?>">'+
                                    '</div>'+
                                    '<div class="form-group">' +
                                    '<label for="fname">Education:</label>' +
                                    '<input type="email" class="form-control" id="edu" value="<?php echo $userData['educational_stats']  ?>">'+
                                    '</div>'+
                                    '<div class="form-group">' +
                                    '<label for="fname">School: </label>' +
                                    '<input type="email" class="form-control" id="school" value="<?php echo $userData['school']  ?>">'+
                                    '</div>'+
                                    '<div class="form-group">' +
                                    '<label for="fname">Email: </label>' +
                                    '<input type="email" class="form-control" id="email" value="<?php echo $userData['email']  ?>" disabled>'+
                                    '</div>'+
                                '</div>'+
                              '<button style="margin:auto; display:block; margin-top: 30px;" data-dismiss="modal" onclick="update_profile()" class="btn btn-success">Save</button>');
    }

    function update_profile() {
      $fname = $('#fname').val();
      $mname = $('#mname').val();
      $lname = $('#lname').val();
      $age = $('#age').val();
      $bday = $('#bday').val();
      $gender = $('#gender').val();
      $edu = $('#edu').val();
      $school = $('#school').val();
      $email = $('#email').val();
      $.ajax({
          url: base_url + "index.php/student/update_profile",
          method: 'POST',
          data: { fname:$fname ,mname:$mname ,lname:$lname ,age:$age ,bday:$bday ,gender:$gender ,edu:$edu ,school:$school ,email:$email },
          success:function(result) {
            location.reload();
          }
      });


    }

    function addTeacher() {
      $('.user-modal').empty();
      $.ajax({
          url: base_url + "index.php/student/get_teacher",
          method: 'POST',
          success:function(result) {
            var d = JSON.parse(result);
            $.each(d, function(k, v) {
              $('.user-modal').append('<table style="width:100%;"><td><button class="btn btn-success" data-dismiss="modal" onclick="insertTeacher('+ v.id +')">Add</button></td><td> | Email: '+ v.email +'</td><td>|  Name:'+ v.fname +'</td><td>'+ v.lname+'</td></table>')
            });
          }
      });
    }


    function insertTeacher($id) {
      $.ajax({
          url: base_url + "index.php/student/add_teacher",
          method: 'POST',
          data: { id_c : $id },
          success:function(result) {
              teacher_students();
          }
      });
    }

    $teacher_status = '';
    function view_teacher() {
      if($teacher_id != '') {
        $('.teacher-area').empty();
        $('.teacher-area').show();
        $('#add-teacher').hide();
        $.ajax({
            url: base_url + "index.php/student/view_teacher",
            method: 'POST',
            data: { teachID : $teacher_id },
            success:function(result) {
              var d = JSON.parse(result);
              $.each(d, function(k, v) {
                  $('.teacher-area').append('<h3 style="text-align:center">Teacher</h3><hr><p>First name:  '+ v.fname +'</p><p>Middle name:  '+ v.mname +'</p><p>Last name:  '+ v.lname +'</p><p>Email :  '+ v.email +'</p> <button class="btn btn-success" onclick="removeTeacher('+ v.id +')" style="margin:auto; display:block">Remove</button');
              });
            }
        });
      }else {
        $('.teacher-area').empty();
        $('.teacher-area').hide();
      }
    }

    function removeTeacher($id1) {
      $('.teacher-area').hide('slow');
      $('#add-teacher').show('slow');
      $.ajax({
          url: base_url + "index.php/student/remove_teacher",
          method: 'POST',
          data: { teachID : $id1 },
          success:function(result) {
          }
      });
    }
  </script>
  </body>
</html>

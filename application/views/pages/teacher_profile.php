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
          <a href="logout"><button class="btn btn-primary btn-logout">Log out</button></a>
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
            <li class="active"><a href="../index.php/teacher_profile" class="sidebar-text">Profile</a></li>
            <li><a href="../index.php/teacher_students" class="sidebar-text">Students</a></li>
            <li><a href="../index.php/teacher_courses" class="sidebar-text">Courses</a></li>
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
                <h3><?php echo $userData2['fname'] .' '. $userData2['mname'] .' '. $userData2['lname']  ?></h3>
                <p>  <?php echo $userData2['occupation']  ?></p>
                <button class="btn btn-primary"  onclick="edit_profile()" data-toggle="modal" data-target="#profileModal">EDIT PROFILE</button>
              </div>
              <div class="col-md-4 extra">
                <h3>Message</h3>
              </div>
            </div>
          </div>
          <div class="profile2 animated fadeInDown">
            <div class="row">
              <div class="col-lg-6 profinfo">
                <h2 style="padding: 5px">Profile</h2>
                <h4 class="inform"><span style="color: #0c8564">Name:</span>  <?php echo $userData2['fname'] .' '. $userData2['mname'] .' '. $userData2['lname']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">Age:</span> <?php echo $userData2['age']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">Gender:</span> <?php echo $userData2['gender']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">Occupation:</span> <?php echo $userData2['occupation']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">School:</span> <?php echo $userData2['school']  ?></h4>
                <h4 class="inform"><span style="color: #0c8564">Email:</span> <?php echo $userData2['email']  ?></h4>
              </div>
              <!-- <div class="col-lg-6 others">
                <h2 style="padding: 5px">Class</h2>
                <button class="btn btn-primary" style="float: left;">ADD STUDENT</button>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <p style="color: white; text-align: center; margin-top: 10px;">© 2018 CODE<span style="color:#0c8564 ">NECT</span></p>
    </footer>

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
  <script type="text/javascript" src="../assets/js/main.js"></script>
  <script src="../assets/bootstrap/jquery.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/js/nicescroll.js"></script>
  <script type="text/javascript" src="../assets/js/common.js"></script>
  <script type="text/javascript">
  var base_url = $('#baseurl').val();

  function edit_profile() {
    $('.modal-profile').empty();
    $('.modal-profile').append('<div class="form-inline">'+
                                  '<div class="form-group">' +
                                  '<label for="fname">Firstname: </label>' +
                                  '<input type="text" class="form-control" id="fname" value="<?php echo $userData2['fname']  ?>">'+
                                  '</div>'+
                                  '<div class="form-group">' +
                                  '<label for="fname">Middlename: </label>' +
                                  '<input type="text" class="form-control" id="mname" value="<?php echo $userData2['mname']  ?>">'+
                                  '</div>'+
                                  '<div class="form-group">' +
                                  '<label for="fname">Lastname: </label>' +
                                  '<input type="text" class="form-control" id="lname" value="<?php echo $userData2['lname']  ?>">'+
                                  '</div>'+
                                  '<div class="form-group">' +
                                  '<label for="fname">Age: </label>' +
                                  '<input type="text" class="form-control" id="age" value="<?php echo $userData2['age']  ?>">'+
                                  '</div>'+
                                  '<div class="form-group">' +
                                  '<label for="fname">Gender: </label>' +
                                  '<input type="text" class="form-control" id="gender" value="<?php echo $userData2['gender']  ?>">'+
                                  '</div>'+
                                  '<div class="form-group">' +
                                  '<label for="fname">Occupation:</label>' +
                                  '<input type="text" class="form-control" id="occ" value="<?php echo $userData2['occupation']  ?>">'+
                                  '</div>'+
                                  '<div class="form-group">' +
                                  '<label for="fname">School: </label>' +
                                  '<input type="text" class="form-control" id="school" value="<?php echo $userData2['school']  ?>">'+
                                  '</div>'+
                                  '<div class="form-group">' +
                                  '<label for="fname">Email: </label>' +
                                  '<input type="email" class="form-control" id="email" value="<?php echo $userData2['email']  ?>">'+
                                  '</div>'+
                              '</div>'+
                            '<button style="margin:auto; display:block; margin-top: 30px;" data-dismiss="modal" onclick="update_profile()" class="btn btn-success">Save</button>');
  }

  function update_profile() {
    $fname = $('#fname').val();
    $mname = $('#mname').val();
    $lname = $('#lname').val();
    $age = $('#age').val();
    $gender = $('#gender').val();
    $occ = $('#occ').val();
    $school = $('#school').val();
    $email = $('#email').val();
    $.ajax({
        url: base_url + "index.php/teacher/update_profile",
        method: 'POST',
        data: { fname:$fname ,mname:$mname ,lname:$lname ,age:$age, gender:$gender ,occ:$occ ,school:$school ,email:$email },
        success:function(result) {
          location.reload();
        }
    });

  }
  </script>
  </body>
</html>

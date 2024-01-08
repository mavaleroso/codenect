<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/img/logo3.ico">
    <title>CODENECT</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/dashboard.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl"/>
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
            <li><a href="student_dashboard.php" >Dashboard</a></li>
            <li><a href="student_profile.php">Profile</a></li>
            <li><a href="student_games.php">Games</a></li>
            <li style="border-top:1px outset #333"><a href="student/logout">Log out</a></li>
          </ul>
          <a href="<?= base_url() ?>/student/logout"><button class="btn btn-primary btn-logout">Log out</button></a>
        </div>
      </div>
    </nav>
    <!-- <div  id="navloader"></div> -->
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
            <li class="active"><a href="../index.php/student_dashboard"  onClick="simplebar.go(100)" class="sidebar-text">Dasboard</a></li>
            <li><a href="../index.php/student_profile" onClick="simplebar1.go(100)" class="sidebar-text">Profile</a></li>
            <li><a href="../index.php/student_courses" onClick="simplebar2.go(100)" class="sidebar-text">Courses</a></li>
          </ul>
        </div>
      </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="section1 animated fadeInDown">
            <h1 class="page-header">GAME PROGRESS</h1>
            <div class="row">
              <div class="col-md-6 lang_div">
                <img class="c_div" src="../assets/img/c.png">
                <h4>C Language</h4>
                <p id="c_progress"></p>
                <p id="c_status"></p>
              </div>
              <div class="col-md-6 lang_div">
                <img class="java_div" src="../assets/img/java.png">
                <h4>Java Language</h4>
                <p id="java_progress"></p>
                <p id="java_status">Status: </p>
              </div>
            </div>
          </div>
          <div class="section2 animated fadeInDown">
            <h2 class="sub-header">Stages</h2>
            <div class="row placeholders">
              <div class="col-lg-4 col-md-4 ">
                <div class="learn_div"><img src="../assets/img/novice.png" width="200px" height="130px"></div>
                <h4 class="learn_h">Novice</h4>
              </div>
              <div class="col-lg-4 col-md-4 ">
                <div class="learn_div"><img src="../assets/img/intermediate.png" width="200px" height="130px"></div>
                <h4 class="learn_h">Intermediate</h4>
              </div>
              <div class="col-lg-4 col-md-4 ">
                <div class="learn_div"><img src="../assets/img/advance.png" width="200px" height="130px"></div>
                <h4 class="learn_h">Advance</h4>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <footer>
      <p style="color: white; text-align: center; margin-top: 10px;">© 2018 CODE<span style="color:#0c8564 ">NECT</span></p>
    </footer>
  <script src="../assets/bootstrap/jquery.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/js/nanobar.js"></script>
  <script>
  var base_url = $('#baseurl').val();
  $game_c = 'c_novice';
  $game_java = 'java_novice';
  $.ajax({
      url: base_url + "index.php/student/get_student_data",
      method: 'POST',
      data: { c_game: $game_c },
      success:function(result) {
            var d = JSON.parse(result);
            $.each(d, function(k, v) {
              $('#c_progress').text('Progress: ' +  Math.round(10* ((parseInt(v.game_progress) / 60) * 100) )/10 + '%')
              $('#c_status').text('Status:   ' + v.game_difficulty)
            });
      }
  });

  $.ajax({
      url: base_url + "index.php/student/get_student_data",
      method: 'POST',
      data: { c_game: $game_java },
      success:function(result) {
            var d = JSON.parse(result);
            $.each(d, function(k, v) {
              $('#java_progress').text('Progress: ' +  Math.round(10* ((parseInt(v.game_progress) / 60) * 100) )/10 + '%')
              $('#java_status').text('Status:   ' + v.game_difficulty)
            });
      }
  });


    var simplebar = new Nanobar({target: document.getElementById('navloader')});
    simplebar.go(0);
    var simplebar1 = new Nanobar({target: document.getElementById('navloader')});
    simplebar1.go(0);
    var simplebar2 = new Nanobar({target: document.getElementById('navloader')});
    simplebar2.go(0);
    var simplebar3 = new Nanobar({target: document.getElementById('navloader')});
    simplebar3.go(0);
  </script>
  </body>
</html>

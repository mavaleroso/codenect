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
          <img src="../assets/img/logo2.png" style="position: absolute; width: 60px; height: 60px;margin-top: -13px;">
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
            <li><a href="../index.php/student_profile"class="sidebar-text">Profile</a></li>
            <li class="active"><a href="../index.php/student_courses" class="sidebar-text">Courses</a></li>
          </ul>
        </div>
      </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="game_form animated fadeInDown">
            <div class="row">
            <div class="col-md-4">
              <div class="game1">
                <img src="../assets/img/novice_c.png" class="img_game">
                <ul class="game-desc">
                  <li>Programming Structure</li>
                  <li>Basic Syntax</li>
                  <li>Data Types</li>
                  <li>Variables</li>
                  <li>Operators</li>
                </ul>
                <a href="../index.php/novice_c"><button  class="btn btn-primary img_div" >PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="../assets/img/intermediate_c.png" class="img_game">
                <ul class="game-desc">
                  <li>Conditional</li>
                  <li>Loops</li>
                  <li>Arrays</li>
                  <li>Pointers</li>
                  <li>Strings</li>
                </ul>
                <a href="../index.php/intermediate_c"><button class="img_div btn btn-primary">PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="../assets/img/advance_c.png" class="img_game">
                <ul class="game-desc">
                  <li>Structures</li>
                  <li>Bitfields</li>
                  <li>Typedef</li>
                  <li>Functions</li>
                </ul>
                <a href="../index.php/advance_c"><button class="btn btn-primary img_div" >PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="../assets/img/novice_java.png" class="img_game">
                <ul class="game-desc">
                  <li>Programming Structure</li>
                  <li>Basic Syntax</li>
                  <li>Data Types</li>
                  <li>Variables</li>
                  <li>Operators</li>
                </ul>
                <a href="../index.php/novice_java"><button class="btn btn-primary img_div" >PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="../assets/img/intermediate_java.png" class="img_game">
                <ul class="game-desc">
                  <li>Programming Structure</li>
                  <li>Basic Syntax</li>
                  <li>Data Types</li>
                  <li>Variables</li>
                  <li>Operators</li>
                </ul>
                <a href="../index.php/intermediate_java"><button class="btn btn-primary img_div" >PLAY</button></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="game1">
                <img src="../assets/img/advance_java.png" class="img_game">
                <ul class="game-desc">
                  <li>Programming Structure</li>
                  <li>Basic Syntax</li>
                  <li>Data Types</li>
                  <li>Variables</li>
                  <li>Operators</li>
                </ul>
                <a href="../index.php/advance_java"><button class="btn btn-primary img_div" >PLAY</button></a>
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
  <script type="text/javascript" src="../assets/main.js"></script>
  <script src="../assets/bootstrap/jquery.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  var base_url = $('#baseurl').val();

  check_progress();

  function check_progress() {
    $.ajax({
        url: base_url + "index.php/student/check_progress",
        method: 'POST',
        success:function(result) {
          // var d = JSON.parse(result);
          // $.each(d, function(k, v) {
          // });
          if (result == '[]') {
            insert_difficulty();
          }
        }
    });
  }

  function insert_difficulty() {
    $.ajax({
        url: base_url + "index.php/student/insert_progress",
        method: 'POST',
        success:function(result) {
          // var d = JSON.parse(result);
          // $.each(d, function(k, v) {
          // });
        }
    });
  }
  </script>
  </body>
</html>

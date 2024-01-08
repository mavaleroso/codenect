<!doctype html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" type="image/icon" href="assets/img/logo3.ico"/>
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="assets/main.css">
      <link rel="stylesheet" type="text/css" href="assets/css/nprogress.css">
      <title>CODENECT</title>
    </head>
    <body>
      <!-- Start Navbar -->
      <div class="container2">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="assets/img/img3.png" alt="" style="width:2000px;height:500px;">
            </div>

            <div class="item">
              <img src="assets/img/intermediate.png" alt="" style="width:2000px;height:500px;">
            </div>

            <div class="item">
              <img src="assets/img/advance.png" alt="" style="width:2000px;height:500px;">
            </div>
          </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>
        <nav id="navbar" class="navbar navbar-inverse">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CODE<span style="color: #0c8564">NECT</span></a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#contact">Contact</a></li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->

          <!-- Start Content -->
          <div class="container">
          <button type="button" class="btn btn-lg btn-default btn-sign" data-toggle="modal" data-target="#myModal">LOGIN</button>
          <h1 class="front-qoute">The easiest way to learn programming.<button type="button" class="btn btn-lg btn-default btn-learn">Learn more</button></h1>
          </div>
          <div class="container">
            <div class="img-holder">
              <img src="assets/img/logo2.png" class="logo">
            </div>
          <div class="main-ct">
            <div class="container-fluid">
              <div class="row pos1">
                <div class="col-lg-6"><img src="assets/img/temp.png" class="img-theme1"></div>
                <div class="col-lg-6 descript1"><p class="p1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec faucibus lectus. Etiam feugiat lobortis diam vel interdum. Integer id maximus augue, vitae suscipit sem. Mauris sagittis porttitor varius. Morbi ex velit, pulvinar non mattis vel, imperdiet eu diam. Aenean sem dolor, porttitor quis euismod at,</p></div>
              </div>
              <hr>
            </div>
          <div class="container-fluid row row-learn">
              <div class="col-md-6 col-lg-4 col-learn">
                <img src="assets/img/img3.png" class="learn1">
                <button type="button" class="btn btn-lg btn-default btn1">Learn more</button>
              </div>
              <div class="col-md-6 col-lg-4 col-learn">
                <img src="assets/img/intermediate.png" class="learn1">
                <button type="button" class="btn btn-lg btn-default btn1">Learn more</button>
              </div>
              <div class="col-md-6 col-lg-4 col-learn">
                <img src="assets/img/advance.png" class="learn1">
                <button type="button" class="btn btn-lg btn-default btn1">Learn more</button>
              </div>
          </div>
          <div class="form-users Wrapper">
          </div>
          </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content" style="font-family: coolvetica;">
                  <div class="modal-header" align="center">
                    <img id="img_logo" src="assets/img/logo2.png" width="200px" height="200px" style="margin-left: 30px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                  </div>

                          <!-- Begin # DIV Form -->
                          <div id="div-form">
                              <!-- Begin # Login Form -->
                              <form id="choice-form">
                                <div class="modal-body">
                                  <div id="div-login-msg">
                                      <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                      <span id="text-login-msg">Chooce what type are you:</span>
                                  </div>
                                  <button class="btn btn-primary btn-lg btn-block" data-dismiss="modal" style="background-color: #0c8564" data-toggle="modal"  data-backdrop="static" data-target="#myModal1">STUDENT</button>
                                  <button class="btn btn-primary btn-lg btn-block" data-dismiss="modal" style="background-color: #0c8564" data-toggle="modal" data-target="#myModal2">TEACHER</button>
                                 </div>
                              </form>
                              <!-- End # Login Form -->
                          </div>
                          <!-- End # DIV Form -->

                </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow-y:hidden !important">
            <div class="modal-dialog" role="document">
            <div class="modal-content" style="font-family: coolvetica;">
                  <div class="modal-header" align="center">
                    <img class="img-circle" id="img_logo" src="assets/img/student1.png" width="200px" height="200px" style="margin-left: 20px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h3 style="text-align: center;">Student</h3>
                  </div>

                          <!-- Begin # DIV Form -->
                          <div id="div-forms">

                              <!-- Begin # Login Form -->
                              <form id="login-form" method="POST" action="index.php/student/login">
                                <div class="modal-body">
                                  <div id="div-login-msg">
                                      <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                      <span id="text-login-msg">Type your username and password.</span>
                                      <div id="messages1"></div>
                                  </div>
                                  <div class="form-group">
                                    <input placeholder="Email" id="login_username" type="email" class="form-control" name="email" required>
                                  </div>
                                  <div class="form-group">
                                    <input placeholder="Password" id="login_password" type="password" class="form-control" name="password" required>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <div>
                                      <input id="login_student" type="submit" class="btn btn-primary btn-lg btn-block" onClick="simplebar2.go(100)" style="background-color: #0c8564" value="Login"  />
                                  </div>
                                  <div>
                                    <button id="login_register_btn" type="button" class="btn btn-link" style=" color: #222">Register</button>
                                  </div>
                                </div>
                              </form>


                              <!-- End # Login Form -->



                              <!-- Begin | Register Form -->
                              <form id="register-form" style="display:none;" method="post" action="index.php/student/register"  >
                                <div class="modal-body">
                                  <div id="div-register-msg">
                                    <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                    <span id="text-register-msg">Register an account.</span>
                                    <div id="messages"></div>
                                  </div>
                                  <div class="form-group">
                                    <input id="fname" type="text" class="form-control" placeholder="name" name="fname" required/>
                                  </div>
                                  <div class="form-group">
                                    <input id="semail" placeholder="E-Mail" type="email" class="form-control" name="semail" required/>
                                  </div>
                                  <div class="form-group">
                                    <input id="spassword" placeholder="Password" type="password" class="form-control" name="spassword" required/>
                                  </div>
                                  <div class="form-group">
                                    <input id="spassword2" type="password" class="form-control" placeholder="Confirm Password" name="spassword2" required />
                                  </div>
                                </div>
                                <div class="modal-footer" style="height:170px !important">
                                  <div>
                                      <input id="register_student" type="submit" name="register_student" onClick="simplebar.go(100)" class="btn btn-primary btn-lg btn-block" style="background-color: #0c8564" value="Register"/ >
                                  </div>
                                  <div>
                                      <button id="register_login_btn" type="button" class="btn btn-link" style="color: #222">Log In</button>
                                  </div>
                                </div>
                              </form>

                              <!-- End | Register Form -->

                          </div>
                          <!-- End # DIV Form -->

                </div>
            </div>
          </div>

          <!-- Modal 2 -->
          <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content" style="font-family: coolvetica;">
                  <div class="modal-header" align="center">
                    <img class="img-circle" id="img_logo" src="assets/img/teacher1.png" width="200px" height="200px" style="margin-left: 20px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h3 style="text-align: center;">Teacher</h3>
                  </div>

                          <!-- Begin # DIV Form -->
                          <div id="div-forms1">


                              <!-- Begin # Login Form -->
                              <form id="login-form1" method="POST" action="index.php/teacher/login">
                                <div class="modal-body">
                                  <div id="div-login-msg1">
                                      <div id="icon-login-msg1" class="glyphicon glyphicon-chevron-right"></div>
                                      <span id="text-login-msg1">Type your username and password.</span>
                                      <div id="messages3"></div>
                                  </div>
                                  <div class="form-group">
                                    <input id="login_username1" class="form-control" name="temail" type="text" placeholder="Username" required />
                                  </div>
                                  <div class="form-group">
                                    <input id="login_password1" class="form-control" name="tpassword" type="password" placeholder="Password" required />
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <div>
                                      <input type="submit" class="btn btn-primary btn-lg btn-block" onClick="simplebar3.go(100)" style="background-color: #0c8564" value="Login" />
                                  </div>
                                  <div>
                                    <button id="login_register_btn1" type="button" class="btn btn-link" style=" color: #222">Register</button>
                                  </div>
                                </div>
                              </form>
                              <!-- End # Login Form -->


                              <!-- Begin | Register Form -->
                              <form id="register-form1" style="display:none;" method="POST" action="index.php/teacher/register">
                                <div class="modal-body">
                                <div id="div-register-msg1">
                                  <div id="icon-register-msg1" class="glyphicon glyphicon-chevron-right"></div>
                                  <span id="text-register-msg1">Register an account.</span>
                                  <div id="messages2"></div>
                                </div>
                                <div class="form-group">
                                  <input id="tfname" class="form-control" name="tfname" type="text" placeholder="Name" required />
                                </div>
                                <div class="form-group">
                                  <input id="temail" class="form-control" name="temail" type="text" placeholder="Email" required />
                                </div>
                                <div class="form-group">
                                  <input id="tpassword" class="form-control" name="tpassword" type="password" placeholder="Password" required />
                                </div>
                                <div class="form-group">
                                  <input id="tpassword2" class="form-control" name="tpassword2" type="password" placeholder="Confirm Password" required />
                                </div>
                                </div>
                                <div class="modal-footer" style="height:170px !important">
                                  <div>
                                      <input type="submit" class="btn btn-primary btn-lg btn-block" onClick="simplebar1.go(100)" style="background-color: #0c8564" value="Register" />
                                  </div>
                                  <div>
                                      <button id="register_login_btn1" type="button" class="btn btn-link" style="color: #222">Log In</button>
                                  </div>
                                </div>
                              </form>
                              <!-- End | Register Form -->

                          </div>
                          <!-- End # DIV Form -->

                </div>
            </div>
          </div>
          <!-- End Content -->

          <!-- Start Footer -->
          <footer>
            <div class="container">
              <p class="footer-sign">© <span style="font-family: courier; font-weight: bolder;">2018</span> CODE<span style="color:#0c8564">NECT</span></p>
            </div>
          </footer>
          <!-- End Footer -->

          <script src="assets/bootstrap/js/jquery.min.js"></script>
          <script src="assets/bootstrap/js/bootstrap.js"></script>
          <script src="assets/js/nprogress.js"></script>
          <script src="assets/js/nanobar.js"></script>
          <script type="text/javascript">
          NProgress.start();
          NProgress.done();
          </script>
          <script>
            var simplebar = new Nanobar({target: document.getElementById('register-form')});
            simplebar.go(0);
            var simplebar1 = new Nanobar({target: document.getElementById('register-form1')});
            simplebar1.go(0);
            var simplebar2 = new Nanobar({target: document.getElementById('login-form')});
            simplebar2.go(0);
            var simplebar3 = new Nanobar({target: document.getElementById('login-form1')});
            simplebar3.go(0);
          </script>
          <script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>

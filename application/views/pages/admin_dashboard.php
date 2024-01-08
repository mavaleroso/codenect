<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo3.ico">
    <link href="../assets/font-awesome/css/all.css" rel="stylesheet">
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/admin.css" rel="stylesheet">
    <link href="../assets/css/datatables.css" rel="stylesheet">

    <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl"/>

    <title>Codenect Admin</title>
  </head>
  <body>
    <section id="side-menu">
      <div class="admin-img"></div>
      <h3>Admin</h3>
      <hr>
      <nav>
        <a class="link-stud active" onclick="students()"><i class="fas fa-user-graduate"></i>Students</a>
        <a class="link-teach" onclick="teacher()"><i class="fas fa-user-tie"></i>Teacher</a>
        <a class="link-game" onlick="game()"><i class="fas fa-gamepad"></i>Game<i class="fas fa-caret-down"></i></a>
        <div class="dropdown-container">
          <a class="link-game1" onclick="game1()">Novice</a>
          <a class="link-game2" onclick="game2()">Intermediate</a>
          <a class="link-game3" onclick="game3()">Advance</a>
        </div>
      </nav>
    </section>

    <header>
        <div class="user-area">
          <a href="#">
            <a href="logout" class="logout">Logout</a>
            <div class="user-img"></div>
            <i class="fas fa-sort-down"></i>
          </a>
        </div>
    </header>


    <section class="student-area animated fadeInDown">
      <div class="container box">
           <h3 align="center">STUDENTS</h3><br />
           <div class="table-responsive">
                <br>
                <table id="user_data" class="table table-bordered table-striped">
                     <thead>
                          <tr>
                               <th width="">id</th>
                               <th width="">Email</th>
                               <th width="">First Name</th>
                               <th width="">Middle Name</th>
                               <th width="">Last Name</th>
                               <th width="">Password</th>
                          </tr>
                     </thead>
                </table>
           </div>
      </div>
    </section>

    <section class="teacher-area animated fadeInDown">
      <div class="container box">
           <h3 align="center">TEACHERS</h3><br />
           <div class="table-responsive">
                <br>
                <table id="teacher_data" class="table table-bordered table-striped">
                     <thead>
                          <tr>
                               <th width="">id</th>
                               <th width="">Email</th>
                               <th width="">First Name</th>
                               <th width="">Middle Name</th>
                               <th width="">Last Name</th>
                               <th width="">Password</th>
                          </tr>
                     </thead>
                </table>
           </div>
      </div>
    </section>

    <section class="game-area1 animated fadeInDown">
      <div class="container box">
           <h3 align="center">NOVICE QUIZ</h3><br />
           <div class="table-responsive">
                <button type="button" class="btn btn-success btn-add" name="button" data-toggle="modal" data-target="#addQuizModal"  onclick="add_quiz()">+ Add</button>
                <br>
                <table id="game_data1" class="table table-bordered table-striped">
                     <thead>
                          <tr>
                               <th width="">id</th>
                               <th width="">Problem</th>
                               <th width="">Choice 1</th>
                               <th width="">Choice 2</th>
                               <th width="">Choice 3</th>
                               <th width="">Answer</th>
                               <th width="">Trivia</th>
                               <th width="">Edit</th>
                               <th width="">Delete</th>
                          </tr>
                     </thead>
                </table>
           </div>
      </div>
    </section>

    <section class="game-area2 animated fadeInDown">
      <div class="container box">
           <h3 align="center">INTERMEDIATE QUIZ</h3><br />
           <div class="table-responsive">
             <button type="button" class="btn btn-success btn-add" name="button" data-toggle="modal" data-target="#addQuizModal"  onclick="add_quiz1()">+ Add</button>
                <br>
                <table id="game_data2" class="table table-bordered table-striped">
                     <thead>
                          <tr>
                               <th width="">id</th>
                               <!-- <th width="">Quiz_code</th> -->
                               <th width="">Problem</th>
                               <th width="">Answer</th>
                               <th width="">Trivia</th>
                               <th width="">Subject</th>
                               <th width="">Example</th>
                               <th width="">Output</th>
                               <th width="">Required</th>
                               <th width="">Edit</th>
                               <th width="">Delete</th>
                          </tr>
                     </thead>
                </table>
           </div>
      </div>
    </section>

    <section class="game-area3 animated fadeInDown">
      <div class="container box">
           <h3 align="center">ADVANCE QUIZ</h3><br />
           <div class="table-responsive">
             <button type="button" class="btn btn-success btn-add" name="button" data-toggle="modal" data-target="#addQuizModal"  onclick="add_quiz2()">+ Add</button>
                <br>
                <table id="game_data3" class="table table-bordered table-striped">
                     <thead>
                          <tr>
                              <th width="">id</th>
                              <!-- <th width="">Quiz_code</th> -->
                              <th width="">Problem</th>
                              <th width="">Answer</th>
                              <th width="">Trivia</th>
                              <th width="">Subject</th>
                              <th width="">Example</th>
                              <th width="">Output</th>
                              <th width="">Required</th>
                              <th width="">Edit</th>
                              <th width="">Delete</th>
                          </tr>
                     </thead>
                </table>
           </div>
      </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title quiz-title" id="exampleModalLabel"></h5>

          </div>
          <div class="modal-body quiz-modal">
            ...
          </div>
        </div>
      </div>
    </div>


    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <i class="fas fa-check-circle"></i>
            <h3>success</h3>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="addQuizModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-modal">

          </div>
        </div>
      </div>
    </div>
    <script src="../assets/bootstrap/jquery.js"></script>
    <script src="../assets/js/datatables.js"></script>
    <script src="../assets/js/datatables.bootstrap.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>
    <script src="../assets/js/admin.js"></script>
    <script type="text/javascript">

    var dropdown = document.getElementsByClassName("link-game");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        $('.link-stud').removeClass('active');
        $('.link-teach').removeClass('active');
        $('.link-game').addClass('active');
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }

    $quiz_table = 'quiz';
    $game1 = "novice";
    $game2 = "intermediate";
    $game3 = "advance";
    $student_table = 'student_user';
    $teacher_table = 'teacher_user';
    var base_url = $('#baseurl').val();

    function add_quiz() {
      $('.add-modal').empty();
      $('.add-modal').append( '<div class="quiz-area"><label for="difficulty">Difficulty: </label><select id="difficulty" name="difficulty"><option value="c_novice">c_novice</option><option value="java_novice">java_novice</option></select></div>' +
                              '<br><div class="quiz-area"><label for="problem">Problem: </label><input id="problem1"name="problem" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="choice1">Choice 1: </label><input id="choice11" name="choice1" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="choice2">Choice 2: </label><input id="choice21" name="choice2" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="choice3">Choice 3: </label><input id="choice31" name="choice3" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="answer">Answer: </label><input id="answer1" name="answer" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="trivia">Trivia: </label><textarea id="trivia1" name="trivia"></textarea></div>' +
                              '<button type="button" class="btn-quiz btn btn-quiz1 btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn-quiz btn btn-primary" data-dismiss="modal" onclick="add_novice_quiz()">Save changes</button>');
    }

    function add_quiz1() {
      $('.add-modal').empty();
      $('.add-modal').append( '<div class="quiz-area"><label for="difficulty">Difficulty: </label><select id="difficulty2" name="difficulty"><option value="c_intermediate">c_intermediate</option><option value="java_intermediate">java_intermediate</option></select></div>' +
                              '<br><div class="quiz-area"><label for="problem">Problem: </label><input id="problem2"name="problem" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="answer">Answer: </label><input id="answer2" name="answer" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="trivia">Trivia: </label><textarea id="trivia2" name="output"></textarea></div>' +
                              '<br><div class="quiz-area"><label for="subject">Subject: </label><input id="subject2" name="subject" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="example">Example: </label><textarea id="example2" name="output"></textarea></div>' +
                              '<br><div class="quiz-area"><label for="output">Output: </label><input id="output2" name="output" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="req">Required: </label><input id="required2" name="req" type="text" value=""/></div>' +
                              '<button type="button" class="btn-quiz btn-quiz1 btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn-quiz btn btn-primary" data-dismiss="modal" onclick="add_intermediate_quiz()">Save changes</button>');
    }

    function add_quiz2() {
      $('.add-modal').empty();
      $('.add-modal').append( '<div class="quiz-area"><label for="difficulty">Difficulty: </label><select id="difficulty3" name="difficulty"><option value="c_advance">c_advance</option><option value="java_advance">java_advance</option></select></div>' +
                              '<br><div class="quiz-area"><label for="problem">Problem: </label><input id="problem3"name="problem" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="answer">Answer: </label><input id="answer3" name="answer" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="trivia">Trivia: </label><textarea id="trivia3" name="output"></textarea></div>' +
                              '<br><div class="quiz-area"><label for="subject">Subject: </label><input id="subject3" name="subject" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="example">Example: </label><textarea id="example3" name="output"></textarea></div>' +
                              '<br><div class="quiz-area"><label for="output">Output: </label><input id="output3" name="output" type="text" value=""/></div>' +
                              '<br><div class="quiz-area"><label for="req">Required: </label><input id="required3" name="req" type="text" value=""/></div>' +
                              '<button type="button" class="btn-quiz btn-quiz1 btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn-quiz btn btn-primary" data-dismiss="modal" onclick="add_advance_quiz()">Save changes</button>');
    }


    function add_novice_quiz() {
      $difficulty = $('#difficulty').val();
      $problem1 = $('#problem1').val();
      $choice11 = $('#choice11').val();
      $choice21 = $('#choice21').val();
      $choice31 = $('#choice31').val();
      $answer1 = $('#answer1').val();
      $trivia1 = $('#trivia1').val();

      $.ajax({
          url: base_url + "index.php/admin/add_novice_quiz  ",
          method: 'POST',
          data: { dif:$difficulty, prob:$problem1 ,cho1: $choice11,cho2:$choice21 ,cho3:$choice31 ,ans:$answer1 ,triv:$trivia1  },
          success:function(result) {
            $('#game_data1').DataTable().ajax.reload();
            $('#successModal').modal('show');
          }
      });
    }

    function add_intermediate_quiz() {
      $difficulty2 = $('#difficulty2').val();
      $problem2 = $('#problem2').val();
      $answer2 = $('#answer2').val();
      $trivia2 = $('#trivia2').val();
      $subject2 = $('#subject2').val();
      $example2 = $('#example2').val();
      $output2 = $('#output2').val();
      $require2 = $('#require2').val();

      $.ajax({
          url: base_url + "index.php/admin/add_intermediate_quiz  ",
          method: 'POST',
          data: { dif:$difficulty2, prob:$problem2 ,ans: $answer2,triv:$trivia2 ,subj:$subject2 ,exam:$example2 ,out:$output2, req: $require2  },
          success:function(result) {
            $('#game_data2').DataTable().ajax.reload();
            $('#successModal').modal('show');
          }
      });
    }

    function add_advance_quiz() {
      $difficulty3 = $('#difficulty3').val();
      $problem3 = $('#problem3').val();
      $answer3 = $('#answer3').val();
      $trivia3 = $('#trivia3').val();
      $subject3 = $('#subject3').val();
      $example3 = $('#example3').val();
      $output3 = $('#output3').val();
      $require3 = $('#require3').val();

      $.ajax({
          url: base_url + "index.php/admin/add_advance_quiz  ",
          method: 'POST',
          data: { dif:$difficulty3, prob:$problem3 ,ans: $answer3,triv:$trivia3 ,subj:$subject3 ,exam:$example3 ,out:$output3, req: $require3   },
          success:function(result) {
            $('#game_data3').DataTable().ajax.reload();
            $('#successModal').modal('show');
          }
      });
    }

    function myModal($wew) {
      $('.quiz-modal').empty();
      $.ajax({
          url: base_url + "index.php/admin/get_student_data",
          method: 'POST',
          data: { studentID: $wew },
          success:function(result) {
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  $('.quiz-title').text("Edit Quiz");
                  $('.quiz-modal').append('<br><div class="quiz-area"><label for="problem">Problem: </label><input id="problem"name="problem" type="text" value="'+ v.problem +'"/></div>' +
                                          '<br><div class="quiz-area"><label for="choice1">Choice 1: </label><input id="choice1" name="choice1" type="text" value="'+ v.choice1 +'"/></div>' +
                                          '<br><div class="quiz-area"><label for="choice2">Choice 2: </label><input id="choice2" name="choice2" type="text" value="'+ v.choice2 +'"/></div>' +
                                          '<br><div class="quiz-area"><label for="choice3">Choice 3: </label><input id="choice3" name="choice3" type="text" value="'+ v.choice3 +'"/></div>' +
                                          '<br><div class="quiz-area"><label for="answer">Answer: </label><input id="answer" name="answer" type="text" value="'+ v.answer +'"/></div>' +
                                          '<br><div class="quiz-area"><label for="trivia">Trivia: </label><textarea id="trivia" name="trivia">'+ v.trivia +'</textarea></div>' +
                                          '<button type="button" class="btn-quiz btn btn-quiz1 btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn-quiz btn btn-primary" data-dismiss="modal" onclick="update_novice_quiz()">Save changes</button>');
                  $quizID=v.id;
                });
          }
      });
    }

    function myModal1($val) {
      $('.quiz-modal').empty();
      $.ajax({
          url: base_url + "index.php/admin/get_student_data",
          method: 'POST',
          data: { studentID: $val },
          success:function(result) {
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  $('.quiz-title').text("Edit Quiz");
                  $('.quiz-modal').append('<br><div class="quiz-area"><label for="problem">Problem: </label><input id="problem"name="problem" type="text" value="'+ v.problem +'"/></div>' +
                                          '<br><div class="quiz-area"><label for="answer">Answer: </label><input id="answer" name="answer" type="text" value="'+ v.answer +'"/></div>' +
                                          '<br><div class="quiz-area"><label for="trivia">Trivia: </label><textarea id="trivia" name="output">'+ v.trivia +'</textarea></div>' +
                                          '<br><div class="quiz-area"><label for="subject">Subject: </label><input id="subject" name="subject" type="text" value="'+ v.subject +'"/></div>' +
                                          '<br><div class="quiz-area"><label for="example">Example: </label><textarea id="example" name="output">'+ v.example +'</textarea></div>' +
                                          '<br><div class="quiz-area"><label for="output">Output: </label><input id="output" name="output" type="text" value="'+ v.output +'"/></div>' +
                                          '<button type="button" class="btn-quiz btn-quiz1 btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn-quiz btn btn-primary" data-dismiss="modal" onclick="update_intermediate_quiz()">Save changes</button>');
                  $quizID=v.id;
                });
          }
      });
    }

    function quizDelete($data) {
      $.ajax({
          url: base_url + "index.php/admin/delete_quiz_data",
          method: 'POST',
          data: { quizID: $data },
          success:function(result) {
            $('#game_data1').DataTable().ajax.reload();
            $('#game_data2').DataTable().ajax.reload();
            $('#game_data3').DataTable().ajax.reload();
          }
      });
    }



    function update_novice_quiz() {
      $quizCode = $('#quiz_code').val();
      $quizProblem = $('#problem').val();
      $quizChoice1 = $('#choice1').val();
      $quizChoice2 = $('#choice2').val();
      $quizChoice3 = $('#choice3').val();
      $quizAnswer = $('#answer').val();
      $quizTrivia = $('#trivia').val();
      $.ajax({
          url: base_url + "index.php/admin/update_student_data",
          method: 'POST',
          data: { quizID: $quizID, quizCode: $quizCode, quizProblem: $quizProblem, quizChoice1: $quizChoice1, quizChoice2: $quizChoice2, quizChoice3: $quizChoice3, quizAnswer: $quizAnswer, quizTrivia: $quizTrivia },
          success:function(result) {
            $('#game_data1').DataTable().ajax.reload();
            $('#successModal').modal('show');
          }
      });
    }

    function update_intermediate_quiz() {
      $quizCode = $('#quiz_code').val();
      $quizProblem = $('#problem').val();
      $answer = $('#answer').val();
      $trivia = $('#trivia').val();
      $subject = $('#subject').val();
      $example = $('#example').val();
      $output = $('#output').val();
      $.ajax({
          url: base_url + "index.php/admin/update_intermediate_quiz",
          method: 'POST',
          data: { quizID: $quizID, quizCode: $quizCode, quizProblem: $quizProblem, answer: $answer, trivia: $trivia, subject: $subject, example: $example, output: $output },
          success:function(result) {
            $('#game_data2').DataTable().ajax.reload();
          }
      });
    }


    fetch_data1();
    fetch_data2();
    fetch_data3();
    fetch_data4();
    fetch_data5();


    function fetch_data1() {
      var dataTable = $('#user_data').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'admin/fetch_user'; ?>",
                method:"POST",
                data: { Table: $student_table }
           },
           "columnDefs":[
                {
                     "targets":[5],
                     "orderable":false,
                },
           ],
       });
    }

    function fetch_data2() {
      var dataTable1 = $('#teacher_data').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'admin/fetch_user'; ?>",
                method:"POST",
                data: { Table: $teacher_table  }
           },
           "columnDefs":[
                {
                     "targets":[5],
                     "orderable":false,
                },
           ],
       });
    }

    function fetch_data3() {
      var dataTable1 = $('#game_data1').DataTable({
           "processing":true,
           "serverSide":true,
           "bFilter": false,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'admin/fetch_user'; ?>",
                method:"POST",
                data: { Table: $quiz_table, GameT: $game1  }
           },
           "columnDefs":[
                {
                     "targets":[1,2,3,4,5,6,7,8],
                     "orderable":false,
                },
           ],
       });
    }

     function fetch_data4() {
       var dataTable1 = $('#game_data2').DataTable({
            "processing":true,
            "serverSide":true,
            "bFilter": false,
            "order":[],
            "ajax":{
                 url:"<?php echo base_url() . 'admin/fetch_user'; ?>",
                 method:"POST",
                 data: { Table: $quiz_table, GameT: $game2  }
            },
            "columnDefs":[
                 {
                      "targets":[1,2,3,4,5,6,7,8,9],
                      "orderable":false,
                 },
            ],
        });
     }

     function fetch_data5() {
       var dataTable1 = $('#game_data3').DataTable({
            "processing":true,
            "serverSide":true,
            "bFilter": false,
            "order":[],
            "ajax":{
                 url:"<?php echo base_url() . 'admin/fetch_user'; ?>",
                 method:"POST",
                 data: { Table: $quiz_table, GameT: $game3  }
            },
            "columnDefs":[
                 {
                      "targets":[1,2,3,4,5,6,7,8,9],
                      "orderable":false,
                 },
            ],
        });
     }

    </script>
    <script src="http://192.168.0.110:35729/livereload.js"></script>
  </body>
</html>

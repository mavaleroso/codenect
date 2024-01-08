<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/img/logo3.ico">
  <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl"/>
  <input type="hidden" value="<?php echo $userData['id']  ?>" id="user_id"/>
  <title>JAVA Novice Stage</title>
  <link href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/font-awesome/css/all.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/assets/css/novice_c.css" rel="stylesheet">


<script type="text/javascript">
var ctx = null;

var gameMap = [
  0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
  0, 1, 1, 2, 0, 1, 1, 1, 2, 0, 1, 2, 0, 0, 2, 1, 1, 1, 2, 1, 1, 0, 0,
  0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 4, 1, 0,
  0, 4, 1, 1, 1, 1, 1, 1, 1, 1, 4, 1, 1, 2, 1, 1, 1, 0, 1, 0, 0, 1, 0,
  0, 1, 2, 1, 0, 0, 0, 2, 1, 0, 1, 0, 0, 0, 0, 0, 2, 0, 1, 0, 2, 1, 0,
  0, 1, 0, 1, 0, 2, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0,
  0, 1, 2, 1, 4, 1, 1, 1, 2, 0, 1, 1, 1, 1, 2, 0, 1, 0, 2, 0, 1, 0, 0,
  0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 2, 0,
  0, 1, 1, 2, 0, 2, 1, 1, 2, 0, 2, 0, 2, 1, 1, 1, 2, 0, 1, 2, 0, 1, 0,
  0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 4, 0,
  0, 2, 1, 4, 1, 1, 1, 2, 1, 1, 1, 2, 4, 1, 1, 1, 1, 0, 2, 1, 0, 1, 0,
  0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0
];

// var tileW = 20, tileH = 20;
var tileW = 51, tileH = 51;
// var tileW = 25, tileH = 15;
var mapW = 23, mapH = 12;
var currentSecond = 0, frameCount = 0, framesLastSecond = 0, lastFrameTime = 0;

var keysDown = {
  37 : false,
  38 : false,
  39 : false,
  40 : false
};

$stats = "";

Character.prototype.placeAt = function(x, y)
{
  this.tileFrom = [x,y];
  this.tileTo   = [x,y];
  this.position = [((tileW*x)+((tileW-this.dimensions[0])/2)),
    ((tileH*y)+((tileH-this.dimensions[1])/2))];
};
Character.prototype.processMovement = function(t)
{
  if(this.tileFrom[0]==this.tileTo[0] && this.tileFrom[1]==this.tileTo[1]) {

   return false;
  }

  if((t-this.timeMoved)>=this.delayMove)
  {

    this.placeAt(this.tileTo[0], this.tileTo[1]);
  }
  else
  {
    this.position[0] = (this.tileFrom[0] * tileW) + ((tileW-this.dimensions[0])/2);
    this.position[1] = (this.tileFrom[1] * tileH) + ((tileH-this.dimensions[1])/2);

    if(this.tileTo[0] != this.tileFrom[0])
    {

      var diff = (tileW / this.delayMove) * (t-this.timeMoved);
      this.position[0]+= (this.tileTo[0]<this.tileFrom[0] ? 0 - diff : diff);
    }
    if(this.tileTo[1] != this.tileFrom[1])
    {
      var diff = (tileH / this.delayMove) * (t-this.timeMoved);
      this.position[1]+= (this.tileTo[1]<this.tileFrom[1] ? 0 - diff : diff);
    }

    this.position[0] = Math.round(this.position[0]);
    this.position[1] = Math.round(this.position[1]);
  }

  return true;
}

function toIndex(x, y)
{
  return((y * mapW) + x);
}

window.onload = function()
{


  ctx = document.getElementById('game').getContext("2d");

  requestAnimationFrame(drawGame);

  ctx.font = "bold 10pt sans-serif";
  window.addEventListener("keydown", function(e) {
    if(e.keyCode>=37 && e.keyCode<=40) { keysDown[e.keyCode] = true; }
  });
  window.addEventListener("keyup", function(e) {
    if(e.keyCode>=37 && e.keyCode<=40) { keysDown[e.keyCode] = false; }
  });
};


var player = new Character();

function Character()
{
  this.tileFrom = [1,1];
  this.tileTo   = [1,1];
  this.timeMoved  = 0;
  this.dimensions = [51,51];
  this.position = [51,51];
  this.delayMove  = 700;
}

$mapStat = "";
function drawGame()
{
  var img_grass = new Image(15,15);
  var img_tree = new Image(15,15);
  var img_char = new Image(15,15);
  var img_scroll = new Image(15,15);
  var img_gate = new Image(15, 15);
  var img_coin = new Image(15, 15);
  img_grass.src = '<?php echo base_url(); ?>/assets/images/grass.jpg';
  img_tree.src = '<?php echo base_url(); ?>/assets/images/tree.jpg';
  img_char.src = '<?php echo base_url(); ?>/assets/images/character.png';
  img_scroll.src = '<?php echo base_url(); ?>/assets/images/scroll.jpg';
  img_gate.src = '<?php echo base_url(); ?>/assets/images/block1.png';
  img_coin.src = '<?php echo base_url(); ?>/assets/images/java_coin.png';

  if(ctx==null) { return; }

  var currentFrameTime = Date.now();
  var timeElapsed = currentFrameTime - lastFrameTime;

  var sec = Math.floor(Date.now()/1000);
  if(sec!=currentSecond)
  {
    currentSecond = sec;
    framesLastSecond = frameCount;
    frameCount = 1;
  }
  else { frameCount++; }

  if(!player.processMovement(currentFrameTime))
  {
    // Scroll
    if ($stats === "") {
      if(keysDown[38] && player.tileFrom[1]>0 && (gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==1 || gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==2)) {
        if(gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==2){
          get_quiz();
          $('#quiz-box').show('slow');
          $stats = "stop";
        }
        player.tileTo[1]-= 1;
      }else if(keysDown[40] && player.tileFrom[1]<(mapH-1) && (gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==1 || gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==2)) {
        if(gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==2){
          get_quiz();
          $('#quiz-box').show('slow');
          $stats = "stop";
        }
        player.tileTo[1]+= 1;
      }else if(keysDown[37] && player.tileFrom[0]>0 && (gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==1 || gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==2)) {
        if(gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==2){
          get_quiz();
          $('#quiz-box').show('slow');
          $stats = "stop";
        }
        player.tileTo[0]-= 1;
      }else if(keysDown[39] && player.tileFrom[0]<(mapW-1) && (gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==1 || gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==2)) {
        if(gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==2){
          get_quiz();
          $('#quiz-box').show('slow');
          $stats = "stop";
        }
        player.tileTo[0]+= 1;
      }else if (keysDown[40] && player.tileFrom[1]<(mapH-1) && (gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==1 || gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==4)) {
        if(gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==4){
          $('#quiz-box').show('slow');
          $stats = "stop";
          get_hint();
        }
        player.tileTo[1]+= 1;
      }else if (keysDown[38] && player.tileFrom[1]>0 && (gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==1 || gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==4)) {
        if(gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==4){
          $('#quiz-box').show('slow');
          $stats = "stop";
          get_hint();
        }
        player.tileTo[1]-= 1;
      }else if (keysDown[37] && player.tileFrom[0]>0 && (gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==1 || gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==4)) {
        if(gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==4){
          $('#quiz-box').show('slow');
          $stats = "stop";
          get_hint();
        }
        player.tileTo[0]-= 1;
      }else if (keysDown[39] && player.tileFrom[0]<(mapW-1) && (gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==1 || gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==4)) {
        if(gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==4){
          $('#quiz-box').show('slow');
          $stats = "stop";
          get_hint();
        }
        player.tileTo[0]+= 1;
      }

      if(player.tileFrom[0]!=player.tileTo[0] || player.tileFrom[1]!=player.tileTo[1])
      { player.timeMoved = currentFrameTime; }

    }

  }

  if ($resultAnswer == "correct") {
    var base_url = $('#baseurl').val();
    gameMap[toIndex(player.tileFrom[0], player.tileFrom[1])] = 1;
    $mapStat = toIndex(player.tileFrom[0], player.tileFrom[1]);
    $progress = parseInt($game_progress) + 1;
    $.ajax({
        url: base_url + "index.php/game/updateMap",
        method: 'POST',
        data: { mapStat: $mapStat, quizID: $id, Difficulty: $game, progress: $progress},
        success:function(result) {
          reload_prog();
        }
    });
    $resultAnswer = "";
  }

  var tilenum = null;
  for(var y = 0; y < mapH; ++y)
  {
    for(var x = 0; x < mapW; ++x)
    {
      switch(gameMap[((y*mapW)+x)])
      {
        case 0:
          ctx.drawImage(img_tree, x*tileW, y*tileH, tileW, tileH);
          break;
        case 2:
          ctx.drawImage(img_scroll, x*tileW, y*tileH, tileW, tileH);
          break;
        case 3:
          ctx.drawImage(img_gate, x*tileW, y*tileH, tileW, tileH);
          break;
        case 4:
          ctx.drawImage(img_coin, x*tileW, y*tileH, tileW, tileH);
          break;
        default:
          ctx.drawImage(img_grass, x*tileW, y*tileH, tileW, tileH);
      }
    }
  }

  ctx.drawImage(img_char, player.position[0], player.position[1], player.dimensions[0], player.dimensions[1]);
  // ctx.drawImage(img_char, 102,306);
  lastFrameTime = currentFrameTime;
  requestAnimationFrame(drawGame);

}

</script>
</head>
<body>
  <nav class="nav-sidebar">
    <ul>
      <li><img src="<?php echo base_url(); ?>/assets/img/logo2.png" class="nav-logo"></li>
      <li><a href="student_dashboard"><i class="icon-nav fas fa-home"></i></a></li>
      <li><i class="icon-nav fas fa-cogs"></i></li>
    </ul>
  </nav>
  <div class="game-map">
    <p>Game Map</p>
    <canvas id="game" width="1175" height="610" >
    </canvas>
  </div>
  <div class="game-obj">
    <p class="qb-text">Quiz Box</p>
    <div id="quiz-box" style="display:none;">
      <h5>What is C programming?<h5>
        <input class="btn-question" type="button" onclick="myQuiz()" name="1.The word which means house is" value="maison" />
        <input class="btn-question" type="button" onclick="myQuiz()" name="1.The word which means house is" value="maison" />
        <input class="btn-question" type="button" onclick="myQuiz()" name="1.The word which means house is" value="maison" />
    </div>
  </div>
  <div class="game-question">

  </div>
  <div class="game-space">

  </div>
  <div class="game-time">
    <p>Game Time</p>
    <i class="far fa-clock"><span class="timer">00:00<span></i>
  </div>


  <!-- answer correct modal -->
  <div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="close_modal()" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="exampleModalLabel"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->

<script src="<?php echo base_url(); ?>/assets/bootstrap/jquery.js"></script>
<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
  var base_url = $('#baseurl').val();
  var user_id = $('#user_id').val();
  $game = "java_novice";
  $resultAnswer = "";
  $count = 0;

  reload_prog();
  function reload_prog()
  {
    $.ajax({
        url: base_url + "index.php/game/getProgress",
        method: 'POST',
        data: { Difficulty: $game },
        success:function(result) {
              var d = JSON.parse(result);
              $.each(d, function(k, v) {
                $count = v.gametime;
                $game_progress = v.game_progress;
                $mistakes = v. game_mistakes;
                $('.game-space').empty();
                $('.game-space').append('<h3 style="text-align:center">Game Progress</h3><div class="progress" style="height:50px; padding:5px;width:300px; border-radius:20px;margin:auto;margin-top:30px;"><div class="progress-bar" role="progressbar" style="border-bottom-left-radius:15px;color:#bbb;border-top-left-radius:15px;border-bottom-right-radius:15px;border-top-right-radius:15px;width: '+ Math.round(10* ((parseInt($game_progress) / 20) * 100) )/10 +'%; line-height:40px;font-size:20px;background:#222" aria-valuenow="'+ Math.round(10* ((parseInt($game_progress) / 20) * 100) )/10 +'" aria-valuemin="0" aria-valuemax="100">'+ Math.round(10* ((parseInt($game_progress) / 20) * 100) )/10 +'</div></div><br><p style="text-align:center;color:red">Mistakes:  '+ v.game_mistakes +'</p>')
              });
        }
    });
  }

    solvedQuiz();
  function solvedQuiz() {
    $.ajax({
        url: base_url + "index.php/game/get_problem_solved",
        method: 'POST',
        data: { Difficulty: $game },
        success:function(result) {
          var d = JSON.parse(result);
          $('.game-question').empty();
          $.each(d, function(k, v) {
            $('.game-question').append('<p>Objectives</p><p id="obj-text">Answer 20 questions on the game map to proceed to another stage.</p><p>'+v.num_of_quiz+'/20</p>')
          });
        }
    });

  }

  setInterval(function() {
         $count++;
         $('.timer').text(time_convert($count));
         $.ajax({
             url: base_url + "index.php/game/updateGameTime",
             method: 'POST',
             data: { Time: $count,  Difficulty: $game },
             success:function(result) {
             }
         });
  }, 1000);

  function time_convert(d)
   {
     d = Number(d);
       var h = Math.floor(d / 3600);
       var m = Math.floor(d % 3600 / 60);
       var s = Math.floor(d % 3600 % 60);

       var hDisplay = h > 0 ? h + (h == 1 ? ":" : ":") : "";
       var mDisplay = m > 0 ? m + (m == 1 ? ":" : ":") : "";
       var sDisplay = s > 0 ? s + (s == 1 ? ":" : "") : "";
       return hDisplay + mDisplay + sDisplay;
  }


    $answer = "";
    $counter1 = 0;
    function get_quiz(){
      $.ajax({
          url: base_url + "index.php/game/get_quiz",
          method: 'POST',
          data: { Difficulty: $game },
          success:function(result) {
                $('#quiz-box').empty();
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  $('#quiz-box').append('<div class="quiz-problem">'+ v.problem +'</div><input class="btn-question quiz1" type="button" onclick="myQuiz()"  value="'+ v.choice1 +'" /><input class="btn-question quiz2" type="button" onclick="myQuiz1()" value="'+ v.choice2 +'" /><input class="btn-question quiz3" type="button" onclick="myQuiz2()" value="'+ v.choice3 +'" />');
                  $answer = v.answer;
                  $id = v.id;
                  $counter1 += 1;
                  get_trivia();
                });
          }
      });
    }

    function get_hint(){
      $.ajax({
          url: base_url + "index.php/game/get_hint",
          method: 'POST',
          data: { Difficulty: $game },
          success:function(result) {
                $('#quiz-box').empty();
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  $('#quiz-box').append('<p class="hint-text">'+ v.trivia +'</p><button class="btn btn-success btn-hint" onclick="hideQbox()">ok</button>');
                });
          }
      });
    }

    function get_trivia(){
      $.ajax({
          url: base_url + "index.php/game/get_trivia",
          method: 'POST',
          data: { Difficulty: $game, quizID: $id },
          success:function(result) {
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  $trivia = v.trivia;
                });
          }
      });
    }

    function hideQbox() {
        $('#quiz-box').hide('slow');
        $stats = "";
    }

    get_map();
    function get_map(){
      $.ajax({
          url: base_url + "index.php/game/get_map",
          method: 'POST',
          data: { Difficulty: $game },
          success:function(result) {
                var d = JSON.parse(result);
                $.each(d, function(k, v) {
                  gameMap[v.mapTile] = 1;
                });
          }
      });
    }



    function myQuiz() {
      // $('#quiz-box').hide();
      if ($(".quiz1").val() == $answer) {

        $.ajax({
            url: base_url + "index.php/game/insert_solved_quiz",
            method: 'POST',
            data: { userID: user_id, quizID: $id, Difficulty: $game },
            success:function(result) {
              $resultAnswer = "correct";
              solvedQuiz();
              $('#answerModal').modal('show');
              $('.modal-body').append('<p class="fas fa-check-circle"><span class="wrong-font">Correct Answer</span></p><hr><p><i class="far fa-lightbulb">:</i>' + $trivia + '</p>');
              $(".quiz1").css({"border": "1px solid green", "transition": "all 1s"});
              $(".quiz2").css({"border": "1px solid red", "transition": "all 1s"});
              $(".quiz3").css({"border": "1px solid red", "transition": "all 1s"});
            }
        });
      } else {
        $resultAnswer = "not correct";
        quiz_mistake();
        $('.modal-body').append('<p class="fas fa-times-circle"><span class="wrong-font">Wrong Answer!<span></p><hr><p><i class="far fa-lightbulb">:</i> ' + $trivia + '</p>');
        if ($('.quiz2').val() == $answer) {
          $(".quiz2").css({"border": "1px solid green", "transition": "all 1s"});
          $(".quiz1").css({"border": "1px solid red", "transition": "all 1s"});
          $(".quiz3").css({"border": "1px solid red", "transition": "all 1s"});
        } else if ($('.quiz3').val() == $answer) {
          $(".quiz3").css({"border": "1px solid green", "transition": "all 1s"});
          $(".quiz2").css({"border": "1px solid red", "transition": "all 1s"});
          $(".quiz1").css({"border": "1px solid red", "transition": "all 1s"});
        }
        $('#answerModal').modal('show');
        }
    }


    function close_modal(){
      $('#quiz-box').hide('slow');
      $('.modal-body').empty();
      $stats = "";
    }

    function myQuiz1() {
      // $('#quiz-box').hide();
      if ($(".quiz2").val() == $answer) {
        $.ajax({
            url: base_url + "index.php/game/insert_solved_quiz",
            method: 'POST',
            data: { userID: user_id, quizID: $id, Difficulty: $game  },
            success:function(result) {
              $resultAnswer = "correct";
              solvedQuiz();
              $('#answerModal').modal('show');
              $('.modal-body').append('<p class="fas fa-check-circle"><span class="wrong-font">Correct Answer</span></p><hr><p><i class="far fa-lightbulb">:</i>' + $trivia + '</p>');
              $(".quiz1").css({"border": "1px solid red", "transition": "all 1s"});
              $(".quiz2").css({"border": "1px solid green", "transition": "all 1s"});
              $(".quiz3").css({"border": "1px solid red", "transition": "all 1s"});
            }
        });
      } else {
        $resultAnswer = "not correct";
        quiz_mistake();

        $('.modal-body').append('<p class="fas fa-times-circle"><span class="wrong-font">Wrong Answer!<span></p><hr><p><i class="far fa-lightbulb">:</i> ' + $trivia + '</p>');
        if ($('.quiz1').val() == $answer) {
          $(".quiz2").css({"border": "1px solid red", "transition": "all 1s"});
          $(".quiz1").css({"border": "1px solid green", "transition": "all 1s"});
          $(".quiz3").css({"border": "1px solid red", "transition": "all 1s"});
        } else if ($('.quiz3').val() == $answer) {
          $(".quiz3").css({"border": "1px solid green", "transition": "all 1s"});
          $(".quiz2").css({"border": "1px solid red", "transition": "all 1s"});
          $(".quiz1").css({"border": "1px solid red", "transition": "all 1s"});
        }
        $('#answerModal').modal('show');
      }
    }

    function myQuiz2() {
      // $('#quiz-box').hide();
      if ($(".quiz3").val() == $answer) {
        $.ajax({
            url: base_url + "index.php/game/insert_solved_quiz",
            method: 'POST',
            data: { userID: user_id, quizID: $id, Difficulty: $game  },
            success:function(result) {
              $resultAnswer = "correct";
              solvedQuiz();
              $('#answerModal').modal('show');
              $('.modal-body').append('<p class="fas fa-check-circle"><span class="wrong-font">Correct Answer</span></p><hr><p><i class="far fa-lightbulb">:</i>' + $trivia + '</p>');
              $(".quiz1").css({"border": "1px solid red", "transition": "all 1s"});
              $(".quiz2").css({"border": "1px solid red", "transition": "all 1s"});
              $(".quiz3").css({"border": "1px solid green", "transition": "all 1s"});
            }
        });
      } else {
        $resultAnswer = "not correct";
        quiz_mistake();

        $('.modal-body').append('<p class="fas fa-times-circle"><span class="wrong-font">Wrong Answer!<span></p><hr><p><i class="far fa-lightbulb">:</i> ' + $trivia + '</p>');
        if ($('.quiz1').val() == $answer) {
          $(".quiz2").css({"border": "1px solid red", "transition": "all 1s"});
          $(".quiz1").css({"border": "1px solid green", "transition": "all 1s"});
          $(".quiz3").css({"border": "1px solid red", "transition": "all 1s"});
        } else if ($('.quiz2').val() == $answer) {
          $(".quiz3").css({"border": "1px solid red", "transition": "all 1s"});
          $(".quiz2").css({"border": "1px solid green", "transition": "all 1s"});
          $(".quiz1").css({"border": "1px solid red", "transition": "all 1s"});
        }
        $('#answerModal').modal('show');
      }
    }
    function quiz_mistake() {
      $mistakes_num = parseInt($mistakes) + 1;
      $.ajax({
          url: base_url + "index.php/game/mistakes",
          method: 'POST',
          data: {Difficulty: $game, Mistakes: $mistakes_num},
          success:function(result) {
            reload_prog();
          }
      });
    }

  </script>
</body>
</html>

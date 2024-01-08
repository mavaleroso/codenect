<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/icon" href="../assets/img/logo3.ico"/>
  <title>JAVA Advance Stage</title>
  <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/font-awesome/css/all.css" rel="stylesheet">
  <link href="../assets/css/advance_c.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/codemirror/theme/ambiance.css">
  <link rel="stylesheet" href="../assets/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="../assets/codemirror/css/normalize.css">
  <link rel="stylesheet" href="../assets/codemirror/css/main.css">
  <link rel="stylesheet" href="../assets/codemirror/css/style.css">
  <link rel="stylesheet" href="../assets/codemirror/addon/hint/show-hint.css">
  <link rel="stylesheet" href="../assets/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="../assets/codemirror/addon/hint/show-hint.css">
  <link rel="stylesheet" href="../assets/codemirror/addon/scroll/simplescrollbars.css">

  <script src="../assets/codemirror/js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="../assets/codemirror/lib/codemirror.js"></script>
  <script src="../assets/codemirror/mode/javascript/javascript.js"></script>
  <script src="../assets/codemirror/addon/edit/matchbrackets.js"></script>
  <script src="../assets/codemirror/addon/hint/show-hint.js"></script>
  <script src="../assets/codemirror/mode/clike/clike.js"></script>
  <script src="../assets/codemirror/addon/selection/active-line.js"></script>
  <script src="../assets/codemirror/addon/hint/show-hint.js"></script>
  <script src="../assets/codemirror/addon/hint/anyword-hint.js"></script>
  <script src="../assets/codemirror/addon/edit/closebrackets.js"></script>
  <script src="../assets/codemirror/addon/scroll/simplescrollbars.js"></script>

  <input type="hidden" value="<?php echo base_url(); ?>" id="baseurl"/>
  <input type="hidden" value="<?php echo $userData['id']  ?>" id="user_id"/>

<style type="text/css">
body {
  background: gray;
}

.obj-top {
  color: gray;
  background: #414854;
  width: 298px;
  margin-left: -14px;
  padding: 10px;
  border-radius: 5px;
  border:2px outset gray;
  margin-top: 22px;
  font-size:12px;
  height: 555px;
}

.quiz-content {
  width: 750px;
  background: #4ae3;
  z-index: 1;
  height: 165px;
  margin-top: 395px;
  margin-left:120px;
  border:2px outset black;
}

</style>
<script type="text/javascript">

var ctx = null;

var gameMap = [
  0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
  0, 1, 1, 1, 4, 1, 1, 1, 2, 1, 1, 2, 1, 1, 2, 1, 1, 1, 2, 0,
  0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0,
  0, 1, 2, 1, 1, 1, 2, 1, 1, 1, 2, 1, 1, 2, 1, 4, 1, 1, 1, 0,
  0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
  0, 1, 1, 4, 1, 2, 1, 1, 2, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 0,
  0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0,
  0, 1, 1, 1, 1, 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 2, 1, 1, 4, 0,
  0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
  0, 4, 1, 1, 2, 1, 1, 2, 1, 1, 2, 1, 1, 2, 1, 1, 1, 1, 1, 0,
  0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0
];

// var tileW = 20, tileH = 20;
var tileW = 51, tileH = 51;
// var tileW = 25, tileH = 15;
var mapW = 20, mapH = 11;
var currentSecond = 0, frameCount = 0, framesLastSecond = 0, lastFrameTime = 0;

var keysDown = {
  37 : false,
  38 : false,
  39 : false,
  40 : false
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

$mapStat = "";
function drawGame()
{
  var img_grass = new Image(15,15);
  var img_tree = new Image(15,15);
  var img_char = new Image(15,15);
  var img_scroll = new Image(15,15);
  var img_gate = new Image(15, 15);
  var img_coin = new Image(15, 15);
  img_grass.src = '../assets/images/ice.jpg';
  img_tree.src = '../assets/images/wall.jpg';
  img_char.src = '../assets/images/char2.png';
  img_scroll.src = '../assets/images/scroll2.jpg';
  img_gate.src = '../assets/images/java_gate2.png';
  img_coin.src = '../assets/images/java_coin2.png';
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
    if ($player === 'active') {
      if(keysDown[38] && player.tileFrom[1]>0 && (gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==1 || gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==2)) {
        if(gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==2){
          $('#st').removeAttr("disabled");
          $('#quiz-box').show('slow');
          get_quiz();
          $('#quiz-ex').show('slow');
          $('#quiz-hint').show('slow');
        }
        player.tileTo[1]-= 1;

      }else if(keysDown[40] && player.tileFrom[1]<(mapH-1) && (gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==1 || gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==2)) {
        if(gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==2){
          $('#st').removeAttr("disabled");
          $('#quiz-box').show('slow');
          get_quiz();
          $('#quiz-ex').show('slow');
          $('#quiz-hint').show('slow');
        }
        player.tileTo[1]+= 1;
      }else if(keysDown[37] && player.tileFrom[0]>0 && (gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==1 || gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==2)) {
        if(gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==2){
          $('#st').removeAttr("disabled");
          $('#quiz-box').show('slow');
          get_quiz();
          $('#quiz-ex').show('slow');
          $('#quiz-hint').show('slow');

        }
        player.tileTo[0]-= 1;
      }else if(keysDown[39] && player.tileFrom[0]<(mapW-1) && (gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==1 || gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==2)) {
        if(gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==2){
          $('#st').removeAttr("disabled");
          $('#quiz-box').show('slow');
          get_quiz();
          $('#quiz-ex').show('slow');
          $('#quiz-hint').show('slow');
        }
        player.tileTo[0]+= 1;
      }else if (keysDown[40] && player.tileFrom[1]<(mapH-1) && (gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==1 || gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==4)) {
        if(gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]+1)]==4){
          $player = "inactive";
          get_hint();
        }
        player.tileTo[1]+= 1;
      }else if (keysDown[38] && player.tileFrom[1]>0 && (gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==1 || gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==4)) {
        if(gameMap[toIndex(player.tileFrom[0], player.tileFrom[1]-1)]==4){
          $player = "inactive";
          get_hint();
        }
        player.tileTo[1]-= 1;
      }else if (keysDown[37] && player.tileFrom[0]>0 && (gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==1 || gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==4)) {
        if(gameMap[toIndex(player.tileFrom[0]-1, player.tileFrom[1])]==4){
          $player = "inactive";
          get_hint();
        }
        player.tileTo[0]-= 1;
      }else if (keysDown[39] && player.tileFrom[0]<(mapW-1) && (gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==1 || gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==4)) {
        if(gameMap[toIndex(player.tileFrom[0]+1, player.tileFrom[1])]==4){
          $player = "inactive";
          get_hint();
        }
        player.tileTo[0]+= 1;
      }
      if(player.tileFrom[0]!=player.tileTo[0] || player.tileFrom[1]!=player.tileTo[1])
      { player.timeMoved = currentFrameTime; }
    }
  }

  if ($resultAnswer == "correct") {
    $content = "public class Main { \n public static void main(String[] args) {\n    // Code here \n }\n}";
    var base_url = $('#baseurl').val();
    gameMap[toIndex(player.tileFrom[0], player.tileFrom[1])] = 1;
    $mapStat = toIndex(player.tileFrom[0], player.tileFrom[1]);
    // alert($mapStat);
    $('#quiz-box').hide();
    $('#quiz-box').empty();

    $('#quiz-ex').hide();
    $('#quiz-ex').empty();

    $('#quiz-hint').hide();
    $('#quiz-hint').empty();


    disable_runBtn();

    $progress = parseInt($game_progress) + 1;

    $.ajax({
        url: base_url + "index.php/game/solve_quiz_Map",
        method: 'POST',
        data: { mapStat: $mapStat, quizID: $id, Difficulty: $game, progress: $progress },
        success:function(result) {
          reload_prog();
        }
    });

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
          //ctx.fillStyle = "#685b48";

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
          //ctx.fillStyle = "#5aa457";
          ctx.drawImage(img_grass, x*tileW, y*tileH, tileW, tileH);
      }

      // ctx.fillRect( x*tileW, y*tileH, tileW, tileH);

    }
  }

  //ctx.fillStyle = "#0000ff";
  ctx.drawImage(img_char, player.position[0], player.position[1], player.dimensions[0], player.dimensions[1]);
  // ctx.fillRect(player.position[0], player.position[1],
  //  player.dimensions[0], player.dimensions[1]);

  // ctx.fillStyle = "#ff0000";
  // ctx.fillText("FPS: " + framesLastSecond, 10, 20);

  lastFrameTime = currentFrameTime;
  requestAnimationFrame(drawGame);
}
</script>
</head>

<body>
<div id="game-body">
  <nav class="nav-sidebar">
    <ul>
      <li><img src="../assets/img/logo2.png" class="nav-logo"></li>
      <li><a href="student_dashboard"><i class="icon-nav fas fa-home"></i></a></li>
      <li><i class="icon-nav fas fa-cogs"></i></li>
    </ul>
  </nav>
  <div class="game-map">
    <p class="title-map">Game Map</p>
    <input type="text" id="match" hidden />
    <div id="output" hidden></div>
    <canvas id="game" width="1175" height="559" ></canvas>
    <div class="game-obj2">
      <p class="title-map-p">Objective</p>
      <div id="quiz-box"></div>
    </div>
    <div class="game-ex">
      <p class="title-map-p">Example</p>
      <div id="quiz-ex" class="quiz scrollbar"></div>
    </div>
    <div class="game-hint">
      <p class="title-map-p">Hint</p>
      <div id="quiz-hint" class="quiz"></div>
    </div>
  </div>
  <div class="game-obj">
    <p>Compiler</p>
    <form action="../assets/codemirror/compile.php" id="form2" name="f2" method="POST" >
    <select class="form-control" name="language"  style="display:none">
    <option value="java">java</option>
    </select>

    <!-- <label for="ta">Write Your Code</label> -->
    <textarea id="demotext" class="form-control" name="code"></textarea>
    <br>
    <!-- <label for="in">Enter Your Input</label>
    <textarea class="form-control" name="input" rows="10" cols="50"></textarea><br><br> -->
    <input type="submit" id="st" class="btn btn-success" value="Run Code">
    </form>

    <!-- <label for="out" style="margin-top: -30px">Output</label> -->
    <textarea id='div' class="form-control" name="output" hidden></textarea><br><br>
  </div>
    <div class="game-time">
      <div class="game-space">

      </div>
      <i class="far fa-clock"><span class="timer">0:0:0<span></i>
    </div>
  </div>

  <!-- answer correct modal -->
  <div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

  <div class="modal fade" id="triviaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="exampleModalLabel"></h5>
        </div>
        <div class="modal-body modal-trivia">
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->




  <script src="../assets/bootstrap/jquery.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript">

  </script>
  <script>
  $("#st").click(function(){

        $("#div").html("Loading ......");

  });
  //wait for page load to initialize script
  $(document).ready(function(){
      //listen for form submission
      $('#form2').on('submit', function(e){
        //prevent form from submitting and leaving page
        e.preventDefault();

        // AJAX
        $.ajax({
              type: "POST", //type of submit
              cache: false, //important or else you might get wrong data returned to you
              url: "../assets/codemirror/compile.php", //destination
              datatype: "html", //expected data format from process.php
              data: $('#form2').serialize(), //target your form's data and serialize for a POST
              success: function(result) { // data is the var which holds the output of your process.php
                  // locate the div with #result and fill it with returned data from process.php
                  $('#div').html($.trim(result));
                  myResult();
              }
          });
      });
  });

  var editor = CodeMirror.fromTextArea(document.getElementById("demotext"), {
    lineNumbers: true,
    matchBrackets: true,
    styleActiveLine: true,
    autoCloseBrackets: true,
    scrollbarStyle: "overlay",
    mode: "text/x-java",
    theme: "ambiance",
    extraKeys: {"Ctrl-Space": "autocomplete"}
  });
  editorVal();
  function editorVal() {
    $content = "public class Main { \n public static void main(String[] args) {\n    // Code here \n }\n}";
    editor.setValue($content);
  }

  var base_url = $('#baseurl').val();
  $player = 'active';
  $game = "java_advance";
  $answer = "";
  $resultAnswer = "";

  function get_quiz(){
    $player = 'inactive';
    $('.modal-body').empty();
    $.ajax({
        url: base_url + "index.php/game/get_quiz",
        method: 'POST',
        data: { Difficulty: $game },
        success:function(result) {
              $('#quiz-box').empty();
              var d = JSON.parse(result);
              $.each(d, function(k, v) {
                $('#quiz-box').append('<p>'+ v.problem +'</p><button type="button" onclick="skipProblem()" name="button" class="btn btn-success">Skip</button>');
                $('#quiz-ex').append(v.example + '<br>Output:<span style="background:blue; color: white; padding:2px; border-radius:3px;">'+v.output+'</span>');
                $('#quiz-hint').append(v.hint);

                $('.modal-body').append('<p>'+ v.subject +'</p><hr><p>'+ v.trivia +'</p><hr><div class="row"><div class="col-sm-6" style="border-right: 1px solid black"><p>Code:</p>'+ v.example +'</div><div class="col-sm-6"><p>Output:</p>'+ v.output +'</div></div>');
                $answer = v.answer;
                $id = v.id;
                $requirements = v.requirement;
                $("#match").val(v.requirement);
              });
        }
    });
    $('#answerModal').modal('show');
  }

  $('#quiz-ex').hide();
  $('#quiz-hint').hide();
  disable_runBtn();

  function disable_runBtn()
  {
    $('#st').attr("disabled", "disabled");
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
                $('#triviaModal').modal('show');
                $('.modal-trivia').empty();
                $('.modal-trivia').append('<i style="text-align:center;margin:auto;display:block;font-size:40px;" class="far fa-lightbulb"><span style="color:#222;">'+ v.subject +'</span></i><hr><p class="hint-text">'+ v.trivia +'</p><button style="margin:auto; display:block" class="btn btn-success btn-hint" data-dismiss="modal" onclick="hideQbox()">ok</button>');
              });
        }
    });
  }

  function hideQbox() {
      $player = "active";
  }

  $(document).ready(function () {
          if (!$.browser.webkit) {
              $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
          }
      });

  function skipProblem() {
    $player = 'active';
    disable_runBtn();
    $("#quiz-ex").empty();
    $('#quiz-hint').empty();
    $('#quiz-box').empty();

    $("#quiz-ex").hide('slow');
    $('#quiz-hint').hide('slow');
    $('#quiz-box').hide('slow');
    editorVal();
  }

  function myResult() {
    $('.modal-body').empty();
    $tempAnswer = "";

   match();
   if ($("#output").text() >= '1') {
     if ($.trim($("#div").val()) === $answer) {

       $resultAnswer = "correct";
       $tempAnswer = '<p class="fas fa-check-circle"><span class="wrong-font">Correct Answer</span></p>';
       editorVal();
       $('.modal-body').empty();
     } else {
       $resultAnswer = "";
       $tempAnswer = '<p class="fas fa-times-circle"><span class="wrong-font">Wrong Answer!<span></p>';
       quiz_mistake();
     }
     $('#answerModal').modal('show');
     var code = $('#demotext').val();
     var result = $.trim($("#div").val());
     $('.modal-body').append('<p>'+ $tempAnswer +'</p><hr><div class="row"><div class="col-sm-6"><p>Code:</p><code>'+ code +'</code></div><div class="col-sm-6"><p>Output</p>'+ result +'</div></div>');
   }else {
     $('#answerModal').modal('show');
     $('.modal-body').append('<p style="text-align:center; font-size:30px;"> Wrong use of code! </p><hr><div style="text-align:center">Missing syntax:                 <span style="background: blue; color: white; padding:5px;border-radius:3px;">' + $requirements + '</span></div>');
   }
  }

  function match() {
      var outputDiv = $('#output');
      var searchText = $('#demotext').val();
      var wordMatch = $('#match').val();

      outputDiv.empty();

      var m = searchText.match(new RegExp(wordMatch.toString().replace(/(?=[.\\+*?[^\]$(){}\|])/g, "\\"), "ig"));
      outputDiv.append('<div>' + (m ? m.length : 0) + '</div>');
  }


  $( window ).load(function() {

    $.ajax({
        url: base_url + "index.php/game/getProgress",
        method: 'POST',
        data: { Difficulty: $game },
        success:function(result) {
              var d = JSON.parse(result);
              $.each(d, function(k, v) {
                $count = v.gametime;
              });
        }
    });

  });
  setInterval(function() {
         $count++;
         $('.timer').text(time_convert($count));
         $.ajax({
             url: base_url + "index.php/game/updateGameTime",
             method: 'POST',
             data: { Time: $count, Difficulty: $game },
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
                $mistakes = v.game_mistakes;
                $('.game-space').empty();
                $('.game-space').append('<p style="text-align:center">Game Progress</p><div class="progress" style="height:25px; padding:3px;width:250px; border-radius:20px;margin:auto;margin-top:0px;"><div class="progress-bar" role="progressbar" style="border-bottom-left-radius:15px;color:#bbb;border-top-left-radius:15px;border-bottom-right-radius:15px;border-top-right-radius:15px;width: '+ Math.round(10* ((parseInt($game_progress) / 20) * 100) )/10 +'%; line-height:19px;font-size:12px;background:#222" aria-valuenow="'+ Math.round(10* ((parseInt($game_progress) / 20) * 100) )/10 +'" aria-valuemin="0" aria-valuemax="100">'+ Math.round(10* ((parseInt($game_progress) / 20) * 100) )/10 +'</div></div><p style="text-align:center;color:red;margin-top:0px">Mistakes:  '+ v.game_mistakes +'</p>');
              });
        }
    });
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
  </script>
</body>

</html>

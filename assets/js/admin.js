
$('.student-area').show();
$('.teacher-area').hide();
$('.game-area1').hide();
$('.game-area2').hide();
$('.game-area3').hide();


function students() {
  $('.student-area').show();
  $('.teacher-area').hide();
  $('.game-area1').hide();
  $('.game-area2').hide();
  $('.game-area3').hide();

  $('.link-stud').addClass('active');
  $('.link-teach').removeClass('active');
  $('.link-game').removeClass('active');
  $('.link-game1').removeClass('active');
  $('.link-game2').removeClass('active');
  $('.link-game3').removeClass('active');
}

function teacher() {
  $('.student-area').hide();
  $('.teacher-area').show();
  $('.game-area1').hide();
  $('.game-area2').hide();
  $('.game-area3').hide();

  $('.link-stud').removeClass('active');
  $('.link-teach').addClass('active');
  $('.link-game').removeClass('active');
  $('.link-game1').removeClass('active');
  $('.link-game2').removeClass('active');
  $('.link-game3').removeClass('active');
}

function game1() {
  $('.student-area').hide();
  $('.teacher-area').hide();
  $('.game-area1').show();
  $('.game-area2').hide();
  $('.game-area3').hide();

  $('#game_data1_filter').hide();

  $('.link-stud').removeClass('active');
  $('.link-teach').removeClass('active');
  $('.link-game').addClass('active');
  $('.link-game1').addClass('active');
  $('.link-game2').removeClass('active');
  $('.link-game3').removeClass('active');
}
function game2() {
  $('.student-area').hide();
  $('.teacher-area').hide();
  $('.game-area1').hide();
  $('.game-area2').show();
  $('.game-area3').hide();

  $('.link-stud').removeClass('active');
  $('.link-teach').removeClass('active');
  $('.link-game').addClass('active');
  $('.link-game1').removeClass('active');
  $('.link-game2').addClass('active');
  $('.link-game3').removeClass('active');
}
function game3() {
  $('.student-area').hide();
  $('.teacher-area').hide();
  $('.game-area1').hide();
  $('.game-area2').hide();
  $('.game-area3').show();

  $('.link-stud').removeClass('active');
  $('.link-teach').removeClass('active');
  $('.link-game').addClass('active');
  $('.link-game1').removeClass('active');
  $('.link-game2').removeClass('active');
  $('.link-game3').addClass('active');
}

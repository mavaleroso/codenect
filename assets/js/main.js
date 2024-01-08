// $(document).ready(function() {
//
// 	var loaded = 0;
// 	var number_of_media = $("body img").length;
//
// 	doProgress();
//
// 	// function for the progress bar
// 	function doProgress() {
// 		$("img").load(function() {
// 			loaded++;
// 			var newWidthPercentage = (loaded / number_of_media) * 100;
// 			animateLoader(newWidthPercentage + '%');
// 		})
// 	}
//
// 	//Animate the loader
// 	function animateLoader(newWidth) {
// 		$("#progressBar").width(newWidth);
// 		if(loaded==number_of_media){
// 				setTimeout(function(){
//                     $("#progressBar").animate({opacity:0});
//                     },500);
// 		}
// 	}
//
// });



window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

$(function() {

    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
                if ($lg_username == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "So you are a student");
                }
                return false;
                break;
            case "lost-form":
                var $ls_email=$('#lost_email').val();
                if ($ls_email == "ERROR") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                } else {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                }
                return false;
                break;
            case "register-form":
                var $rg_username=$('#register_username').val();
                var $rg_email=$('#register_email').val();
                var $rg_password=$('#register_password').val();
                if ($rg_username == "ERROR") {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Register error");
                } else {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
                }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });

    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
    $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
    $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });

    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }

    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }

    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
  		}, $msgShowTime);
    }
});


$(function() {

    var $formLogin1 = $('#login-form1');
    var $formLost1 = $('#lost-form1');
    var $formRegister1 = $('#register-form1');
    var $divForms1 = $('#div-forms1');
    var $modalAnimateTime1 = 300;
    var $msgAnimateTime1 = 150;
    var $msgShowTime1 = 2000;

    $("form").submit(function () {
        switch(this.id) {
            case "login-form1":
                var $lg_username=$('#login_username1').val();
                var $lg_password=$('#login_password1').val();
                if ($lg_username == "ERROR") {
                    msgChange1($('#div-login-msg1'), $('#icon-login-msg1'), $('#text-login-msg1'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange1($('#div-login-msg1'), $('#icon-login-msg1'), $('#text-login-msg1'), "success", "glyphicon-ok", "Login OK");
                }
                return false;
                break;
            case "lost-form1":
                var $ls_email=$('#lost_email1').val();
                if ($ls_email == "ERROR") {
                    msgChange1($('#div-lost-msg1'), $('#icon-lost-msg1'), $('#text-lost-msg1'), "error", "glyphicon-remove", "Send error");
                } else {
                    msgChange1($('#div-lost-msg1'), $('#icon-lost-msg1'), $('#text-lost-msg1'), "success", "glyphicon-ok", "Send OK");
                }
                return false;
                break;
            case "register-form1":
                var $rg_username=$('#register_username1').val();
                var $rg_email=$('#register_email1').val();
                var $rg_password=$('#register_password1').val();
                if ($rg_username == "ERROR") {
                    msgChange1($('#div-register-msg1'), $('#icon-register-msg1'), $('#text-register-ms1'), "error", "glyphicon-remove", "Register error");
                } else {
                    msgChange1($('#div-register-msg1'), $('#icon-register-msg1'), $('#text-register-msg1'), "success", "glyphicon-ok", "Register OK");
                }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });

    $('#login_register_btn1').click( function () { modalAnimate1($formLogin1, $formRegister1) });
    $('#register_login_btn1').click( function () { modalAnimate1($formRegister1, $formLogin1); });
    $('#login_lost_btn1').click( function () { modalAnimate1($formLogin1, $formLost1); });
    $('#lost_login_btn1').click( function () { modalAnimate1($formLost1, $formLogin1); });
    $('#lost_register_btn1').click( function () { modalAnimate1($formLost1, $formRegister1); });
    $('#register_lost_btn1').click( function () { modalAnimate1($formRegister1, $formLost1); });

    function modalAnimate1 ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms1.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime1, function(){
            $divForms1.animate({height: $newH}, $modalAnimateTime1, function(){
                $newForm.fadeToggle($modalAnimateTime1);
            });
        });
    }

    function msgFade1 ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime1, function() {
            $(this).text($msgText1).fadeIn($msgAnimateTime1);
        });
    }

    function msgChange1($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade1($textTag, $msgText1);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade1n($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
  		}, $msgShowTime1);
    }
});


// Student

  $(document).ready(function() {
  	$("#register-form").unbind('submit').bind('submit', function() {
  		var form = $(this);

  		$.ajax({
  			url: form.attr('action'),
  			type: form.attr('method'),
  			data: form.serialize(),
  			dataType: 'json',
  			success:function(response) {
  				if(response.success == true) {
  					$("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
  					  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
  					  response.messages+
  					'</div>');

  					$("#register-form")[0].reset();
  					$(".text-danger").remove();
  					$(".form-group").removeClass('has-error').removeClass('has-success');

  				}
  				else {
  					$.each(response.messages, function(index, value) {
  						var element = $("#"+index);

  						$(element)
  						.closest('.form-group')
  						.removeClass('has-error')
  						.removeClass('has-success')
  						.addClass(value.length > 0 ? 'has-error' : 'has-success')
  						.find('.text-danger').remove();

  						$(element).after(value);

  					});
  				}
  			} // /success
  		});	 // /ajax

  		return false;
  	});
  });

// LOGIN

$(document).ready(function() {
	$("#login-form").unbind('submit').bind('submit', function() {
		var form = $(this);

		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success:function(response) {
				if(response.success == true) {

					$(".text-danger").remove();
					$(".form-group").removeClass('has-error').removeClass('has-success');

					window.location = response.messages1;
				}
				else {

					if(response.messages1 instanceof Object) {
						$.each(response.messages1, function(index, value) {
							var element = $("#"+index);

							$(element)
							.closest('.form-group')
							.removeClass('has-error')
							.removeClass('has-success')
							.addClass(value.length > 0 ? 'has-error' : 'has-success')
							.find('.text-danger').remove();

							$(element).after(value);

						});
					}
					else {
						$("#messages1").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
					  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
					  	response.messages1+
					'</div>');

						$(".text-danger").remove();
						$(".form-group").removeClass('has-error').removeClass('has-success');
					}

				}
			} // /success
		});	 // /ajax

		return false;
	});
});


// Teacher

$(document).ready(function() {
  $("#register-form1").unbind('submit').bind('submit', function() {
    var form = $(this);

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(),
      dataType: 'json',
      success:function(response) {
        if(response.success == true) {
          $("#messages2").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            response.messages2+
          '</div>');

          $("#register-form1")[0].reset();
          $(".text-danger").remove();
          $(".form-group").removeClass('has-error').removeClass('has-success');

        }
        else {
          $.each(response.messages2, function(index, value) {
            var element = $("#"+index);

            $(element)
            .closest('.form-group')
            .removeClass('has-error')
            .removeClass('has-success')
            .addClass(value.length > 0 ? 'has-error' : 'has-success')
            .find('.text-danger').remove();

            $(element).after(value);

          });
        }
      } // /success
    });	 // /ajax

    return false;
  });
});

// LOGIN

$(document).ready(function() {
$("#login-form1").unbind('submit').bind('submit', function() {
  var form = $(this);

  $.ajax({
    url: form.attr('action'),
    type: form.attr('method'),
    data: form.serialize(),
    dataType: 'json',
    success:function(response) {
      if(response.success == true) {

        $(".text-danger").remove();
        $(".form-group").removeClass('has-error').removeClass('has-success');

        window.location = response.messages3;
      }
      else {

        if(response.messages3 instanceof Object) {
          $.each(response.messages3, function(index, value) {
            var element = $("#"+index);

            $(element)
            .closest('.form-group')
            .removeClass('has-error')
            .removeClass('has-success')
            .addClass(value.length > 0 ? 'has-error' : 'has-success')
            .find('.text-danger').remove();

            $(element).after(value);

          });
        }
        else {
          $("#messages3").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            response.messages3+
        '</div>');

          $(".text-danger").remove();
          $(".form-group").removeClass('has-error').removeClass('has-success');
        }

      }
    } // /success
  });	 // /ajax

  return false;
});
});

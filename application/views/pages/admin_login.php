<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/admin_login.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/logo3.ico">
    
    <script src="../assets/bootstrap/jquery.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.js"></script>


    <title>Admin Login</title>
  </head>
  <body>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="../assets/img/logo3.png" id="icon" alt="User Icon" style="width:150px; margin-top:30px;" />
        </div>
        <div id="messages1"></div>

        <!-- Login Form -->
        <form id="login-form" method="POST" action="auth">
          <input type="text" id="login" class="fadeIn second" name="email" placeholder="email">
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
          <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

      </div>
    </div>

    <script type="text/javascript">
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
    </script>
  </body>
</html>

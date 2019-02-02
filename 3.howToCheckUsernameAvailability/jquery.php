<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Syntax</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">


</head>
<body>

<div class="container ">
    <h3 align="center">Register Page</h3>
        <div class="form-group">
            <label>Enter Username</label>
            <input type="text" name="username" id="username" class="form-control">
            <span id="availability"></span>
        </div>
    </div>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/project.js"></script>
<script src="../js/fontawesome.min.js"></script>
<script>
$(document).ready(function () {
   $('#username').blur(function () {
      var username = $(this).val();
      $.ajax({
         url: "check.php",
          method: "POST",
          data:{user_name:username},
          dataType:"text",
          success:function (html)
          {
              $('#availability').html(html);
          }
      });
   })
});
</script>

</body>
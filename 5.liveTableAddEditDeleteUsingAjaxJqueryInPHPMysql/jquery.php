
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
  <br />
    <br />
    <br />
    <div class="table-responsive">
        <h3 align="center">Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</h3>
        <br />
        <div id="live_data"></div>
    </div>
</div>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/project.js"></script>
<script src="../js/fontawesome.min.js"></script>
<script>
$(document).ready(function () {
    function fetch_data() {
     $.ajax({
         url: "select.php",
         method:"POST",
         success:function (data) {
             $('#live_data').html(data);
          }
       });
    }
})

</script>

</body>

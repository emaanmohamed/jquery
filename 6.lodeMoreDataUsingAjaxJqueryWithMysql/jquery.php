<?php
require '../vendor/autoload.php';
$connect = mysqli_connect("localhost","root", "", "testing");
$sql = "SELECT * FROM tbl_video LIMIT 1";
$result = mysqli_query($connect, $sql);
$video_id = '';
?>
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
        <h3 align="center">Live More Data using Ajax Jquery in PHP Mysql</h3>
        <table class="table table-bordered" id="load_data_table">
            <?php
           // dd(mysqli_fetch_array($result));
            while ($row = mysqli_fetch_array($result))
            {
            ?>
              <tr>
                  <td><?php echo $row["video_title"]; ?></td>
              </tr>
            <?php
                $video_id = $row["video_id"];
            }
            ?>
            <tr id="remove_row">
                <td><button name="btn_more" id="btn_more" data-vid="<?php $video_id; ?>" class="btn btn-success form-control" >more</button></td>
            </tr>
        </table>
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
   $(document).on('click', '#btn_more', function () {
       var last_video_id = $(this).data("vid");
       $('#btn_more').html("Loading....");
       $.ajax({
           url: "load_data.php",
           method:"POST",
           data:{last_video_id:last_video_id},
           dataType:"text",
           success:function (data) {
               if(data != '')
               {
                   $('#remove_row').remove();
                   $('#load_data_table').append(data);
               }
               else
               {
                   $('#btn_more').html("No Data");
               }
           }
       });
   });
});

</script>

</body>
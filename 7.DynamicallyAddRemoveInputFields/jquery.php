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
    <div class="table-responsive">
        <br />
        <br />
        <h3 align="center">Dynamically Add Remove input fields in PHP with jquery Ajax</h3>
        <div class="form-group">
            <form name="add_name" id="add_name">
                <table class="table table-bordered" id="dynamic_field">
<tr>
    <td><input type="text" name="name[]" id="name" placeholder="Enter Name" class="form-control name_list" </td>
    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
</tr>
                </table>
                <input type="button" name="submit" id="submit" value="submit" class="btn btn-success">
            </form>
         </div>
    </div>
</div>
</body>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/project.js"></script>
<script src="../js/fontawesome.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {
   var i = 1;
   $('#add').click(function () {
       i++;
       $('#dynamic_field').append('<tr>\n' +
           '    <td><input type="text" name="name[]" id="name" placeholder="Enter Name" class="form-control name_list" </td>\n' +
           '    <td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>\n' +
           '</tr>');
       console.log('success');
//       $(document).on('click', '.btn_remove', function () {
////          var button_id = $(this).attr("id");
////          $('#row'+ button_id +'').remove();
//
//       });
   });
       $('#submit').click(function () {
          $.ajax({
              url:"name.php",
              method:"POST",
              data:$('#add_name').serialize(),
              success:function (data) {
                  alert(data);
                  $('#add_name')[0].reset();
              }
       });
   });
});

</script>


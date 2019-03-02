<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
$query    = "SELECT * FROM tbl_customer";
$result  = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Syntax</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <style>
        #box
        {
            width:100%;
            max-width:500px;
            border:1px solid #ccc;
            border-radius:5px;
            margin:0 auto;
            padding:0 20px;
            box-sizing:border-box;
            height:270px;
        }
    </style>
</head>
<body>
<div class="container ">
    <br />
    <h2 align="center">Delete multiple rows by selecting checkboxes using Ajax Jquery with PHP</h2><br /><br />
    <?php
    if(mysqli_num_rows($result) > 0)
    {
    ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Customer Name</th>
                <th>Customer Address</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result))
            {
            ?>
            <tr id="<?php echo $row["CustomerID"]; ?>">
                <td><?php echo $row["CustomerName"]; ?></td>
                <td><?php echo $row["Address"]; ?></td>
                <td><input type="checkbox" name="customer_id[]" class="delete_customer" value="<?php echo $row["CustomerID"]; ?>"/></td>
            </tr>
            <?php
               }
              ?>
        </table>
    </div>
    <?php
         }
        ?>
    <div align="center">
        <button type="button" name="btn_delete" id="btn_delete" class="btn btn-success">Delete</button>
    </div>

<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/project.js"></script>
<script src="../js/fontawesome.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {
   $('#btn_delete').click(function () {
       if(confirm("Are you sure you want to delete this?"))
       {
           var id = [];
           $(':checkbox:checked').each(function (i) {
              id[i] = $(this).val();
           });

           if(id.length === 0)
           {
               alert("Please Select atleast one checkbox");
           }
           else
           {
               $.ajax({
                   url: 'delete.php',
                   method:'POST',
                   data:{id:id},
                   success:function ()
                   {
                       for(var i = 0; i < id.length ; i++)
                       {
                           $('tr#'+id[i]+'').css('background-color', '#ccc');
                           $('tr#'+id[i]+'').fadeOut('slow');
                       }
                   }
               });
           }
       }
       else
       {
           return false;
       }
   });
});
     
</script>
</body>
</html>
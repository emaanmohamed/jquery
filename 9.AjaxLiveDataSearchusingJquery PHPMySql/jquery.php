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
    <h2 align="center">Ajax Live Data Search Using Jquery</h2>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Name" class="form-control"/>
        </div>
    </div>
    <br />
    <div id="result"></div>
</div>
</body>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/project.js"></script>
<script src="../js/fontawesome.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>
</html>
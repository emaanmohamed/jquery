
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
<!--Start Auto Refresh Div Content Using jQuery and AJAX-->
<div class="container ">
    <form name="add-tweet" method="post">
        <h3 align="center">Tweet Page</h3>
        <div class="form-group">
            <textarea name="tweet" id="tweet" class="form-control"></textarea>
        </div>

        <div class="form-group" align="right">
            <!--<input type="button" name="btn_tweet" id="btn_tweet" >-->
            <button type="button" name="btn_tweet" id="btn_tweet" class="btn btn-primary">Tweet</button>
        </div>
    </form>

    <br />
    <br />
    <div id="load_tweets"> </div>
    <!--refresh this div content every second !-->
    <!-- for refresh div we use setInterval() !-->
</div>
<!--End Auto Refresh Div Content Using jQuery and AJAX-->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/project.js"></script>
<script src="../js/fontawesome.min.js"></script>
<script>
    $(document).ready(function () {
        $('#btn_tweet').click(function () {
            var tweet_txt = $('#tweet').val();
            //trim() is used to remover spaces
            if ($.trim(tweet_txt) != '')
            {
                $.ajax({
                    url: 'insert.php' ,
                    method: "POST",
                    data:{tweet:tweet_txt},

                    dataType:"text",
                    success:function (data)
                    {
                        $('#tweet').val("");
                    }
                });
            }
        });

    });

    setInterval(function () {
        $('#load_tweets').load("fetch.php")
    }, 1000);


</script>

</body>

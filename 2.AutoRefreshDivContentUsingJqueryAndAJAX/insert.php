
<?php

include 'jquery.php';

$connect = mysqli_connect("localhost", "root", "", "testing");

$sql = "INSERT INTO tbl_tweet (tweet) VALUES ('".$_POST["tweet"]."')";
mysqli_query($connect, $sql);

include 'fetch.php';
?>



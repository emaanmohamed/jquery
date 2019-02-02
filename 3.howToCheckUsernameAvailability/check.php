<?php
require '../vendor/autoload.php';
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["user_name"]))
{
    $sqlData = "INSERT INTO tbl_user (user_name) VALUES('".$_POST["user_name"]."')";
    mysqli_query($connect, $sqlData);
    $sql = "SELECT * FROM tbl_user WHERE user_name = '".$_POST["user_name"]."'";
    $result = mysqli_query($connect, $sql);
   // dd($result);
    if(mysqli_num_rows($result) > 1)
    {
        echo '<span class="text-danger">Username not available</span>';
    }
    else
    {
        echo '<span class="text-success">Username available</span>';
    }
}
?>
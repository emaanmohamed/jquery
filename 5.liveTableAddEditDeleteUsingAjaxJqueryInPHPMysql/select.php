<?php
$connect = mysqli_connect("localhost", "root", "", "test_db");
$output = '';
$sql = "SELECT * FROM tbl_sample ORDER BY id DESC";
$result = mysqli_query($connect, $sql);
$output .= '
    <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th width="10%">Id</th>
            <th width="40%">First Name</th>
            <th width="40%">Last Name</th>
            <th width="10%">Delete</th>
        </tr>';

if (mysqli_num_rows($result) > 0)
{

}
else
{

}
$output .= '</table>
</div>';
?>
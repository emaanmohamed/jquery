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
        while ($row = mysqli_fetch_array($result))
        {
            $output .= '<td>' .$row["id"].'</td>
                        <td class="first_name" data-id1="'.$row["id"].'" 
                        contenteditable>'.$row["first_name"].'</td>
                         <td class="first_name" data-id2="'.$row["id"].'" 
                        contenteditable>'.$row["last_name"].'</td>
                        <td><button name="btn_delete" id="btn_delete"
                         data-id3="'.$row["id"].'">x</button>
                         </td>
                        ';
        }
        $output .= '<tr>
     <td></td>
      <td id="first_name" contenteditable></td>
      <td id="last_name" contenteditable></td>
      <td><button name="btn_delete"></button></td>
  </tr>';
}
else
{
    $output .='<tr>
                    <td colspan="4">Data not Found</td>
                    </tr>';
}
$output .= '</table>
</div>';
?>
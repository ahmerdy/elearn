<?php
include('dbcon.php');
if (isset($_POST['delete_announcement'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM notification where notification_id='$id[$i]'");
}
header("location: announcement.php");
}
?>
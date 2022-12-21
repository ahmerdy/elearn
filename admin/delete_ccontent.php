<?php
include('dbcon.php');
if (isset($_POST['delete_ccontent'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM coursecontent where cc_id='$id[$i]'");
}
header("location: ccontent.php");
}
?>
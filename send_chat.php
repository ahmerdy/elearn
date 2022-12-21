<?php
include('admin/dbcon.php');
include('session.php');
$reciever_id = $_POST['reciever_id'];
$my_message = $_POST['my_message'];



$now = time();



mysqli_query($conn,"insert into message (reciever_id,content,date_sended,sender_id,) values('$reciever_id','$my_message',$now,'$session_id')")or die(mysqli_error());
mysqli_query($conn,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$my_message',$now,'$session_id')")or die(mysqli_error());
?>
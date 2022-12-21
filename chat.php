<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
        <div class="row-fluid">
				<?php include('my_classmates_link.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					     <!-- breadcrumb -->
					     
<?php include ('admin/style.php'); ?>
<?php
								 $query_announcement = mysqli_query($conn,"SELECT * from message
																	LEFT JOIN student ON student.student_id = message.sender_id
																	where  (message.reciever_id = '$get_id' and message.sender_id = '$session_id') OR (message.reciever_id = '$session_id' and message.sender_id = '$get_id') order by date_sended DESC
																	")or die(mysqli_error());
								$count_my_message = mysqli_num_rows($query_announcement);	
if ($count_my_message > 0) {
   

								 while($row = mysqli_fetch_array($query_announcement)){	
								 $id = $row['message_id'];
								 								 $id_2 = $row['message_id'];
                                $sender = $row['sender_id'];
                                $reciever = $row['reciever_id'];
								 $status = $row['message_status'];
								 $sender_id = $row['sender_id'];
								 $sender_name = $row['sender_name'];
								 $reciever_name = $row['reciever_name'];
                                 $mc = $row['content'];
                                 $lc = $row['location'];
								 if ($sender == $session_id) { ?>
                                    <div class="sender">
  <img src="<?php  echo 'admin/'.$lc  ?>" alt="Avatar">
  <p><?php echo $mc ?></p>
  <span class="time-right">11:00</span>
</div>
                                <?php  }else{?>
                                    <div class="sender darker">
  <img src="<?php echo  'admin/'.$lc ?>" alt="Avatar" class="right">
  <p><?php echo  $mc ?></p>
  <span class="time-left">11:01</span>
</div>

                              <?php  }
                              
                            }
                        }else { 
                            $sqls = mysqli_query($conn,"SELECT * FROM student WHERE student_id = $get_id");
                            $srow = mysqli_fetch_array($sqls);
                            $sender = $srow['firstname']." ".$srow['lastname'];
                            $sqlr = mysqli_query($conn,"SELECT * FROM student WHERE student_id = $session_id");
                            $slc = $srow['location'];
                            $rrow = mysqli_fetch_array($sqlr);
                            $reciever = $rrow['firstname']." ".$rrow['lastname'];
                            $rlc = $rrow['location'];
                            ?>
                           <div class="sender">
                        
                        <img src="<?php  echo 'admin/'.$slc  ?>" alt="Avatar">
                        <p>Assalamu alaikum warahmatullahi wabarakatuhu <?php echo ",      ".$reciever ?></p>
                        <span class="time-right">11:02</span>
                        </div>

                        <div class="sender darker">
                        <img src="<?php echo  'admin/'.$rlc ?>" alt="Avatar" class="right">
                        <p class="mright" > Wa'alaikumussalamu warahmatullahi wabarakatuhu <?php echo ",      ".$sender  ?></p>
                        
                        <span class="time-left"><?php echo date("H:i:s") ?></span>
                        </div>
                        <input type="text" class="form-group">
                        </div>
                      <?php  }
                                 ?>
                                <div class="control-group">
			<label class="control-label" for="inputPassword">Content:</label>
      <input type = "hidden" value="<?php echo $get_id ?>" name ="reciver_id"  >
			<div class="controls">
				<textarea name="my_message" col="0" rows="10"></textarea>
                          
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<button type="submit" name="reply" id="<?php echo $get_id; ?>" class="btn btn-success reply"><i class="icon-reply"></i> Reply</button>
			</div>
		</div>
    <style>
      textarea{
        width:auto;
      }
    </style>






</div>
                        <!-- /block -->
                    </div>


                </div>
			
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>
		
								
<script>
			jQuery(document).ready(function(){
			jQuery("#send_message").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "send_chat.php",
						data: formData,
						success: function(html){
						
						$.jGrowl("Message Successfully Sended", { header: 'Message Sent' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'chat.php?id=<?php echo $get_id ?>'  }, delay);  
						
						
						}
						
					});
					return false;
				});
			});
			</script>
			
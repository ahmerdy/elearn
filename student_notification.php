<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
									
					     <ul class="breadcrumb">
						<?php
						$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
				
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
							
						
  					<form action="read.php" method="post">
						<?php if($not_read == '0'){
								}else{ ?>
							<button id="delete"  class="btn btn-info" name="read"><i class="icon-check"></i> Read</button>
													<div class="pull-right">
							Check All <input type="checkbox"  name="selectAll" id="checkAll" />
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>					
							</div>
	
								<?php } ?>
				
					<?php $query = mysqli_query($conn,"select * from notification")or die(mysqli_error());
					$count = mysqli_num_rows($query);
					if ($count  > 0){
					while($row = mysqli_fetch_array($query)){
					
					
					$query_yes_read = mysqli_query($conn,"select * from notification_read where notification_id = '$id' and student_id = '$session_id'")or die(mysqli_error());
					$read_row = mysqli_fetch_array($query_yes_read);
					
					//$yes = $read_row['student_read'];
				
					?>
									<div class="post"  id="del<?php echo $id; ?>">
										
										
										
										<?php  ?>	
											<strong><h3><?php echo $row['anntitle'];  ?></h3></strong>
											<?php echo $row['anncontent']; ?> Signed 
											<a href="<?php echo $row['ann_id']; ?><?php echo '?id='.$get_id; ?>">
											<strong><?php echo $row['firstname']." ".$row['lastname'];  ?></strong>
											<?php // echo $row['subject_code']; ?> 
									 
											</a>
										<hr>
										<div class="pull-right">
										<i class="icon-calendar"></i>&nbsp;<?php echo date("D d/m/Y.  H:i:s ",$row['datetime']); ?> 
										</div>
											
									
											
											</div>
					<?php
					} }else{
					?>
					<div class="alert alert-info"><strong><i class="icon-info-sign"></i> No Notifications Found</strong></div>
					<?php
					}
					?>
					
					</form>
						
                                </div>
                            </div>
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
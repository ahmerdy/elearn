<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                 
                <div class="span9" id="content">
                     <div class="row-fluid">
			                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">View Assignment Submitted</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="ass_sub.php"><i class="icon-arrow-left"></i> Back</a>
									
									<?php
									$query = mysqli_query($conn,"SELECT * FROM assignment a INNER JOIN student_assignment sa ON a.assignment_id = sa.ass_id where student_assignment_id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									
                                    <div class="alert alert-info">
                                    <center><strong><i class="icon-question icon-large"></i>&nbsp;View  <?php echo $row['ass_title']; ?> |</strong></center>
                                </div>
 
<p style="font-size: 18px;font-weight: bold;">Description : <?php echo $row['ass_sub_description'];?> </p>
<div class="container">
	<embed src="<?php echo $row['ass_floc']; ?>"  style="width: 60%; height: 900px;" />
    
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
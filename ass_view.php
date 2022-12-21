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
		                                <div class="muted pull-left">View Assignment</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="assignment.php"><i class="icon-arrow-left"></i> Back</a>
									<a href="ans_ass.php<?php echo '?ass_id='.$get_id ?>"><i class="icon-arrow-right" style="margin-left:580px"></i> Answer</a>
									<?php
									$query = mysqli_query($conn,"SELECT * FROM assignment where assignment_id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									
                                    <div class="alert alert-success">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp;View  <?php echo $row['ass_title']; ?> |</strong></center>
                                </div>
 
<p style="font-size: 18px;font-weight: bold;">Module : <?php echo $row['ass_title'];?> | Title : <?php echo $row['fdesc'];?></p>
<div class="container">
	<embed src="admin/<?php echo $row['floc']; ?>"  style="width: 60%; height: 900px;" />
    
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
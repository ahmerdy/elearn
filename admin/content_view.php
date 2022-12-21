<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
									
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">View Course Content</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="ccontent.php"><i class="icon-arrow-left"></i> Back</a>
									
									<?php
									$query = mysqli_query($conn,"SELECT * FROM coursecontent where cc_id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									
                                    <div class="alert alert-success">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp;View  <?php echo $row['cctitle']; ?> |</strong></center>
                                </div>
 
<p style="font-size: 18px;font-weight: bold;">Module : <?php echo $row['cctitle'];?> | Title : <?php echo $row['cc_desc'];?></p>
<div class="container">
	<embed src="<?php echo $row['ccfile']; ?>"  style="width: 100%; height: 900px;" />
    
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
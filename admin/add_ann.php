<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Post Notification</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="announcement.php"><i class="icon-arrow-left"></i> Back</a>
									    <form class="form-horizontal" method="post">
									
										<div class="control-group">
											<label class="control-label" for="inputPassword">Notification  Heading</label>
											<div class="controls">
											<input type="text" class="span8" name="title" id="inputPassword" placeholder="Notification Heading" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Notification Body</label>
											<div class="controls">
													<textarea name="description" id="ckeditor_full"></textarea>
											</div>
										</div>
												
																		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form>
										
										<?php
										if (isset($_POST['save'])){
										$title = $_POST['title'];
										$description = $_POST['description'];
                                            $time = time();
										
										
										
										mysqli_query($conn,"insert into notification (notification_heading,notification_body,date_of_notification) values('$title','$description','$time')")or die(mysqli_error());
										
										
										
										
										?>
										<script>
										window.location = "announcement.php";
										</script>
										<?php
										
										}
										
										?>
									
								
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
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
		                                <div class="muted pull-left">Upload Assignment</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="assignment.php"><i class="icon-arrow-left"></i> Back</a>
									    <form class="form-horizontal" method="post"  enctype="multipart/form-data" >
									
										<div class="control-group">
											<label class="control-label" for="inputPassword">Assignment Title</label>
											<div class="controls">
											<input type="text" class="span8" name="title" id="inputPassword" placeholder="Assignment Title" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="inputPassword">Assignment Deadline</label>
											<div class="controls">
											<input type="date" class="span8" name="ad" id="inputPassword" placeholder="Assignment Deadline" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Assignment Total Marks</label>
											<div class="controls">
											<input type="text" class="span8" name="tm" id="inputPassword" placeholder="Assignment Marks" required>
											</div>
										</div>										
										<div class="control-group">
											<label class="control-label" for="">File Content</label>
											<div class="controls">
											<input type="file" class="span8" name="image" id="unilogo" placeholder="" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Assignment Description(Optional)</label>
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
										$ad =  strtotime($_POST['ad']);
										$description = $_POST['description'];
										$total_marks = $_POST['tm'];
										$time_posted = time();
										$query = mysqli_query($conn,"SELECT  * FROM  assignment where ass_title = '$title' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);
										$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
										$image_name = addslashes($_FILES['image']['name']);
										$image_size = getimagesize($_FILES['image']['tmp_name']);
		
										move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
										$location = "uploads/" . $_FILES["image"]["name"];
										
										
										if ($count > 0){ ?>
										<script>
										alert('Data Already Exist');
										</script>
										<?php
										}else{
										mysqli_query($conn,"insert into assignment(ass_title,fdesc,sub_date,as_marks,d_date,floc) values('$title','$description','$time_posted','$total_marks','$ad', '$location')")or die(mysqli_error());
										
										
										mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add  Assignment $title')")or die(mysqli_error());
										
										
										?>
										<script>
										window.location = "assignment.php";
										</script>
										<?php
										}
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
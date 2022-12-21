<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['ass_id']; ?>

    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                 
                <div class="span9" id="content">
                     <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Assignment Submission</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="assignment.php"><i class="icon-arrow-left"></i> Back</a>
									    <form class="form-horizontal" method="post"  enctype="multipart/form-data" >
																		
										<div class="control-group">
											<label class="control-label" for="">File Content</label>
											<div class="controls">
											<input type="file" class="span8" name="image" id="unilogo" placeholder="" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Submission  Description(Optional)</label>
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
										$location = "admin/submit/" . $_FILES["image"]["name"];
										
										
										if ($count > 0){ ?>
										<script>
										alert('Data Already Exist');
										</script>
										<?php
										}else{
										mysqli_query($conn,"insert into student_assignment(ass_sub_description,ass_date_sub,ass_std_id,ass_id,ass_floc) values('$description','$time_posted', '$session_id', '$get_id', '$location')")or die(mysqli_error());
										
										
										
										?>
										<script>
										window.location = "ass_sub.php";
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
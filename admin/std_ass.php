<?php include('header.php'); ?>
<?php include('session.php');
	$get_id = $_GET['id'];
 ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                         <a href="add_ass.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> 	Upload Assignment</a>
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Assignment File Uploaded List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
						
										<thead>
										        <tr>

												<th>S/N</th>
												<th>Ass Title</th>
												<th>Student Name</th>
												<th>Date Submitted</th>
												<th>Score</th>
												
												<th>Action</th>
                                   
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
                              		$x = 1;
										$query = mysqli_query($conn,"SELECT * FROM student_assignment sa INNER JOIN student s ON sa.ass_std_id = s.student_id INNER JOIN assignment a ON  a.assignment_id = sa.ass_id WHERE ass_id = '$get_id' ")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
											$id = $row['student_assignment_id'];
									?>
							

					
                              
										<tr>

                                         <td><?php  echo $x; ?></td>
                                         <td><?php  echo $row['ass_title']; ?></td>
                                         <td><?php echo $row['firstname'] .' '.$row['lastname']; ?></td>
                                         <td><?php echo date("Y-M-d",$row['sub_date']); ?></td>
                                         <td><?php echo $row['ass_score']; ?></td>
                                         	<td width="100"><a href="ass_view.php<?php echo '?id='.$id; ?>" class="btn btn-primary"><i class="icon-book"></i> </a>
                                         		<a href="std_ass.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-user"></i> </a>
                                         	</td>
                               
                                </tr>
                         
						 <?php $x++; } ?>
						   
                              
										</tbody>
									</table>
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
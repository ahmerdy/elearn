<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                 
                <div class="span9" id="content">
                     <div class="row-fluid">
	                 <!-- block -->
                         
                        <div id="block_bg" class="block" style="width:900px">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Assignments List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
						
										<thead>
										        <tr>

												<th>S/N</th>
												<th>Ass Title</th>
												<th>Ass Description</th>
												<th>Date Uploaded</th>
												<th>Total Marks</th>
												<th>Ass Deadline</th>
												<th>Action</th>
                                   
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
                              		$x = 1;
										$query = mysqli_query($conn,"select * FROM assignment")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
											$id = $row['assignment_id'];
									?>
							

					
                              
										<tr>

                                         <td><?php  echo $x; ?></td>
                                         <td><?php  echo $row['ass_title']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>
                                         <td><?php echo date("Y-M-d",$row['sub_date']); ?></td>
                                         <td><?php echo $row['as_marks']; ?></td>
                                         <td><?php echo date("Y-M-d",$row['d_date']); ?></td>
                                         	<td width="30"><a href="ass_view.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-folder-open-alt"></i> </a></td>
                               
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
<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
		
                <div class="span9" id="content">
                     <div class="row-fluid">
					 <a href="add_contents.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Course Content</a>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Course Content List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_ccontent.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#ccontent_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
											    <th></th>
												<th>S/N</th>
												<th>Content Title</th>
												<th>Action </th>
										   </tr>
										</thead>
										<tbody>
											
												<?php
												$x=1;
											$subject_query = mysqli_query($conn,"select * from coursecontent ")or die(mysqli_error());
											while($row = mysqli_fetch_array($subject_query)){
											$id = $row['cc_id'];
											?>
										
											<tr>
													<td width="30">
													<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $x; ?></td>
													<td><?php echo $row['cctitle']; ?></td>
												
													<td width="30"><a href="content_view.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-folder-open-alt"></i> </a></td>
										</tr>
											
											<?php
											$x++;
										} ?>   
                              
										</tbody>
									</table>
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
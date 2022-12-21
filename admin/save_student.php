<?php
include('dbcon.php');
        
               $un = $_POST['un'];
               $fn = $_POST['fn'];
               $ln = $_POST['ln'];
               

               mysqli_query($conn,"insert into student (username,firstname,lastname,location,status)
		values ('$un','$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','Registered')                                    
		") or die(mysqli_error()); ?>
<?php    ?>
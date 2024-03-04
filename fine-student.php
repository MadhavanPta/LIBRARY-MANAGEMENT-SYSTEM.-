<?php

require 'includes/snippet.php';
require 'includes/db-inc.php';
 include "includes/header.php"; 

session_start();
$student = $_SESSION['student-name'];

if(isset($_POST['del'])){
	$id = trim($_POST['del-btn']);

	$sql = "DELETE  FROM student where id = '$id'";
	$query = mysqli_query($conn, $sql);
	$error = false;
	if($query){
		$error = true;
	}
}

	if (isset($_POST['check'])) {
		$id = $_POST['id'];
		
	$sql = "SELECT returnDate from borrow where borrowId = '$id'";
	$query = mysqli_query($conn, $sql);
	 $row = mysqli_fetch_assoc($query);

	 $now = date_create(date('Y-m-d'));
	 "<br>";
	 $prev =  date_create(date("Y-m-d",strtotime($row['returnDate'])));
	 "<br>";
	  $diff = date_diff($prev,$now);
	 "<br>";
	$diff = str_replace('+', '', $diff->format('%R%a'));
	   if ($diff > 0) {
		// echo "greater";
		$fine = 30 * $diff;

	    $add = "UPDATE `borrow` SET `fine`= '$fine' WHERE borrowId = '$id'";
	$query = mysqli_query($conn, $add);
	  }
	  else if ($now < $prev){
	  	// echo "lesser";
	  $add = "UPDATE `borrow` SET `fine`= '0' WHERE borrowId = '$id'";
	$query = mysqli_query($conn, $add);
	  }

	}

	 

 ?>


<div class="container">
    <?php include "includes/nav2.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

		<span class="glyphicon glyphicon-book"></span>
	    <strong>Fines</strong> Table
	</div>

	</div>
	<div class="container">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	 <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Deleted Successfully!</strong>
            </div>
            <?php } ?>
		  	<div class="row">
		  	  <a><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"> Fines</button></a>
			  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
			  
			  </div><!-- /.col-lg-6 -->
  
			</div>
		  </div>
		  <table class="table table-bordered">
		          <thead>
		               <tr> 
		                  <th>ID</th>
		                  <th>Member Name</th>
		                  <th>Matric Number</th>
		                  <th>Book Name</th>
		                  <th>Borrow date</th>
		                  <th>Return Date</th>
		                  <th>Overdue Charges</th>
		                </tr>    
		          </thead>  

		           <?php 
                  		$sql = "SELECT * FROM borrow where memberName = '$student'";
                  		$query = mysqli_query($conn, $sql);
                  		$counter = 1;
                  		while($row = mysqli_fetch_assoc($query)) { 
                   ?>

		          <tbody> 
		            <tr> 
		             <td><?php echo $counter++; ?></td>
		             <td><?php echo $row['memberName']; ?></td>
		             <td><?php echo $row['matricNo']; ?></td>
		             <td><?php echo $row['bookName']; ?></td>
		             <td><?php echo $row['borrowDate']; ?></td>
		             <td><?php echo $row['returnDate']; ?></td>
		             <td> 
		             	<?php echo $row['fine']; ?><form action="fine-student.php" method="post">
		             		<input type="hidden" name="id" value="<?php echo $row['borrowId']; ?>">
		             <button name="check" type="submit" class="btn btn-warning">CHECK</button>
		             </form>
		             </td>
		            </tr> 
		            <?php } ?> 
		         </tbody> 
		   </table>
		 
	  </div>
	</div>
	<div class="mod modal fade" id="popUpWindow">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p>Are you sure you want to delete this book?</p>
        			</div>

        			<!-- button -->
        			<div class="modal-footer ">
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right"  style="margin-left: 10px" class="close" data-dismiss="modal">
        					No
        				</button>&nbsp;
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right"  class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
        					Yes
        				</button>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="modal fade" id="info">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
        			</div>

        		</div>
        	</div>
        </div>
		




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
</body>
</html>
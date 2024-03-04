<?php 
require 'includes/db-inc.php';
include "includes/header.php"; 
session_start();
	$book = $_SESSION['book_Title'];
	$name = $_SESSION['student-name'];
	$number = $_SESSION['student-matric'];

	
if(isset($_POST['submit'])){
	$bid = trim($_POST['bookId']);
	$bdate = trim($_POST['borrowDate']);
	$due = trim($_POST['dueDate']);

	$bqry = mysqli_query($conn,"SELECT * FROM books where bookId = {$bid} ");
	$bdata = mysqli_fetch_array($bqry);

	$sql = "INSERT INTO borrow(memberName, matricNo, bookName, borrowDate, returnDate, bookId) values('$name', '$number', '{$bdata['bookTitle']}', '$bdate', '$due', '$bid')";
	$query = mysqli_query($conn, $sql);
	$error = false;
	if($query){
		$error = true;
	}
	else {
		echo "
		<script>
		alert('Unsuccessful');
		</script>
	";
	}

}
	
?>


<div class="container">
    <?php include "includes/nav2.php"; ?>
	<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 30px">
		<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
			 <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Added Successfully!</strong>
            </div>
            <?php } ?>
			<p class="page-header" style="text-align: center">LEND BOOK</p>

			<div class="container">
				<form class="form-horizontal" role="form" action="lend-student.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="Book Title" class="col-sm-2 control-label">BOOK TITLE</label>
						<div class="col-sm-10">
							<select class="form-control" name="bookId">
								<option>SELECT BOOK</option>
								<?php 
								$sql = "SELECT * FROM books";
								$query = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_assoc($query)) { ?>
                                <option value="<?php echo $row['bookId'] ?>" <?php echo isset($_GET['bid']) && $_GET['bid'] == $row['bookId'] ? "selected" : "" ?>><?php echo $row['bookTitle']; ?></option>
                                <?php	} ?>
								 ?>

							</select>
						</div>		
					</div>
					<div class="form-group">
						<label for="Book Title" class="col-sm-2 control-label">MEMBER NAME</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="member" id="bookTitle" value="<?php echo $name; ?>">
						</div>		
					</div>
					<div class="form-group">
						<label for="Member Card ID" class="col-sm-2 control-label">MATRIC NO</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="matric" value="<?php echo $number; ?>">
						</div>		
					</div>
					<div class="form-group">
						<label for="Borrow Date" class="col-sm-2 control-label">BORROW DATE</label>
						<div class="col-sm-10">
             			 <input type="date" class="form-control" name="borrowDate" id="brand">
						</div>		
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">RETURN DATE</label>
						<div class="col-sm-10" id="show_product">
              			<input type='date' class='form-control' name='dueDate'>
						</div>		
					</div>
					

					
					<div class="form-group ">
						<div class="col-sm-offset-2 col-sm-10 ">
							<button type="submit" class="btn btn-info col-lg-4 " name="submit">
								Submit
							</button>
							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

 <script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var brand_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{brand_id:brand_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script>
</body>
</html>
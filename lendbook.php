<?php 
// require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php"; 



	
if(isset($_POST['submit'])){
	$mcard = trim($_POST['memberCardID']);
	$bdate = trim($_POST['borrowDate']);
	$due = trim($_POST['dueDate']);

	

	$sql = "INSERT INTO borrow(memberName, matricNo, bookName, borrowDate, returnDate) values('$mcard', '$bdate', '$due')";
	$query = mysqli_query($conn, $sql);

	if($query){
		echo "
			<script>
			alert('New record added');
			</script>
		";


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
			
			<p class="page-header" style="text-align: center">LEND BOOK</p>

			<div class="container">
				<form class="form-horizontal" role="form" action="lend-student.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="Book Title" class="col-sm-2 control-label">BOOK TITLE</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="bookTitle" id="bookTitle" placeholder="Enter Book Title">
						</div>		
					</div>
					<div class="form-group">
						<label for="Book Title" class="col-sm-2 control-label">MEMBER NAME</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="bookTitle" id="bookTitle" value="<?php echo $name; ?>">
						</div>		
					</div>
					<div class="form-group">
						<label for="Member Card ID" class="col-sm-2 control-label">MATRIC NO</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="memberCardID" value="<?php echo $number; ?>">
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
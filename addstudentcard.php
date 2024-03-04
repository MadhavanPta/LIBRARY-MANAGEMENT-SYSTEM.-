<?php 
require 'includes/snippet.php';
	require 'includes/db-inc.php';
include "includes/header.php";

	if(isset($_POST['submit'])){
		$id = sanitize(trim($_POST['id']));
		$matric = sanitize(trim($_POST['matric']));
		$issue = sanitize(trim($_POST['issue']));
		$expiry = sanitize(trim($_POST['expiry']));
		$filename='';
		
	if(isset($_FILES['imgUp'])) {
			$img_size = $_FILES['imgUp']['size'];
			$temp = $_FILES['imgUp']['tmp_name'];
			$img_type = $_FILES['imgUp']['type'];
			$img_name = $_FILES['imgUp']['name'];
	
			if ($img_size > 500000) {
				$err_flag = true;
				$error = "Your image size is too big... Try again.";
			}
	
			$extensions = array('jpg', 'jpeg', 'png', 'gif');
			$img_ext = explode('/', $img_type);
			$img_ext = end($img_ext);
			$img_ext = strtolower($img_ext);
			if (!(in_array($img_ext, $extensions))) {
				$err_flag = true;
				$error = "Unwanted image file type... Only jpg,jpeg,png and gif allowed";
			}
			// Prepare image folder in the server
			$imgFile = 'posts-images/';
			$filename = rand(1000, 8000) . '_' .time() . '.' . $img_ext;
			$filepath = $imgFile . $filename;
			// if (isset($err_flag) && $err_flag === false) {
			//     $result = move_uploaded_file($temp, $filepath);
			//     if ($result) {
			//         $magicianObj = new imageLib($filepath);
			//         $magicianObj -> resizeImage(100, 100);
			//         $magicianObj -> saveImage($imgFile . 'thumbnails/' . $filename, 100);
			//         $img_path = $imgFile.$img_name;
			//     }
			// }
				
			}

			
		
		//Creating an insert sql statement;
		$sql = "INSERT into membercard (memberId, matricNo, issueDate, expiryDate, picture)
		 values ('$id','$matric','$issue','$expiry', '$filename')";

		//Querying the database;
		 $query = mysqli_query($conn, $sql);
		 
		 if ($query) {
			echo "<script>alert('New Card has been registered ');
					//location.href ='admin.php';
					</script>";
		}
		else {
		echo "<script>alert('Card not registered!');
					</script>";	
		}

		

	}


 ?>


<div class="container">
    <?php include "includes/nav.php";?>
	<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 30px">
		<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
				
			<p class="page-header" style="text-align: center">ADD MEMBER CARD</p>

			<div class="container">
				<form class="form-horizontal" role="form" action="addstudentcard.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="Username" class="col-sm-2 control-label">MEMBER ID.</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="id" placeholder="Enter Member Id" id="title" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="Username" class="col-sm-2 control-label">MATRIC NO.</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="matric" placeholder="Enter Matric No" id="username" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">ISSUE DATE</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="issue" placeholder="Enter Issue Date" id="password" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">EXPIRY DATE</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="expiry" placeholder="Enter Expiry Date" id="password" required>
						</div>		
					</div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">PICTURE</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="imgUp" placeholder="Enter image" id="password" style="padding: 0" required>
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
<script type="text/javascript">
 	window.onload = function () {
		var input = document.getElementById('title').focus();
	}
 </script>
</body>
</html>
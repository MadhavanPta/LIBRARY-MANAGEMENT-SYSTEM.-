<?php 
require 'includes/snippet.php';
    require 'includes/db-inc.php';
include "includes/header.php"; 

if(isset($_POST['submit'])) {

    $matric = sanitize(trim($_POST['matric_no']));
    $password = sanitize(trim($_POST['password']));
    $password2 = sanitize(trim($_POST['password2']));
    $username = sanitize(trim($_POST['username']));
    $email = sanitize(trim($_POST['email']));
    $dept = sanitize(trim($_POST['dept']));
    $books = sanitize(trim($_POST['num_books']));
    $money = sanitize(trim($_POST['money_owed']));
    $phone = sanitize(trim($_POST['email']));
    $name = sanitize(trim($_POST['name']));
    $filename =''; 

if (isset($_FILES['postimg'])) {
        $img_size = $_FILES['postimg']['size'];
        $temp = $_FILES['postimg']['tmp_name'];
        $img_type = $_FILES['postimg']['type'];
        $img_name = $_FILES['postimg']['name'];

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

    // echo $filename;

   if ($password == $password2) {
      $sql = "INSERT INTO students( matric_no, password, username, email, dept, numOfBooks, moneyOwed, photo, phoneNumber, name)
 VALUES ('$matric', '$password', '$username', '$email', '$dept', '$books', '$money', '$filename', '$phone', '$name' ) ";

      $query = mysqli_query($conn, $sql);
      $error = false;
      if($query){
       $error = true;
      }
      else{
        echo "<script>alert('Not Registered successful!! Try again.');
                    </script>"; 
      }
   }
   else {
    echo  "<script>alert('Password mismatched!')</script>";
   }
    

}

?>


<div class="container">
    <?php include "includes/nav.php"; ?>
    
    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
        <div class="jumbotron login3 col-lg-10 col-md-11 col-sm-12 col-xs-12">

              <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Added Successfully!</strong>
            </div>
            <?php } ?>
        
            <p class="page-header" style="text-align: center">ADD STUDENTS</p>

            <div class="container">
                <form class="form-horizontal" role="form" action="addstudent.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Username" class="col-sm-2 control-label">FULL NAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Full name" id="name" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">MATRIC NO</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="matric_no" placeholder="Matric Number" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">DEPT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dept" placeholder="Department" id="Address" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" placeholder="Username" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="password" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">CONFRIM PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password2" placeholder="Confirm password" id="password" required>
                        </div>      
                    </div>
                     
                     <input type="hidden" class="form-control" name="num_books" placeholder="books" id="password" required value="null">
                     <input type="hidden" class="form-control" name="money_owed" placeholder="Money" id="password" required value="null">
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">PHONE NUMBER</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" placeholder="phone" id="password" required>
                        </div>      
                    </div>     
                         
                    
                     <div class="form-group">
                        <label class="col-sm-2 control-label">IMAGE</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="postimg" placeholder="Enter image" id="password" style="padding: 0" required>
                        </div>      
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
                                ADD MEMBER
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
		var input = document.getElementById('name').focus();
	}
 </script>
</body>
</html>
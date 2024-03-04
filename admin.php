<?php
// session_start(); 
// session_destroy();
// if (!(isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
// 	header("Location: admin.php?access=false");
// 	exit();
// }
// else {
 	// $admin = $_SESSION['admin'];
// }
require 'includes/snippet.php';
require 'includes/db-inc.php';
 include "includes/header.php";

	// if(isset($_SESSION['admin'])){
	// 	$admin = $_SESSION['admin'];
	// 	// echo "Hello $user";
	// }

 if(isset($_POST['submit'])){

    $news = sanitize(trim($_POST['news']));

    $sql = "INSERT into news (announcement) values ('$news')"; 

    $query = mysqli_query($conn,$sql);
    $error = false;

       if($query){
       $error = true;
      }
      else{
        echo "<script>alert('Not successful!! Try again.');
                    </script>"; 
      }
 }

     if(isset($_POST['UpDat'])){
		$id = sanitize(trim($_POST['id']));
        $text = sanitize(trim($_POST['text']));

        $sql_up = "UPDATE news set announcement = '$text' where newsId = '$id'";
		echo mysqli_error($sql_up);
         $result = mysqli_query($conn,$sql_del);
                if ($result)
                {
                    echo "<script>
            
           
                   alert('Update successful');

         </script>";
                }


     }

     if(isset($_POST['del'])){

        $id = sanitize(trim($_POST['id']));

        $sql_del = "DELETE from news where newsId = $id"; 

        $result = mysqli_query($conn,$sql_del);
                if ($result)
                {
         //            echo "<script>
            
         //    var response = confirm('Would you like to delete the user');
         //    if (response == true) {
         //        alert('User was successfully deleted from the database');
         //            location.href ='admin.php';
         //    }   

         //    else
         //        {
         //            alert('Could not delete user');
         //        }
            

         // </script>";
                }

     }






  ?>


<div class="container">
    <?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

	    <h4 class="center-block"><strong> Welcome</strong> <span>
		 <?php echo $admin; ?></span> </h4>
	</div>
	

	</div>
	<div class="container">
		<div class="panel panel-default">

             <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Updated Successfully!</strong>
            </div>
            <?php } ?>
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	<div class="row">
		  		<h3 class="center-block">Published Announcements</h3>
			</div>
		  </div>
		  <table class="table table-bordered">
         

      		<thead>
                <tr>
                    <th>NewsId</th>
                         <th>Announcement</th>
                          
                          <th>Delete</th>
                </tr>
          </thead>

           <?php 

          $sql2 = "SELECT * from news";

      $query2 = mysqli_query($conn, $sql2);
      $counter = 1;
      while ($row = mysqli_fetch_array($query2)) {  ?>


        <tbody>
          <td><?php echo $counter++; ?></td>
          <td><?php echo $row['announcement']; ?></td>
         <form method='post' action='admin.php'>
        <input type='hidden' value="<?php echo $row['newsId']; ?>" name='id'>
       
        <td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
        </form>
        </tbody>

     <?php }
           ?>
		        
		         </tbody> 
		   </table>
		 
	  </div>

			<div class="panel panel-default">
				  <div class="panel-heading">
				    <h2 class="panel-title center-block">Publish New Announcements</h2>
				  </div>
	  <div class="panel-body">
	    <form role="form" action="admin.php" method="post">
				<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
					 <div class="form-group ">
					      <label for="name">Announcement</label>   
					       <textarea class="form-control" rows="3" draggable="false" name="news">
					       </textarea>  
					  </div> 
					
				</div><br>
	<div class="input-group pull-right">
		<div class="form-group">
			<button class="btn btn-primary" name="submit">SUBMIT</button>
		</div>
	</div>
        				
        				</form>
				  </div>
			</div>
	</div>

	<!-- Confirm delete modal begins here -->
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
        <!-- Confirm delete modal ends here -->
        <!-- delete message modal starts here -->
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
        <!-- delete message modal ends here -->
        <!-- update modal begins here -->
		
        <div class="modal fade" id="update">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h2 class="modal-title"> Update</h2>
        			</div>

        			<!-- body begins here -->
					<form role="form" action="admin.php" method="post" enctype="multipart/form-data">					
        			<div class="modal-body">
        					<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        					   <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
        						<label for="name">Enter Id </label>
        						<input type="text" name="id" value=" <?php
								 echo $row['newsId'];
								 ?>
								">
								 <div class="form-group ">
        						      <label for="name">Announcement</label>   
        						       <textarea class="form-control" rows="3" draggable="false" name="text" value="
									    ">
        						       </textarea>  
        						  </div> 
        						
        					</div>

        				
						
        			</div>

        			<!-- button -->
        			<div class="modal-footer">
        				<button  name ="UpDat" class="col-lg-12 col-sm-12 col-xs-12 col-md-12 btn btn-success" data-target="alert">
        					UPDATE
        				</button>
        			</div>
					</form>
					
        		</div>
        	</div>
        </div>
        <!-- update modal ends here -->
		


  <script type="text/javascript">
        
        function Delete() {
            return confirm('Would you like to delete the news');
        }

         function Update() {
            return confirm('Would you like to update the news');
        }

      </script>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
</body>
</html>
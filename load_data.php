<?php  
 //load_data.php  
 // $connect = mysqli_connect("localhost", "root", "", "library_db");  
 $output = '';  
 if(isset($_POST["brand_id"]))  
 {  
      if($_POST["brand_id"] != '')  
      {  
        $date = $_POST["brand_id"];
        $newdate = strtotime ( '+3 day' , strtotime ( $date ) ) ;
        $newdate = date ( 'Y-m-d' , $newdate ); 
      }  
      else  
      {  
           $newdate = ""; 
      }  
      $result = $newdate;  
      if($result)  
      {  
          $output = "<input type='date' class='form-control' name='dueDate' value='$result'>";  
      }  
      echo $output;  
 }  
 ?> 
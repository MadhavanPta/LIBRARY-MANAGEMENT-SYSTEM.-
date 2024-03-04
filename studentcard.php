<?php
require 'includes/snippet.php';
	require 'includes/db-inc.php';
 include "includes/header.php"; ?>


<div class="container">
    <?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

		<span class="glyphicon glyphicon-book"></span>
	    <strong>Member Cards</strong> Table
	</div>

	</div>
	<div class="container">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	<div class="row">
			  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
			  	<form >
			  		<div class="input-group pull-right">
				      <span class="input-group-addon">
				        <label>Search</label> 
				      </span>
				      <input type="text" class="form-control">
			      </div>
			  	</form>
			    
			  </div><!-- /.col-lg-6 -->
  
			</div>
		  </div>
		  <table class="table table-bordered">
		          <thead>
		               <tr> 
		                  <th>CARD ID</th>
		                  <th>MEMBER NO.</th>
		                  <th>ISSUE DATE</th>
		                  <th>EXPIRY DATE</th>
		                  <th>IMAGE</th>
		                  <th>ACTION</th>
		                </tr>    
		          </thead>    
		          <tbody> 
		            <tr> 
		             <td>1</td>
		             <td>4</td>
		             <td>560001</td>
		             <td>Tanmay</td>
		             <td>Bangalore</td>
		             <td><button class="btn btn-warning" data-toggle="modal" data-target="#popUpWindow">DELETE</button></td>
		            </tr> 
		            <tr> 
		             <td>1</td>
		             <td>18</td>
		             <td>560001</td>
		             <td>Tanmay</td>
		             <td>Bangalore</td>
		             <td><button class="btn btn-warning" data-toggle="modal" data-target="#popUpWindow">DELETE</button></td>
		            </tr> 
		            <tr> 
		             <td>1</td>
		             <td>Bangalore</td>
		             <td>560001</td>
		             <td>Tanmay</td>
		             <td>Bangalore</td>
		             <td><button class="btn btn-warning" data-toggle="modal" data-target="#popUpWindow">DELETE</button></td>
		            </tr> 
		            <tr> 
		             <td>1</td>
		             <td>Bangalore</td>
		             <td>560001</td>
		             <td>Tanmay</td>
		             <td>Bangalore</td>
		             <td><button class="btn btn-warning" data-toggle="modal" data-target="#popUpWindow">DELETE</button></td>
		            </tr> 
		            <tr> 
		             <td>1</td>
		             <td>Bangalore</td>
		             <td>560001</td>
		             <td>Tanmay</td>
		             <td>Bangalore</td>
		             <td><button class="btn btn-warning" data-toggle="modal" data-target="#popUpWindow">DELETE</button></td>
		            </tr> 
		            <tr> 
		             <td>1</td>
		             <td>Bangalore</td>
		             <td>560001</td>
		             <td>Tanmay</td>
		             <td>Bangalore</td>
		             <td><button class="btn btn-warning" data-toggle="modal" data-target="#popUpWindow">DELETE</button></td>
		            </tr> 
		            <tr> 
		             <td>1</td>
		             <td>Bangalore</td>
		             <td>560001</td>
		             <td>Tanmay</td>
		             <td>Bangalore</td>
		             <td><button class="btn btn-warning" data-toggle="modal" data-target="#popUpWindow">DELETE</button></td>
		            </tr> 
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
<?php
   #### CALLING CONTROLLER
   include("app/Http/Controllers/Controller.php");
   
   #### CALLING MODEL / QUERY BUILDER
   include("app/Models/Eloquent.php");
   
   $eloquent = new Eloquent;
   
   #### DELETE CATEGORY
   if(isset($_POST['try_delete']))
   {
   	# DELETE DATA #
   	$tableName = "services";
   	$whereValue["id"] = $_POST['id'];
   	$deleteResult = $eloquent->deleteData($tableName, $whereValue);
   }
   
   
   #### GET CATEGORY LIST
   $columnName = "*";
   $tableName = "services";
   $queryResult = $eloquent->selectData($columnName, $tableName);
   
   ?>
<!--body wrapper start-->
<div class="wrapper">
   <div class="row">
      <div class="col-sm-12">
         <!--breadcrumbs start -->
         <ul class="breadcrumb panel">
            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">List Of Services</li>
         </ul>
         <!--breadcrumbs end -->
         <section class="panel">
            <header class="panel-heading">
               LIST OF SERVICES
            </header>
            <div class="panel-body">
               <?php 
                  # DELETE MESSAGE
                  if(isset($_POST['try_delete']))
                  {
                  	if($deleteResult > 0)
                  		echo '<div class="alert alert-success">The Service is deleted successfully</div>';
                  	else
                  		echo '<div class="alert alert-danger">Something went wrong! Unable to delete. Please recheck.</div>';
                  }
                  
                  ?>
               <div class="adv-table">
                  <table  class="display table table-bordered table-striped" id="dynamic-table">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Service Name</th>
                           <th>Price</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           $n=1;
                           foreach($queryResult AS $eachRow)
                           {
                           	echo '
                           	<tr class="gradeA">
                           		<td>'.$n.'</td>
                           		<td>'.$eachRow['service_name'].'</td>
                           		<td>'.$eachRow['price'].'</td>
                           		<td class="center">
                           			<div class="row">
                           				<form method="post" action="" style="display: inline;">
                           					<input type="hidden" name="id" value="'.$eachRow['id'].'"/>
                           					<button name="try_delete" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                           				</form>
                           			</div>
                           		</td>
                           	</tr>
                           	';
                           	$n++;
                           }
                           ?>							 
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>ID</th>
                           <th>Service Name</th>
                           <th>Price</th>
                           <th>Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </section>
      </div>
   </div>
</div>
<!--body wrapper end-->
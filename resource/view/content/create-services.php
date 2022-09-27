<?php
#### CALLING CONTROLLER
include("app/Http/Controllers/Controller.php");

#### CALLING MODEL / QUERY BUILDER
include("app/Models/Eloquent.php");

$eloquent = new Eloquent;

#### INSET CATEGORY DATA
if( isset($_POST['create_service']) )
{
		$tableName = "services";
		$columnValue["service_name"] = $_POST['service_name'];
		$columnValue["price"] = $_POST['price'];
		$queryResult = $eloquent->insertData($tableName, $columnValue);
}

?>

<!--body wrapper start-->
<div class="wrapper">
	<div class="row">
		<div class="col-lg-12">
			
			<!--breadcrumbs start -->
			<ul class="breadcrumb panel">
				<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li class="active">Create Servies</li>
			</ul>
			<!--breadcrumbs end -->
			
			<section class="panel">
				<header class="panel-heading">
					CREATE A NEW SERVICE
				</header>
				<div class="panel-body">
				
					<?php 
					# INSERT MESSAGE
					if(isset($_POST['create_service']))
					{
						if(@$queryResult > 0)
							echo '<div class="alert alert-success">The Service is saved Successfully!</div>';
						else
							echo '<div class="alert alert-danger">Something went wrong. Unable to save. Please retry!</div>';
					}
					?>
				
					<div class="form">
						<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="">
							<div class="form-group ">
								<label for="CategoryName" class="control-label col-lg-2">Service Name</label>
								<div class="col-lg-7">
									<input class=" form-control" name="service_name" type="text"/>
								</div>
							</div>
							<div class="form-group ">
								<label for="CategoryStatus" class="control-label col-lg-2">Price</label>
								<div class="col-lg-7">
								<input class=" form-control" name="price" type="text"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button name="create_service" class="btn btn-success" type="submit">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<!--body wrapper end-->
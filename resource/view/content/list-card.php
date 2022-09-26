<?php
#### CALLING MODEL / QUERY BUILDER
include("app/Models/Eloquent.php");

$eloquent = new Eloquent;

if(isset($_REQUEST['did']))
{
	# Get the Delete File Information
	$columnName2 = "*";
	$tableName2 = "add_card";
	$whereValue2["id"] = $_REQUEST['did'];
	$deleteData = $eloquent->selectData($columnName2, $tableName2, @$whereValue2);

	# Delete the Data
	$tableName2 = "add_card";
	$whereValue2["id"] = $_REQUEST['did'];
	$deleteResult = $eloquent->deleteData($tableName2, $whereValue2);
}
#### Card'S LIST
$columnName = "*";
$tableName = "add_card";
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
				<li class="active">Card Number List</li>
			</ul>
			<!--breadcrumbs end -->
			
			<section class="panel">
				<header class="panel-heading">
					List of Cards Number
				</header>
				<div class="panel-body">
					
				<?php
				# DELETE MESSAGE
				if(isset($_REQUEST['did']))
				{
					if($deleteResult > 0)
						echo '<div class="alert alert-success">The Card number is deleted successfully!</div>';
					else
						echo '<div class="alert alert-danger">Something went wrong to delete! Please recheck.</div>';
				}
	
				?>	
					
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th>SL</th>
									<th>Cards Number</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
								<?php 
								$n = 1;
								foreach ($queryResult as $eachRow) 
								{
									echo '
									<tr class="gradeA">
										<td>'.$n.'</td>
										<td>'.$eachRow["card_no"].'</td>
										<td class="center">
											<div class="row">
											<a data-id="'.$eachRow["id"].'" href="#deleteModal" class="btn btn-danger btn-xs float-right deleteButton" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</a>
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
									<th>SL</th>
									<th>Cards Number</th>
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

<!-- Delete Modal Start -->
<div class="modal small fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Delete Card Number?</h4>
			</div>
			<div class="modal-body">
				<h5>Are you sure to delete this Card?</h5>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Cancel</button> 
				<a href="list-card.php" class="btn btn-danger" id="modalDelete" >Delete</a>
			</div>
		</div>
	</div>
</div>
<!-- Delete Modal End -->
<!-- jQuery Library -->
<script src="public/js/jquery-1.10.2.min.js"></script>

<!-- Script to Delete Start-->
<script>
$('.deleteButton').click(function() {
    var id = $(this).data('id');
	
    $('#modalDelete').attr('href', 'list-card.php?did=' + id);
})
</script>
<!-- Script to Delete End-->
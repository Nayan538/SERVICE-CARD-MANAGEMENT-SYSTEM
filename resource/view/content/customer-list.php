<?php
# CALLING CONTROLLER
include("app/Http/Controllers/Controller.php");
include("app/Http/Controllers/HomeController.php");

#### CALLING MODEL / QUERY BUILDER
include("app/Models/Eloquent.php");
# CALLING MODEL / QUERY BUILDER
$eloquent = new Eloquent;

error_reporting(E_ERROR | E_PARSE);
    $columnName = "*";
    $tableName = "card_activation";
    $activationResult = $eloquent->selectData($columnName, $tableName);
?>

<div class="wrapper">
    <div class="row">
		<div class="col-lg-12">
		
		<!--breadcrumbs start -->
        <ul class="breadcrumb panel">
            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Customer List  </li>
        </ul>
        <!--breadcrumbs end -->
		
            <section class="panel">
                <header class="panel-heading">
                Customer List
                </header>
                <div class="panel-body">
                        <div class="adv-table">
						<table class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
                                    <th> SL </th>
									<th> CARD NO</th>
									<th> CUSTOMER NAME </th>
									<th> MOBILE NO </th>
									<th> ACTIVATION DATE </th>
									<th> BALANCE </th>
								</tr>
							</thead>
                            <tbody>
                            <?php 
                                    $n = 1;
									#== ADMIN DATA TABLE
									foreach($activationResult AS $eachRow)
									{	
										echo '
										<tr class="gradeA">
                                            <td>'. $n .'</td>
											<td>'. $eachRow['card_no'] .'</td>
											<td>'. $eachRow['customer_name'] .'</td>
											<td>'.'0'.$eachRow['mobile_no'] .'</td>
											<td>'. $eachRow['activation_date'] .'</td>
											<td>'. $eachRow['balance'] .'</td>
										</tr>
										';
										$n++;
									}
								?>
							</tbody>
                            <tfoot>
								<tr>
                                    <th> SL </th>
									<th> CARD NO</th>
									<th> CUSTOMER NAME </th>
									<th> MOBILE NO </th>
									<th> ACTIVATION DATE </th>
									<th> BALANCE </th>
								</tr>
							</tfoot>
						</table>
					</div>
			</section>
        </div>
	</div>
</div>


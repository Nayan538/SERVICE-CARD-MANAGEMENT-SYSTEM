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
    $tableName = "use_a_card";
    $useResult = $eloquent->selectData($columnName, $tableName);

?>

<div class="wrapper">
    <div class="row">
		<div class="col-lg-12">
		
		<!--breadcrumbs start -->
        <ul class="breadcrumb panel">
            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Card Uses History</li>
        </ul>
        <!--breadcrumbs end -->
		
            <section class="panel">
                <header class="panel-heading">
                     Card Uses History
                </header>
                <div class="panel-body">
                        
                        <div class="adv-table">
						<table class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
                                    <th> SL </th>
									<th> ORDER NO</th>
									<th> CUSTOMER NAME </th>
									<th> MOBILE NO </th>
                                    <th> SERVICE NAME </th>
									<th> SERVICE DATE </th>
									<th> AMOUNT </th>
								</tr>
							</thead>
                            <tbody>
                            <?php 
                                    $n = 1;
									#== ADMIN DATA TABLE
									foreach($useResult AS $eachRow)
									{	
										echo '
										<tr class="gradeA">
                                            <td>'. $n .'</td>
											<td>'. $eachRow['order_no'] .'</td>
											<td>'. $eachRow['card_user_name'] .'</td>
											<td>'. $eachRow['card_user_mobile_no'] .'</td>
											<td>'. $eachRow['service_title'] .'</td>
											<td>'. $eachRow['service_date'] .'</td>
											<td>'. $eachRow['amount'] .'</td>
										</tr>
										';
										$n++;
									}
								?>
							</tbody>
                            <tfoot>
								<tr>
									<th> SL </th>
									<th> ORDER NO</th>
									<th> CUSTOMER NAME </th>
									<th> MOBILE NO </th>
                                    <th> SERVICE NAME </th>
									<th> SERVICE DATE </th>
									<th> AMOUNT </th>
								</tr>
							</tfoot>
						</table>
					</div>
			</section>
        </div>
	</div>
</div>


<?php
# CALLING CONTROLLER
include("app/Http/Controllers/Controller.php");
include("app/Http/Controllers/HomeController.php");

#### CALLING MODEL / QUERY BUILDER
include("app/Models/Eloquent.php");
# CALLING MODEL / QUERY BUILDER
$eloquent = new Eloquent;

error_reporting(E_ERROR | E_PARSE);


    $columnName = $tableName = $whereValue = NULL;
    $columnName = "*";
    $tableName = "redeem";
    $redeemResult = $eloquent->selectData($columnName, $tableName);
?>

<div class="wrapper">
    <div class="row">
		<div class="col-lg-12">
		
		<!--breadcrumbs start -->
        <ul class="breadcrumb panel">
            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Redeem Amount History</li>
        </ul>
        <!--breadcrumbs end -->
		
            <section class="panel">
                <header class="panel-heading">
                Redeem Amount History
                </header>
                <div class="panel-body">
                        <div class="adv-table">
						<table class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
                                    <th> SL </th>
                                    <th> REDEEM DATE </th>
									<th> CARD NO</th>
									<th> CUSTOMER NAME </th>
                                    <th> SERVICE NAME </th>
									<th> AMOUNT </th>
								</tr>
							</thead>
                            <tbody>
                            <?php 

                                    $n = 1;
									#== ADMIN DATA TABLE
									foreach($redeemResult AS $eachRow)
									{	
										echo '
										<tr class="gradeA">
                                            <td>'. $n .'</td>
                                            <td>'. $eachRow['created_at'] .'</td>
											<td>'. $eachRow['use_card_no'] .'</td>
											<td>'. $eachRow['customer_name'] .'</td>
											<td>'. $eachRow['service_title'] .'</td>
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
                                    <th> REDEEM DATE </th>
									<th> CARD NO</th>
									<th> CUSTOMER NAME </th>
                                    <th> SERVICE NAME </th>
									<th> AMOUNT </th>
								</tr>
							</tfoot>
						</table>
					</div>
			</section>
        </div>
	</div>
</div>
<script src="public/js/jquery-1.10.2.min.js"></script>
<script>
function popupFunc(url) {
	popupWindow = window.open(url,'popupWindow','height=500,width=600,left=350,top=100')
}
</script>

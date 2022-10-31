<?php
# CALLING CONTROLLER
include("app/Http/Controllers/Controller.php");
include("app/Http/Controllers/HomeController.php");

#### CALLING MODEL / QUERY BUILDER
include("app/Models/Eloquent.php");
# CALLING MODEL / QUERY BUILDER
$eloquent = new Eloquent;

error_reporting(E_ERROR | E_PARSE);

if(isset($_POST['search_card']))
{
    $columnName = "*";
    $tableName = "use_a_card";
    $whereValue["use_card_no"] = $_POST['search_card'];
    $useResult = $eloquent->selectData($columnName, $tableName,$whereValue);
    $totalCustomer = count($useResult);
}
 
if(isset($_POST['search_card']))
{
    $columnName = $tableName = $whereValue = NULL;
    $columnName = "*";
    $tableName = "card_activation";
    $whereValue["card_no"] = $_POST['search_card'];
    $activationResult = $eloquent->selectData($columnName, $tableName,$whereValue);
}
?>

<div class="wrapper">
    <div class="row">
		<div class="col-lg-12">
		
		<!--breadcrumbs start -->
        <ul class="breadcrumb panel">
            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Search Card</li>
        </ul>
        <!--breadcrumbs end -->
		
            <section class="panel">
                <header class="panel-heading">
                    Search Card
                </header>
                <div class="panel-body">
                        <form class="cmxform form-horizontal" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-lg-6">

                                </div>
                                <label for="CardNo" class="control-label col-lg-2">Card Number</label>
                                <div class="col-lg-3">
                                    <input name="search_card" type="text" class="form-control" id="search_card" value="<?php if(isset($_GET['card_no'])){echo $_GET['card_no'];} ?>"> 
                                </div>
                                    <button name="try_search_card" type="submit" class="btn btn-success">Search</button>
                            </div>
                            <div class="form-group">
                                <label for="CustomerName" class="control-label col-lg-2">Card No</label>
                                <div class="col-lg-4">
                                    <label for="CustomerName" class="control-label col-lg-2"><?php echo $activationResult[0]['card_no']?> </label> 
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="CustomerName" class="control-label col-lg-2">Customer Name</label>
                                <div class="col-lg-4">
                                    <input name="customer_name" type="text" class="form-control" id="customer_name" value="<?php echo $activationResult[0]['customer_name']?>">
                                </div>
                                <label for="noReferrer" class="control-label col-lg-2">No. Of Referrer</label>
                                <div class="col-lg-4">
                                    <input name="card_no" type="text" class="form-control" id="card_no" value="<?= $totalCustomer ?>" >
                                </div>
                            </div>
							<div class="form-group ">
                                <label for="MobileNo" class="control-label col-lg-2">Contact No</label>
                                <div class="col-lg-4">
                                    <input name="mobile_no" type="text" class="form-control" id="mobile_no" value="<?= $activationResult[0]['mobile_no']; ?>">
                                </div>
                                <label for="Balance" class="control-label col-lg-2">Balance</label>
                                <div class="col-lg-4">
                                    <input name="balance" type="text" class="form-control" id="balance" value="<?= $activationResult[0]['balance'] ?>">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-lg-8">
                                </div>
                                <div class="col-lg-4">
                                <input type="hidden" name="redeem_id" value="<?php echo $activationResult[0]['id']?>"/>
                                <button  name="try_redeem" type="submit" class="btn btn-success"  onclick="popupFunc('create-redeem.php')">Redeem Amount</button>
                                </div>
                            </div>

                            <!-- End .form-group -->
                            <br/><br/>

                        </form>
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
                                    if(isset($_POST['card_no'])){

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
<script src="public/js/jquery-1.10.2.min.js"></script>
<script>
function popupFunc(url) {
	popupWindow = window.open(url,'popupWindow','height=500,width=600,left=350,top=100')
}
</script>

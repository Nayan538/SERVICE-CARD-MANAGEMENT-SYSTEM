<?php
# CALLING CONTROLLER
include("app/Http/Controllers/Controller.php");
include("app/Http/Controllers/HomeController.php");

#### CALLING MODEL / QUERY BUILDER
include("app/Models/Eloquent.php");
# CALLING MODEL / QUERY BUILDER
$eloquent = new Eloquent;

# SAVE CUSTOMER #
if(isset($_POST['try_card']))
{
	$tableName = "use_a_card";
	$columnValue["use_card_no"] = $_POST['use_card_no'];
	$columnValue["card_user_name"] = $_POST['card_user_name'];
	$columnValue["card_user_mobile_no"] = $_POST['card_user_mobile_no'];
    $columnValue["order_no"] = $_POST['order_no'];
    $columnValue["service_title"] = $_POST['service_title'];
    $columnValue["amount"] = $_POST['amount'];
	$columnValue["service_date"] = date("Y-m-d H:i:s");
    $useCard = $eloquent->insertData($tableName, $columnValue);
}
?>

<div class="wrapper">
    <div class="row">
		<div class="col-lg-12">
		
		<!--breadcrumbs start -->
        <ul class="breadcrumb panel">
            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active"> Use a Card</li>
        </ul>
        <!--breadcrumbs end -->
		
            <section class="panel">
                <header class="panel-heading">
                    Use A Card
                </header>
                <div class="panel-body">
						<?php 
						if(isset($_POST['try_card']))
						{
							if($useCard['NO_OF_ROW_INSERTED'])
							{
								echo '
									<div class="alert alert-success">
										 Successfully Use the Card. 
									</div>
								';
							}
						}
						?>
                        
                        <form class="cmxform form-horizontal" method="post" action="" enctype="multipart/form-data">
							<div class="form-group">
                                <label for="CardNo" class="control-label col-lg-2">Referral Card Number</label>
                                <div class="col-lg-7"> 
                                    <input name="use_card_no" type="text" class="form-control" id="use_card_no" placeholder="Enter the Card No" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="CustomerName" class="control-label col-lg-2">Card User Name</label>
                                <div class="col-lg-7">
                                    <input name="card_user_name" type="text" class="form-control" id="card_user_name" placeholder="Enter the Customer Name" required>
                                </div>
                            </div>
							<div class="form-group ">
                                <label for="MobileNo" class="control-label col-lg-2">User Contact No</label>
                                <div class="col-lg-7">
                                    <input name="card_user_mobile_no" type="number" class="form-control" id="card_user_mobile_no" placeholder="018********" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="OrderNo" class="control-label col-lg-2">Order No</label>
                                <div class="col-lg-7">
                                    <input name="order_no" type="text" class="form-control" id="order_no" placeholder="Order no" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="ServiceTitle" class="control-label col-lg-2">Service Title</label>
                                <div class="col-lg-7">
                                    <select name="service_title" id="service_title" class="form-control" required>
										<option value="">Select a Sarvice</option> 
                                        <option value="Cleaning"> Cleaning </option>
                                        <option value="Home Appliances"> Home Appliances </option>
                                        <option value="Pack & Shift"> Pack & Shift </option>
                                        <option value="Plumbing"> Plumbing </option>
                                        <option value="Electrical"> Electrical </option>
                                        <option value="Carpentry"> Carpentry </option>
                                        <option value="Property Management"> Property Management </option>
                                        <option value="Painting"> Painting </option>
                                        <option value="Interior Solution"> Interior Solution </option>
                                        <option value="Computer Servicing"> Computer Servicing </option>
                                        <option value="Pest-Control"> Pest-Control </option>
									</select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="Amount" class="control-label col-lg-2">Amount</label>
                                <div class="col-lg-7">
                                    <input name="amount" type="number" class="form-control" id="amount" placeholder="Order no" required>
                                </div>
                            </div>

                            <!-- End .form-group -->
                        <br/>
                            <div class="form-group">
                                <div for="submit" class="control-label col-lg-6">
                                    <button name="try_card" type="submit" class="btn btn-success"><b>Use The Card</b></button>
                                </div>
                            </div><!-- End .form-footer -->
                        </form>
					</div>
			</section>
        </div>
	</div>
</div>

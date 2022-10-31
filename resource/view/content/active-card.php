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
    $activeResult = $eloquent->selectData($columnName, $tableName);
    echo "<pre>";
   print_r($activeResult['card_no']);
   echo "</pre>";

# SAVE CUSTOMER #
if(isset($_POST['try_activation']))
{
    $columnName = "*";
    $tableName = "add_card";
    $whereValue["card_no"] = $_POST['card_no'];
    $cardResult = $eloquent->selectData($columnName, $tableName,$whereValue);
    $totalCard = count($cardResult);

    if($totalCard != 0)
    {
        if($activeResult['card_no'] != $_POST['card_no'])
        {
            $tableName = $columnValue = $whereValue = NULL;
	        $tableName = "card_activation";
	        $columnValue["card_no"] = $_POST['card_no'];
	        $columnValue["customer_name"] = $_POST['customer_name'];
	        $columnValue["mobile_no"] = $_POST['mobile_no'];
	        $columnValue["activation_date"] = date("Y-m-d H:i:s");
	        $columnValue["activated_by"] = $_SESSION['SMC_login_admin_name'];
	        $saveActivation = $eloquent->insertData($tableName, $columnValue);
        }
    }
    else
    {
        echo "<div class='alert alert-danger'><b>Card Number not valid! Please recheck Card Number.</b></div>";
    }
}


?>

<div class="wrapper">
    <div class="row">
		<div class="col-lg-12">
		
		<!--breadcrumbs start -->
        <ul class="breadcrumb panel">
            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Card Activation</li>
        </ul>
        <!--breadcrumbs end -->
		
            <section class="panel">
                <header class="panel-heading">
                    Card Activation Form
                </header>
                <div class="panel-body">
						<?php 
						if(isset($_POST['try_activation']))
						{
							if($saveActivation['NO_OF_ROW_INSERTED'])
							{
								echo '
									<div class="alert alert-success">
                                    Card Activated Successfully. 
									</div>
								';
							}
						}
						?>
                        
                        <form class="cmxform form-horizontal" method="post" action="" enctype="multipart/form-data">
							<div class="form-group">
                                <label for="CardNo" class="control-label col-lg-2">Card Number</label>
                                <div class="col-lg-7">
                                    <input name="card_no" type="text" class="form-control" id="card_no" placeholder="Enter the Card No" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="CustomerName" class="control-label col-lg-2">Customer Name</label>
                                <div class="col-lg-7">
                                    <input name="customer_name" type="text" class="form-control" id="customer_name" placeholder="Enter the Customer Name" required>
                                </div>
                            </div>
							<div class="form-group ">
                                <label for="MobileNo" class="control-label col-lg-2">Contact No</label>
                                <div class="col-lg-7">
                                    <input name="mobile_no" type="number" class="form-control" id="mobile_no" placeholder="018********" required>
                                </div>
                            </div>

                            <!-- End .form-group -->
                            <br/>

                            <div class="form-group">
                                <div for="submit" class="control-label col-lg-6">
                                    <button name="try_activation" type="submit" class="btn btn-success"><b>Activate The Card</b></button>
                                </div>
                            </div><!-- End .form-footer -->
                        </form>
					</div>
			</section>
        </div>
	</div>
</div>

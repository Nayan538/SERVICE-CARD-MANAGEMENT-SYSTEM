<?php
# CALLING CONTROLLER
include("app/Http/Controllers/Controller.php");
include("app/Http/Controllers/HomeController.php");

#### CALLING MODEL / QUERY BUILDER
include("app/Models/Eloquent.php");
# CALLING MODEL / QUERY BUILDER
$eloquent = new Eloquent;

#### LOAD SERVICES DATA
$columnName = "*";
$tableName = "services";
$serviceList = $eloquent->selectData($columnName, $tableName);



# SAVE CUSTOMER #
if(isset($_POST['try_card']))
{  
    $columnValue = $tableName =  $whereValue =  null;
    $columnName = "*";
    $tableName = "services";
    $whereValue["id"] = $_POST['service_title'];
    $serviceId = $eloquent->selectData($columnName, $tableName,$whereValue);

    $columnValue = $tableName =  $whereValue =  null;
    $columnName = "*";
    $tableName = "card_activation";
    $whereValue["card_no"] = $_POST['use_card_no'];
    $useCard = $eloquent->selectData($columnName, $tableName,$whereValue);
    
    $tableName = $columnValue = $whereValue =  null;
	$tableName = "card_activation";
	$columnValue["balance"] = ($useCard[0]['balance'] + 50 );
	$whereValue["card_no"] = $_POST['use_card_no'];
	$updateResult = $eloquent->updateData($tableName, $columnValue,$whereValue);

    $tableName = $columnValue = $whereValue =  null;
    $tableName = "use_a_card";
	$columnValue["use_card_no"] = $_POST['use_card_no'];
	$columnValue["card_user_name"] = $_POST['card_user_name'];
	$columnValue["card_user_mobile_no"] = $_POST['card_user_mobile_no'];
    $columnValue["order_no"] = $_POST['order_no'];
    $columnValue["service_title"] = $serviceId[0]['service_name'];
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
                                    <select name="service_title" id="service_title" class="form-control">
                                        <option value="" > Select a Service</option>
										<?php
											foreach($serviceList as $eachRow)
											{
												echo '<option value="'. $eachRow['id'] .'">'. $eachRow['service_name'] .'</option>' ;
											}
										?>
									</select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="Amount" class="control-label col-lg-2">Amount (Tk.)</label>
                                <div class="col-lg-7">
                                    <input name="amount" type="number" class="form-control" id="amount" required>
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

<!-- ---------- AJAX CODE TO LOAD SUBCATEGORY AGAINST CATEGORY ---------- -->
<script src="public/js/jquery-1.10.2.min.js"></script>
<script>
    $(document).ready(function(){
        $("#service_title").on("change", function() {
			
            var srv_id = $(this).val();
			
            if(srv_id != "")
			{
                $.ajax({
                    url : "ajax.php",
                    data : {
						ajax_create_service : "YES",
						service_id : srv_id
					},
                    type :'POST',
                    dataType : "JSON",
                    success:function(response) 
					{
                        console.log(response);
                        var resp = $.trim(response[0].price);
                        $("#amount").val(resp);

                        if(resp == "")
                            $("#amount").val('');
                    }
                });
            }
            else 
			{
                $("#amount").val('');
            }
        })
    });
</script>
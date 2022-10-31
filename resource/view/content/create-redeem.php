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
    $columnName = $tableName = $whereValue = NULL;
    $columnName = "*";
    $tableName = "card_activation";
    $whereValue["card_no"] = $_POST['search_card'];
    $queryResult = $eloquent->selectData($columnName, $tableName,$whereValue);

}
if(isset($_POST['try_redeem']))
{
    $tableName = $columnValue = $whereValue =  null;
    $tableName = "card_activation";
    $columnValue["balance"] = ($_POST['balance'] - $_POST['redeem_amount']);
    $whereValue["card_no"] = $_POST['use_card_no'];
    $updateResult = $eloquent->updateData($tableName, $columnValue,$whereValue);
}
### LOAD SERVICES DATA
    $columnName = "*";
    $tableName = "services";
    $serviceList = $eloquent->selectData($columnName, $tableName);


?>


	</head>
	<body>

	<div class="wrapper">
    <div class="row">
		<div class="col-lg-12">
        <!--breadcrumbs end -->
		
            <section class="panel">
                <header class="panel-heading">
					Redeem Amount
                </header>
                <div class="panel-body">  
                        <form class="cmxform form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="CardNo" class="control-label col-lg-2">Card Number</label>
                                <div class="col-lg-3">
                                    <input name="search_card" type="text" class="form-control" id="search_card" value="<?php if(isset($_GET['card_no'])){echo $_GET['card_no'];} ?>"> 
                                </div>
                                    <button name="try_search_card" type="submit" class="btn btn-success">Search</button>
                        </div>	
                        </form>
                        <form class="cmxform form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="CardNo" class="control-label col-lg-2">Card Number : </label>
                                <div class="col-lg-7"> 
                                    <input name="use_card_no" type="text" class="form-control" id="use_card_no" value="<?php echo $queryResult[0]['card_no']?>">
                                </div>
                            </div>
                            <div class="form-group">
								<label for="Balance" class="control-label col-lg-2">Balance</label>
                                <div class="col-lg-7">
                                    <input name="balance" type="text" class="form-control" id="balance" value="<?= $queryResult[0]['balance'] ?>">
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
                                <label for="Amount" class="control-label col-lg-2">Service Amount (Tk.)</label>
                                <div class="col-lg-7">
                                    <input name="amount" type="number" class="form-control" id="amount" required>
                                </div>
                            </div>
							<div class="form-group ">
                                <label for="Amount" class="control-label col-lg-2">Redeem Amount (Tk.)</label>
                                <div class="col-lg-7">
                                    <input name="redeem_amount" type="number" class="form-control" id="redeem_amount" required>
                                </div>
                            </div>

                            <!-- End .form-group -->
                        <br/>
                            <div class="form-group">
                                <div for="submit" class="control-label col-lg-6">
                                    <button name="try_redeem" type="submit" class="btn btn-success"><b>Confirm Redeem</b></button>
                                </div>
                            </div><!-- End .form-footer -->
                        </form>
					</div>
			</section>
        </div>
	</div>
</div>
</body>
</html>		
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
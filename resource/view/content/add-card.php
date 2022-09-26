<?php
#### CALLING CONTROLLER
include("app/Http/Controllers/Controller.php");

#### CALLING MODEL / QUERY BUILDER
include("app/Models/Eloquent.php");

$control = new Controller;
$eloquent = new Eloquent;

if(isset($_POST["submit_card"])){
    
    $filename=$_FILES["add_card"]["tmp_name"];   

     if($_FILES["add_card"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $tableName = "add_card";
	            $columnValue["card_no"] = $getData[0] ;
	            $saveActivation = $eloquent->insertData($tableName, $columnValue);
            }
            fclose($file);  
        }
     }  


?>
<div class="wrapper">
	<div class="row">
		<div class="col-lg-12">
			<ul class="breadcrumb panel">
            <li> <a href="dashboard.php"> <i class="fa fa-home"></i> Home </a> </li>
            <li> <a href="dashboard.php"> Dashboard </a> </li>
				<li class="active"> Add Card </li>
			</ul>
			<section class="panel">
				<header class="panel-heading">
					New Card Number Add
				</header>
				<div class="panel-body">
                    <?php 
						if(isset($_POST['submit_card']))
						{
							if($saveActivation['NO_OF_ROW_INSERTED'])
							{
								echo '
									<div class="alert alert-success">
										 Successfully Upload the Cards Number. 
									</div>
								';
							}
						}
					?>
                    <div class="form">
				        <form class="cmxform form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
							<label class="control-label col-md-2 "> Add Card </label>
							<div class="controls col-md-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<span class="btn btn-default btn-file">
										<input type="file" name="add_card" id="add_card" class="default" required />
									</span>
								</div>
							</div>
                        </div>
                        <div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button name="submit_card" class="btn btn-success" type="submit"> Upload </button>
							</div>
						</div>

                        </form>
				    </div>	
                </div>
			</section>
		</div>
	</div>
</div>
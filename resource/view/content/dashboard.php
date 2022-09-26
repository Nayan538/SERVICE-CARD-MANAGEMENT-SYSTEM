<?php
   # CALLING CONTROLLER
   include("app/Http/Controllers/Controller.php");
   include("app/Http/Controllers/AdminController.php");
   include("app/Http/Controllers/DashboardController.php");
   include("app/Http/Controllers/Queries.php");
   # CALLING MODEL / QUERY BUILDER
   include("app/Models/Eloquent.php");
   
   
   $dashboard = new DashboardController;
   $adminCtrl = new AdminController;
   $eloquent = new Eloquent;
   $queries= new Queries;
   
   /*echo "<pre>";
   print_r($todayleads);
   echo "</pre>";*/
   $columnName = "*";
   $tableName = "card_activation";
   $activeResult = $eloquent->selectData($columnName, $tableName);
   $totalActives = count($activeResult);

   $columnName = $tableName = null;
   $columnName["1"] = "id";
   $tableName = "use_a_card";
   $orderResult = $eloquent->selectData($columnName, $tableName);
   $totalOrder = count($orderResult);		

   
   
   ?>
<!--body wrapper start-->
<div class="wrapper" >
   <div class="row">
   <ul class="breadcrumb panel">
            <li> <a href="dashboard.php"> <i class="fa fa-home"></i> Home </a> </li>
            <li> <a href="dashboard.php"> Dashboard </a> </li>
			</ul>
      <div class="col-md-4"  style="text-align: center;" >
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">Total Active Cards</h4>
            </div>
            <div class="panel-body">
               <h4>
                   <?= $totalActives ?>
               </h4>
            </div>
         </div>
      </div>
      <div class="col-md-4"   style="text-align: center;">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">Total Customer</h4>
            </div>
            <div class="panel-body">
               <h4>

               </h4>
            </div>
         </div>
      </div>
      <div class="col-md-4"   style="text-align: center;">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">Total Orders</h4>
            </div>
            <div class="panel-body">
               <h4>
               <?= $totalOrder ?>
               </h4>
            </div>
         </div>
      </div>
      <div class="col-md-4"   style="text-align: center;">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">Total Referral Customer</h4>
            </div>
            <div class="panel-body">
               <h4>

               </h4>
            </div>
         </div>
      </div>
      <div class="col-md-4"   style="text-align: center; ">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">Total Referral Orders</h4>
            </div>
            <div class="panel-body">
               <h4>

               </h4>
            </div>
         </div>
      </div>
      <div class="col-md-4"  style="text-align: center;">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">Referral Due Amount</h4>
            </div>
            <div class="panel-body">
               <h4>

               </h4>
            </div>
         </div>
      </div>
      <div class="col-md-4"   style="text-align: center;">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">Total Paid Amounts</h4>
            </div>
            <div class="panel-body">
               <h4>

               </h4>
            </div>
         </div>
      </div>
      <div class="col-md-4"   style="text-align: center;">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">Pending Amount</h4>
            </div>
            <div class="panel-body">
               <h4>

               </h4>
            </div>
         </div>
      </div>
      <div class="col-md-4"   style="text-align: center;">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">Total User</h4>
            </div>
            <div class="panel-body">
               <h4>
                 
               </h4>
            </div>
         </div>
      </div>

   </div>
</div>
<!--body wrapper end-->
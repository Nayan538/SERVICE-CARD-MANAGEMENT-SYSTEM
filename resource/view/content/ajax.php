<?php
# CALLING CONTROLLER
include("app/Http/Controllers/Controller.php");

# CALLING MODEL / QUERY BUILDER
include("app/Models/Eloquent.php");

$eloquent = new Eloquent;

if($_POST['ajax_create_service'] == "YES")
{
    $columnName = "*";
    $tableName = "services";
    $whereValue['id'] = $_POST['service_id'];
    $price = $eloquent->selectData($columnName, $tableName, $whereValue);
    echo json_encode($price);
}
?>
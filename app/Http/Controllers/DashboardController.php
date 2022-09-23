<?php
class DashboardController extends Controller
{
 public function getData($tableName, $columnName, $value)
		{
			$sql = 'SELECT * FROM '. $tableName .' WHERE '. $columnName .' = "'. $value .'"';
			
			$query = $this->connection->prepare($sql);
			$query->execute();
			$getResult = $query->fetchAll(PDO::FETCH_ASSOC);
			
			return $getResult;
		}
}

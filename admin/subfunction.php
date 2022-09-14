<?php



include('db_admin.php');

 $query = "SELECT SUM(savings_balance) AS count FROM users";
 $result= $connection->query($query);

 $record = $result->fetch_array();
 $credit = $record['count'];
                       


$query = "SELECT SUM(checking_balance) AS count FROM users";
$result= $connection->query($query);

$record = $result->fetch_array();
$total1 = $record['count'];


$actual =  $credit + $total1;



?>



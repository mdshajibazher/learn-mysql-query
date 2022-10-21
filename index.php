<?php
$mysqli = new mysqli("localhost","root","","lwhh_mysql");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Coustomer count in every city
$customerCountInEveryCity = "SELECT CITY, COUNT(*) as CUSTOMER_COUNT FROM customer GROUP BY CITY";

// Coustomer count in every state
$customerCountInEveryState = "SELECT STATE, COUNT(*) as CUSTOMER_COUNT FROM customer GROUP BY STATE";


//Multiple group by city and state

$customerCountInEveryStateAndCity = "SELECT CITY,STATE, COUNT(*) as CUSTOMER_COUNT FROM customer GROUP BY CITY, STATE";

if ($result = $mysqli -> query($customerCountInEveryStateAndCity)) {
  echo "Returned rows are: " . print_r($result -> fetch_all(MYSQLI_ASSOC));
  // Free result set
  $result -> free_result();
}





$mysqli -> close();
?>
<?php
include "connection.php";
include "functions.php";
echo ($connection->connect_error) ? ("Connection failed: " . $connection->connect_error) : "Connected successfully to database!";
#$data = data_fetcher($connection, 2, 'teams');
#print_r($data);
//echo ("Esto es mi rol: " . $data['job_user']);

print_r(fetch_project_teams($connection, 2));

echo "<br>";
print_r(fetch_project_teams($connection, 2)[2]['company_team']);
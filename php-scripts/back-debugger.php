<?php
include "connection.php";
include "functions.php";
include "configs.php";
echo ($connection->connect_error) ? ("Connection failed: " . $connection->connect_error) : "Connected successfully to database!";
#$data = data_fetcher($connection, 2, 'teams');
#print_r($data);
//echo ("Esto es mi rol: " . $data['job_user']);

//echo get_requested_data_field("DATA_USER_NAME", 'DATA_', false);

print_r(extract_dom_fields($detail_teams_dom, "DATA_"));

<?php
include "connection.php";
include "functions.php";
include "configs.php";
echo ($connection->connect_error) ? ("Connection failed: " . $connection->connect_error) : "Connected successfully to database!";
#$data = data_fetcher($connection, 2, 'teams');
#print_r($data);
//echo ("Esto es mi rol: " . $data['job_user']);

//echo get_requested_data_field("DATA_USER_NAME", 'DATA_', false);

echo ("<br>");
#for ($i = 0; $i < sizeof(extract_dom_fields($detail_teams_dom, "DATA_")); $i++) {
#    echo extract_dom_fields($detail_teams_dom, "DATA_")[$i];
#    echo "<br>";
#}
//echo (sizeof(extract_dom_fields($detailed_team_dom, "DATA_")) . "<br>");
//print_r(extract_dom_fields($detailed_team_dom, "DATA_"));

//echo detail_build_teams(2);

//print_r(get_imgs_array(2));

print_r(fetch_project_teams($connection, 2));
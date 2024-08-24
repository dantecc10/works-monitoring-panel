<?php
include "connection.php";
echo ($connection->connect_error) ? ("Connection failed: " . $connection->connect_error) : "Connected successfully to database!";

function fetch_team_data($connection, $team_id)
{
    $query = "SELECT * FROM `teams` WHERE (`id_team` = $team_id)";
    $result = $connection->query($query);
    return $result->fetch_assoc();
}

print_r (fetch_team_data($connection, 1));

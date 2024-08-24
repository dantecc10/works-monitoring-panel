<?php
include "connection.php";
echo ($connection->connect_error) ? ("Connection failed: " . $connection->connect_error) : "Connected successfully to database!";

$query = "SELECT * FROM `teams` WHERE (`id_team` = $team_id)";
function fetch_team_data($connection, $team_id)
{
    $query = "SELECT `t`.*, 
    CASE 
        WHEN `t`.`work_area_team` = 1 THEN 'Eléctrico'
        WHEN `t`.`work_area_team` = 2 THEN 'Plomería'
        WHEN `t`.`work_area_team` = 3 THEN 'Civil'
        ELSE 'Área Desconocida' -- Opcional, para manejar otros valores
    END AS `team_area`
    FROM `teams` `t`;";
    $result = $connection->query($query);
    return $result->fetch_assoc();
}

print_r(fetch_team_data($connection, 1));
$data = (fetch_team_data($connection, 1));

echo ("Esto es en nombre del equipo: " . $data['company_team']);

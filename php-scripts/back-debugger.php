<?php
include "connection.php";
echo ($connection->connect_error) ? ("Connection failed: " . $connection->connect_error) : "Connected successfully to database!";

//$query = "SELECT * FROM `teams` WHERE (`id_team` = $team_id)";
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



function data_fetcher($connection, $element_id, $type)
{
    switch ($type) {
        case 'team':
            $query = "SELECT `t`.*, 
                CASE 
                    WHEN `t`.`work_area_team` = 1 THEN 'Eléctrico'
                    WHEN `t`.`work_area_team` = 2 THEN 'Plomería'
                    WHEN `t`.`work_area_team` = 3 THEN 'Civil'
                    ELSE 'Área Desconocida'
                END AS `team_area`
                FROM `teams` `t`
                WHERE `t`.`id_team` = ?";
            break;
        case 'value':
            $query = ""; // Lógica para 'value'
            break;
        case 'user':
            $query = "SELECT 
            `u`.`id_user`,
            `u`.`name_user`, 
            `u`.`last_names_user`, 
            `u`.`email_user`,
            `u`.`role_user`,
            `u`.`icon_user`, 
            CASE 
                WHEN `u`.`role_user` = 1 THEN 'Propietario'
                WHEN `u`.`role_user` = 2 THEN 'Equipo de Trabajo'
                WHEN `u`.`role_user` = 3 THEN 'Administrador'
                ELSE 'Rol Desconocido'
            END AS `job_user`
                FROM `users` `u` WHERE `u`.`id_user`= ?"; // Lógica para 'user'
            break;
        case 'task':
            $query = ""; // Lógica para 'task'
            break;
        default:
            return false;
    }

    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $element_id);
    $stmt->execute();
    $result = $stmt->get_result();

    return ($result->num_rows > 0) ? $result->fetch_assoc() : false;
}
$data = data_fetcher($connection, 1, 'user');
echo ("Esto es mi rol: " . $data['job_user']);

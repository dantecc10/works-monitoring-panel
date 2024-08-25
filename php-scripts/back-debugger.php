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
            $query = "SELECT 
                            `t`.*, 
                            CASE 
                                WHEN `t`.`work_area_team` = 1 THEN 'Eléctrico'
                                WHEN `t`.`work_area_team` = 2 THEN 'Plomería'
                                WHEN `t`.`work_area_team` = 3 THEN 'Civil'
                                ELSE 'Área Desconocida'
                            END AS `team_area`,
                            CONCAT(u.name_user, ' ', u.last_names_user) AS leader_team
                        FROM 
                            `teams` `t`
                        JOIN 
                            `users` `u` ON `t`.`id_user_team` = `u`.`id_user`
                        WHERE 
                            `t`.`id_team` = ?;";
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
            $query = "SELECT `t`.*, `p`.`name_project` AS `project_name`,
                            `tm`.`company_team` AS `team_name`
                        FROM `tasks` `t` JOIN 
                            `projects` `p` ON `t`.`id_project_task` = `p`.`id_project`
                        JOIN 
                            `teams` `tm` ON `t`.`id_team_task` = `tm`.`id_team`
                        WHERE 
                            `t`.`id_task` = ?;"; // Lógica para 'task'
            break;
        case "teams":
            $query = "SELECT DISTINCT `tm`.`id_team`
                        FROM `tasks` `t`
                        JOIN 
                            `teams` `tm` ON `t`.`id_team_task` = `tm`.`id_team`
                        WHERE `t`.`id_project_task` = 2 ORDER BY 
                            `tm`.`id_team` ASC;";

        default:
            return false;
    }

    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $element_id);
    $stmt->execute();
    $result = $stmt->get_result();

    return ($result->num_rows > 0) ? $result->fetch_assoc() : false;
}
$data = data_fetcher($connection, 2, 'teams');
print_r($data);
echo ("Esto es mi rol: " . $data['job_user']);

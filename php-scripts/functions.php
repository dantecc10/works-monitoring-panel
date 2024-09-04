<?php
function check_internet_connection()
{
    $conn = @fsockopen('obras.bmdesign.tech', 80);
    if ($conn) {
        fclose($conn);
        return true; // Conexión exitosa
    } else {
        return false; // Sin conexión
    }
    //echo (check_internet_connection()) ? "Hay conexión a Internet." : "No hay conexión a Internet.";
}
function show_projects($id)
{
    $projects_dom_output = "";
    include_once "connection.php";
    include_once "configs.php";
    $sql = "SELECT * FROM `projects` WHERE `owner_project` = ?";

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                $data = [$row['id_project'], $row['name_project'], $row['description_project'], $row['owner_project'], $row['icon_project'], ($i + 1)];
                $indexes = [5, 5, 5, 1, 5, 2, 5, 3, 5, 5, 5];
                $projects_dom_output .= flag_replacer($project_dom, "FLAG", $data, $indexes);
            }
            $stmt->close();

            $connection->close();

            return $projects_dom_output;
        } else {
            return "<p class='text-center fw-bold w-100'>No hay proyectos registrados a los que tenga acceso.</p>";
        }
    }
}

function flag_replacer($text, $flag, $data_array, $indexes_array)
{
    $chars = strlen($flag);
    $n = substr_count($text, $flag);
    if ($n == sizeof($indexes_array)) {
        // Las apariciones de la flag en la cadena son las mismas que la longitud del arreglo de índices
        for ($i = 0; $i < $n; $i++) {
            $position = strpos($text, $flag);
            $text = substr_replace($text, $data_array[$indexes_array[$i]], $position, $chars);
        }
        return $text;
    } else {
        return null;
    }
}

function data_fetcher($connection, $element_id, $type)
{
    $only_row = true;
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
            $query = "SELECT DISTINCT `tm`.`id_team` FROM `tasks` `t` JOIN 
                            `teams` `tm` ON `t`.`id_team_task` = `tm`.`id_team`
                        WHERE `t`.`id_project_task` = ? ORDER BY `tm`.`id_team` ASC;";
            $only_row = false;
            break;
        case "project-teams":
            $query = "SELECT DISTINCT `id_team_task` FROM `tasks` WHERE (`id_project_task` = ?);";
            $only_row = false;
            break;
        case "project-imgs":
            $query = "SELECT `graphical_evidence_task` FROM `tasks` WHERE (`id_project_task` = ?) ORDER BY (`date_task`) DESC;";
            $only_row = false;
            break;
        case "project-tasks":
            $query = "SELECT `t`.*, `teams`.`company_team`, `teams`.`icon_team`, `u`.`name_user`, `u`.`last_names_user` FROM `tasks` `t` JOIN `teams` ON `t`.`id_team_task` = `teams`.`id_team` JOIN `users` `u` ON `teams`.`id_user_team` = `u`.`id_user` WHERE (`id_project_task` = ?) ORDER BY (`date_task`) DESC;";
            $only_row = false;
            break;
        case "task-imgs":
            $query = "SELECT `graphical_evidence_task` FROM `tasks` WHERE `id_task` = ?;";
            $only_row = false;
            break;
        case "project":
            $query = "SELECT p.*, u.name_user, u.last_names_user, u.icon_user
                        FROM projects p JOIN users u
                        ON p.owner_project = u.id_user WHERE `id_project` = ?;";
            break;
        default:
            return false;
    }

    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $element_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$only_row) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    return ($result->num_rows > 0) ? $result->fetch_assoc() : false;
}

function fetch_project_teams($connection, $project_id)
{
    $teams_quantity = data_fetcher($connection, $project_id, "project-teams");
    if ($teams_quantity != false) {
        for ($i = 0; $i < sizeof($teams_quantity); $i++) {
            $team = data_fetcher($connection, $teams_quantity[$i]['id_team_task'], "team");
            $teams[$i] = $team;
        }
        return $teams;
    }
    return false;
}

function get_requested_data_field($param, $prefix, $capitalized = false)
{
    if (str_contains($param, $prefix)) {
        $field = str_replace($prefix, "", $param);
        return ($capitalized) ? $field : strtolower($field);
    }
    return false;
}

function extract_dom_fields($text, $general_prefix)
{
    $fields = [];
    if (!str_contains($text, $general_prefix)) {
        return false;
    }
    $pos = 0;
    $count = substr_count($text, $general_prefix);
    for ($i = 0; $i < $count; $i++) {
        $pos = stripos($text, $general_prefix, $pos);
        $field = "";
        for ($j = $pos; ($text[$j] != " " && $text[$j] != ">" && $text[$j] != '"'); $j++) {
            $field .= $text[$j];
            $pos = $j;
        }
        $fields[] = get_requested_data_field($field, $general_prefix, false);
    }
    return $fields;
}

function detail_build_teams($project)
{
    include "connection.php";
    include "configs.php";
    $teams_dom_output = "";
    $fields = extract_dom_fields($detailed_team_dom, "DATA_");
    $teams_data = fetch_project_teams($connection, $project);
    if ($teams_data != false) {
        for ($i = 0; $i < sizeof($teams_data); $i++) {
            $team = $teams_data[$i]; // Datos del equipo en cuestión
            $n = $i + 1; // Número de equipo desde el 1 para Bootstrap

            $fields_order = [10, 6, 10, 8, 4, 4, 5, 5, 6, 7, 2];

            $replacing_data = [
                $team['id_team'],
                $team['id_user_team'],
                $team['icon_team'],
                $team['work_area_team'],
                $team['phone_team'],
                $team['mobile_team'],
                $team['company_team'],
                $team['address_team'],
                $team['team_area'],
                $team['leader_team'],
                $n
            ];

            $team_dom = flag_replacer($detailed_flag_team_dom, "DATA", $replacing_data, $fields_order);

            $teams_dom_output .= $team_dom;
        }
        $teams_dom_output = str_replace("INSERT_TEAMS_DOM", $teams_dom_output, $detail_teams_dom);
        return $teams_dom_output;
    } else {
        return "<p class='text-center fw-bold w-100'>No hay equipos registrados.</p>";
    }
}

function get_imgs_array($project_id, $task)
{
    include "connection.php";
    $imgs_array = [];
    $imgs = (isset($task)) ? data_fetcher($connection, $task, "task-imgs") : data_fetcher($connection, $project_id, "project-imgs");
    if ($imgs != false) {
        for ($i = 0; $i < sizeof($imgs); $i++) {
            if (str_contains($imgs[$i]['graphical_evidence_task'], ",")) {
                $temp_array = explode(",", $imgs[$i]['graphical_evidence_task']);
                for ($j = 0; $j < sizeof($temp_array); $j++) {
                    $imgs_array[] = $temp_array[$j];
                }
            } else {
                $imgs_array[] = $imgs[$i]['graphical_evidence_task'];
            }
        }
    }

    return $imgs_array;
}

function detail_build_tasks($project)
{
    include "connection.php";
    include "configs.php";
    $tasks_dom_output = "";
    //$fields = extract_dom_fields($detailed_task_dom, "DATA_");
    $tasks_data = data_fetcher($connection, $project, "project-tasks");
    if ($tasks_data != false) {
        for ($i = 0; $i < sizeof($tasks_data); $i++) {
            $task = $tasks_data[$i]; // Datos de la tarea en cuestión
            $n = $i + 1; // Número de tarea desde el 1 para Bootstrap

            $fields_order = [1, 5, 10, 11, 13, 14, 12, 2, 7];

            $replacing_data = [
                $task['id_task'],
                $task['name_task'],
                $task['description_task'],
                $task['id_project_task'],
                $task['id_team_task'],
                $task['date_task'],
                $task['progress_task'],
                $task['comments_task'],
                $task['icon_task'],
                $task['graphical_evidence_task'],
                $task['company_team'],
                $task['team_area'],
                $task['icon_team'],
                $task['name_user'],
                $task['last_names_user']
            ];

            $task_dom = flag_replacer($detailed_flag_task_dom, "DATA", $replacing_data, $fields_order);

            $tasks_dom_output .= $task_dom;
        }
        $tasks_dom_output = str_replace("INSERT_TASKS_DOM", $tasks_dom_output, $detail_tasks_dom);
        return $tasks_dom_output;
    } else {
        return "<p class='text-center fw-bold w-100'>No hay tareas registradas.</p>";
    }
}

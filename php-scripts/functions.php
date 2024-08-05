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

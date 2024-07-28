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
function show_projects($id){
    include_once "connection.php";
    $sql = "SELECT * FROM `projects` WHERE `owner_project` = ?";

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        foreach ($result as $project) {
            echo str_replace("FLAG", $project['name_project'], $project_dom);
        }

        $stmt->close();

        $connection->close();
    }
}
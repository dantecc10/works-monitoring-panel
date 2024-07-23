<?php
function check_internet_connection()
{
    $conn = @fsockopen('obras.bmdesign.tech', 80);cd 
    if ($conn) {
        fclose($conn);
        return true; // Conexión exitosa
    } else {
        return false; // Sin conexión
    }
    //echo (check_internet_connection()) ? "Hay conexión a Internet." : "No hay conexión a Internet.";
}
function show_projects($id){
    include "connection.php";
}
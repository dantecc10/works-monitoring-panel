<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include 'functions.php';
include 'connection.php';

switch ($_GET['task']) {
    case 'update-user-data':
        $id = $_SESSION['id_user'];
        $name = $_POST['name'];
        $last_names = $_POST['last_names'];
        $email = $_POST['email'];

        $sql = "UPDATE `users` SET `name_user` = ?, `last_names_user` = ?, `email_user` = ? WHERE `id_user` = ?";
        if ($stmt = $connection->prepare($sql)) {
            $stmt->bind_param("sssi", $name, $last_names, $email, $id);
            if ($stmt->execute()) {
                $_SESSION['name_user'] = $name;
                $_SESSION['last_names_user'] = $last_names;
                $_SESSION['email_user'] = $email;
                $_SESSION['pending_msg']['type'] = 'success';
                $_SESSION['pending_msg']['text'] = 'Datos actualizados correctamente.';
                header('Location: ../profile.php?success=updated');
            } else {
                header('Location: ../profile.php?error=update');
                exit;
            }
            $stmt->close();
        }
        break;
    case 'update-user-img':
        $img_location = '../assets/img/avatars/uploaded/';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $fileName = basename($file['name']);
            $targetFilePath = $img_location . $fileName;

            // Verifica si el archivo es una imagen
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileType, $allowedTypes)) {
                // Intenta mover el archivo al directorio de destino
                if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                    echo "La imagen se ha cargado correctamente: " . $fileName;
                } else {
                    echo "Hubo un error al cargar la imagen.";
                }
            } else {
                echo "Solo se permiten archivos de tipo JPG, JPEG, PNG y GIF.";
            }
        } else {
            echo "No se ha recibido ninguna imagen.";
        }
        break;

    default:
        # code...
        break;
}

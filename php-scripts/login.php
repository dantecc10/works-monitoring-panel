<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include "connection.php";

    if ($connection->connect_error) {
        die("Conexión fallida: " . $connection->connect_error);
    }

    $sql = "SELECT `id_user`, `email_user`, `password_user` FROM `users` WHERE `email_user` = ?";
    if ($stmt = $connection->prepare($sql)) {
        $param_username = $email;
        $stmt->bind_param("s", $param_username);

        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id_user, $email_user, $hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['id_user'] = $id_user;
                        $_SESSION['email_user'] = $email_user;

                        header("location: welcome.php");
                    } else {
                        echo "La contraseña no es válida.";
                    }
                }
            } else {
                echo "No se encontró una cuenta con ese nombre de usuario.";
            }
        } else {
            echo "Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
        }

        $stmt->close();
    }

    $connection->close();
}

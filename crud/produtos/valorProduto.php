<?php

            include_once('../db_connection/db_connect.php');

            $query = $connection->prepare("SELECT valor_unidade FROM produtos WHERE id = :id");
            $query->execute([
                ':id' => $_GET['id'],
            ]);
            echo json_encode($query->fetch());


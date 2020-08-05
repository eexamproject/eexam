<?php
            $id = $_GET['id'];
            include('../classes/db.php');
            $sql = "DELETE FROM student WHERE `id` = '$id'";
            $result = $conn->query($sql);
            header('location:../showstudents.php');
?>
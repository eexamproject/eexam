<?php session_start(); ?>
<?php   
        include('../classes/db.php');

        $sql = "TRUNCATE TABLE student";
        $result = $conn->query($sql);
        header("location:../showstudents.php");
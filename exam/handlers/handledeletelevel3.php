<?php session_start(); ?>
<?php   
        include('../classes/db.php');

        $sql = "TRUNCATE TABLE level3";
        $result = $conn->query($sql);
        header("location:../level3exam.php");
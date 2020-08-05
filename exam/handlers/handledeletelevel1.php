<?php session_start(); ?>
<?php   
        include('../classes/db.php');

        $sql = "TRUNCATE TABLE level1";
        $result = $conn->query($sql);
        header("location:../level1exam.php");
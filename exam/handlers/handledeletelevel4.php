<?php session_start(); ?>
<?php   
        include('../classes/db.php');

        $sql = "TRUNCATE TABLE level4";
        $result = $conn->query($sql);
        header("location:../level4exam.php");
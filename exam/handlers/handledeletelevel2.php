<?php session_start(); ?>
<?php   
        include('../classes/db.php');

        $sql = "TRUNCATE TABLE level2";
        $result = $conn->query($sql);
        header("location:../level2exam.php");
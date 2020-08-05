<?php session_start(); ?>
<?php include("../classes/validation.php"); ?>
<?php 
    if(isset($_POST['submit']))
    {
        $adminemail = $_POST["email"];
        $adminpassword = $_POST["password"];

        $errors = [];

        $mail_valide = validation::validate_email($adminemail);
        if($mail_valide !== true)
        {
            array_push($errors,$mail_valide);
        }

        $password_valide = validation::validate_password($adminpassword);
        if($password_valide !== true)
        {
            array_push($errors,$password_valide);
        }

        if($errors != [])
        {
            $_SESSION["errors"] = $errors;
            header("location:../adminlogin.php");
        }else
        {
            include('../classes/db.php');

            $sql = "SELECT id,`name` FROM `admin`
            WHERE email = '$adminemail'
            and `password` = '$adminpassword'";
            $result = $conn->query($sql);
                            
            if ($result->num_rows == 1) {
            //credentials are right
            $row = $result->fetch_assoc();
            $_SESSION["adminid"] = $row["id"];
            $_SESSION["adminname"] = $row["name"];
            header('location:../dashboard.php');
            }else {
                $_SESSION["errors"] = ["error login"];
                header("location:../adminlogin.php");
           }
        }
    }else
    {
        header("location:../adminlogin.php");
    }
<?php session_start(); ?>
<?php include("../classes/validation.php"); ?>
<?php 
    if(isset($_POST['submit']))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $errors = [];

        $mail_valide = validation::validate_email($email);
        if($mail_valide !== true)
        {
            array_push($errors,$mail_valide);
        }

        $password_valide = validation::validate_password($password);
        if($password_valide !== true)
        {
            array_push($errors,$password_valide);
        }

        if($errors != [])
        {
            $_SESSION["errors"] = $errors;
            header("location:../index.php");
        }else
        {
            include('../classes/db.php');

            $sql = "SELECT id,`name` FROM student
            WHERE email = '$email'
            and `password` = '$password'";
            $result = $conn->query($sql);
                            
            if ($result->num_rows == 1) {
            //credentials are right
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            header('location:../home.php');
            }else {
                $_SESSION["errors"] = ["error login"];
                header("location:../index.php");
           }
        }
    }else
    {
        header("location:../index.php");
    }
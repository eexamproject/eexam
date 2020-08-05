<?php
session_start();
include("../classes/validation.php");

if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        $errors = [];

            $name_valide = validation::validate_exam($name);
            if($name_valide !== true)
            {
                array_push($errors,$name_valide);
            }
            $email_valide = validation::validate_email($email);
            if($email_valide !== true)
            {
                array_push($errors,$email_valide);
            }
            $password_valide = validation::validate_password($password);
            if($password_valide !== true)
            {
                array_push($errors,$password_valide);
            }

            if($errors != [])
            {
                $_SESSION["errors"] = $errors;
                header("location:../addstudent.php");
            }else
            {
                include('../classes/db.php');
                $sql = "INSERT INTO student (`name`,email,`password`) VALUES ('$name','$email','$password')";
                if ($conn->query($sql) === TRUE) {
                    header('location:../showstudents.php');
                }else {
                    $_SESSION["errors"] = ["ERROR IN SORTING"];
                    header('location:../addstudent.php');
                }
                $conn->close();
            }
    }else
    {
        header('location:../addstudent.php');
    }
?>
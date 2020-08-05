<?php
session_start();
include("../classes/validation.php");

if(isset($_POST['submit']))
    {
        $question = $_POST['question'];
        $correct = $_POST['correct'];
        $false1 = $_POST['false1'];
        $false2 = $_POST['false2'];
        $false3 = $_POST['false3'];
        

        $errors = [];

            $question_valide = validation::validate_exam($question);
            if($question_valide !== true)
            {
                array_push($errors,$question_valide);
            }
            $correct_valide = validation::validate_exam($correct);
            if($correct_valide !== true)
            {
                array_push($errors,$correct_valide);
            }
            $false1_valide = validation::validate_exam($false1);
            if($false1_valide !== true)
            {
                array_push($errors,$false1_valide);
            }
            $false2_valide = validation::validate_exam($false2);
            if($false2_valide !== true)
            {
                array_push($errors,$false2_valide);
            }
            $false3_valide = validation::validate_exam($false3);
            if($false3_valide !== true)
            {
                array_push($errors,$false3_valide);
            }

            if($errors != [])
            {
                $_SESSION["errors"] = $errors;
                header("location:../level4exam.php");
            }else
            {
                include('../classes/db.php');
                $sql = "INSERT INTO level4 (question,correct,false1,false2,false3) VALUES ('$question','$correct','$false1','$false2','$false3')";
                if ($conn->query($sql) === TRUE) {
                    header('location:../level4exam.php');
                }else {
                    $_SESSION["errors"] = ["ERROR IN SORTING"];
                    header('location:../level4exam.php');
                }
                $conn->close();
            }
    }else
    {
        header('location:../level4exam.php');
    }
?>
<?php include 'inc/header.php';?>

<div class="container my-5 text-center">
<h1 class="text-center">HELLo <?php echo $_SESSION["adminname"]; ?></h1>
    <a class="btn btn-outline-dark m-5" href="addstudent.php">Add Student</a>
    <a class="btn btn-outline-dark m-5" href="showstudents.php">Show Students</a>
    <hr style="border:1px solid gray"></hr>
    <div class="text-center">
        <a class="btn btn-outline-dark m-5" href="level1exam.php">LEVEL 1 EXAM</a>
        <a class="btn btn-outline-dark m-5" href="level2exam.php">LEVEL 2 EXAM</a>
        <a class="btn btn-outline-dark m-5" href="level3exam.php">LEVEL 3 EXAM</a>
        <a class="btn btn-outline-dark m-5" href="level4exam.php">LEVEL 4 EXAM</a>
    </div>
    <div class="home"></div>
    </div>
<?php include 'inc/footer.php';?>
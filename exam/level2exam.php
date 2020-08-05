<?php include 'inc/header.php';?>

<div class="container my-5">
    
    <?php if(isset($_SESSION["errors"])){?>
            <div class="alert alert-danger">
            <?php $_SESSION["errors"] = $errors; ?>
                    <p class="text-center"> <?php echo $errors[0] ?></p>
            </div>
        <?php } ?>

        <?php unset($_SESSION["errors"]) ?>
        <h1 class="text-center mb-5">LEVEL 2 EXAM</h1>
        <?php 
            include('classes/db.php');
            $sql = "SELECT COUNT(id) AS questions FROM level2";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                ?> <h3 style="text-align:center;color:#08526d;"> <?php echo $row['questions'].' QUESTIONS';?></h3>
            <?php } ?>
        <div class="text-center">
            <a class="btn btn-outline-dark m-5" href="dashboard.php">DASHBOARD</a>
            <a class="btn btn-danger m-5" href="handlers/handledeletelevel2.php">DELETE EXAM 2</a>
        </div>
        <div class="row">

        <form class="text-center m-auto" action="handlers/handleexam2.php" method="post">
            <div class="form-group">
                <label>QUESTION </label>
                <input style="padding:50px;" type="text" class="form-control" name="question">
            </div>
            <div class="form-group">
                <label>CORRECT ANSWER </label>
                <input type="text" class="form-control" name="correct">
            </div>
            <div class="form-group">
                <label>FALSE ANSWER 1 </label>
                <input type="text" class="form-control" name="false1">
            </div>
            <div class="form-group">
                <label>FALSE ANSWER 2  </label>
                <input type="text" class="form-control" name="false2">
            </div>
            <div class="form-group">
                <label>FALSE ANSWER 3 </label>
                <input type="text" class="form-control" name="false3">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Question</button>
        </form>
        </div>
    </div>

<?php include 'inc/footer.php';?>
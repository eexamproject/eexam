<?php include 'inc/header.php';?>

<div class="container my-5">
    
    <?php if(isset($_SESSION["errors"])){?>
            <div class="alert alert-danger">
                <?php foreach($_SESSION["errors"] as $error) {?>
                    <p class="text-center"> <?php echo $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        <?php unset($_SESSION["errors"]) ?>
        
        <h1 class="text-center mb-5">LEVEL 1 EXAM</h1>
        <div class="text-center">
            <a class="btn btn-outline-dark m-5" href="dashboard.php">DASHBOARD</a>
        </div>
        <div class="row">

        <form class="text-center m-auto" action="handlers/handleaddstudent.php" method="post">
            <div class="form-group">
                <label>Name </label>
                <input style="padding:50px;" type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Email </label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Password </label>
                <input type="text" class="form-control" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Student</button>
        </form>
        </div>
    </div>

<?php include 'inc/footer.php';?>
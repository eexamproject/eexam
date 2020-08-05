<?php include 'inc/header.php';?>
<?php if(isset($_SESSION["errors"])) {?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-danger w-50">
            <?php foreach($_SESSION["errors"] as $error) {?>
            <p>
                <?php 
                    echo $error."</br>";
                ?>
            </p>
            <?php }?>
        </div>
    </div>
<?php } ?>
<?php unset($_SESSION["errors"]);?>

<section class="login">
<div id="form" class="container my-5 text-center ">

    <form class="contact-form" action="handlers/handlestudent.php" method="post">
        <h1 class="text-center">LOG IN</h1>
        <span>
            <input  type="email" placeholder="EMAIL" name="email" class="form-control"/>
        </span>
    
        <span>
            <input  type="password" placeholder="PASSWORD" name="password" class="mt-3 form-control"/>
        </span>
    
        <button class="btn btn-outline-dark mt-3" type="submit" name="submit" >LOGIN</button>
        <button class="btn btn-outline-dark mt-3" type="reset" >CLEAR</button>
    </form>
    <div class="home"></div>
    </div>
</div>
</section>
<?php include 'inc/footer.php';?>

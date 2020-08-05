<?php include 'inc/header.php';?>
<div class="container">
<a class="btn btn-outline-dark m-5" href="home.php">HOME</a>
<h1 class="text-center">HELLo <?php echo $_SESSION["name"]; ?></h1>
<h1 class="text-center">YOUR DEGREE OF THE EXAM =  <?php echo $_SESSION["degree"]; ?></h1>
<div class="result"></div>
</div>
<?php include 'inc/footer.php';?>
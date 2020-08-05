<?php include 'inc/header.php';?>
<?php 
include('classes/db.php');
 
    $sql = "SELECT id,question,correct,false1,false2,false3 FROM level1";
    $result = $conn->query($sql);
    $informations = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($informations,
            [
                'id' => $row['id'],
                'question' => $row['question'],
                'correct' => $row['correct'],
                'false1' => $row['false1'],
                'false2' => $row['false2'],
                'false3' => $row['false3']
            ]
            );
        }
       // var_dump($messages); //array of group of associative arrays
    }
?>
<div style="position:fixed; text-align:center; background-color:black; width:100%; color:#eee;" id="show"></div>
<div class="container">
    <a class="btn btn-outline-dark mt-5" href="home.php">HOME</a>
    <?php if($informations !== []) {?>
    <button id="start" class="btn btn-outline-dark mt-5">STRART THE EXAM</button>
    <?php
$degree = 0;
?>
<form style="visibility:hidden"  id="result" method="post" class="mt-5">
    <?php foreach($informations as $information) {?>
        <h2 class="mb-0"><?php echo $information['id'].'-'.$information['question'] ?></h2></br>
        <input class="mr-2" type="radio" name="<?php echo $information['id']?>" value=1><label class="mr-5"><?php echo $information['correct'] ?></label></br>
        <input class="mr-2" type="radio" name="<?php echo $information['id']?>" value=0><label class="mr-5"><?php echo $information['false1'] ?></label></br>
        <input class="mr-2" type="radio" name="<?php echo $information['id']?>" value=0><label class="mr-5"><?php echo $information['false2'] ?></label></br>
        <input class="mr-2" type="radio" name="<?php echo $information['id']?>" value=0><label class="mr-5"><?php echo $information['false3'] ?></label></br>
    <hr style="border:1px solid gray"></hr>
    <?php
    if(isset($_POST['submit']))
    {
        $degree += $_POST[$information['id']];
        $id = $_SESSION["id"];
        $sql = "UPDATE student SET result = '$degree' WHERE id = '$id'";
        $result = $conn->query($sql);
        header("location:resultlevel.php");
    }
     } ?>
    <div class="text-center pb-5">
    </br><button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
    </div>
</form>
<?php } else {?>
            <h1 class="mt-5 text-center">NO QUESTIONS</h1>
            <div class="mb-5 home"></div>
        <?php } ?>
<?php
    $_SESSION['degree'] = $degree;
?>
</div>
<script>
    function arrowperson()
    {
        age = 60;
        setInterval(_ =>
                {
            age--;
            document.getElementById("show").innerHTML = age;
            if(age == 0)
        {
            var but = document.getElementById("result");
            but.click();
        }
        },1000);
    }
    var startbut = document.getElementById("start");
    startbut.onclick = function()
    {
        var but = document.getElementById("result");
        but.style.visibility = "visible";
        arrowperson();
    }

</script>
<?php include 'inc/footer.php';?>
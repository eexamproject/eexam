<?php include 'inc/header.php';?>
<?php
    include('classes/db.php');
 
    $sql = "SELECT id,`name`,email,`password`,result FROM student";
    $result = $conn->query($sql);
    $informations = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($informations,
            [
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => $row['password'],
                'result' => $row['result']
            ]
            );
        }
       // var_dump($messages); //array of group of associative arrays
    }
    $conn->close();
?>
    <section class=" text-center container my-5 py-5">
    <table border="1px" class="m-auto text-center">
        <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>EMAIL</td>
                <td>PASSWORD</td>
                <td>RESULT</td>
                <td>DELETE STUDENT</td>
        </tr>
        <?php $x = 0; ?>
        <?php foreach($informations as $information) {?>
            <?php ++$x ?>
            <tr>
                <td><?php echo $information['id'] ?></td>
                <td><?php echo $information['name'] ?></td>
                <td><?php echo $information['email'] ?></td>
                <td><?php echo $information['password'] ?></td>
                <td><?php echo $information['result'] ?></td>
                <td><a class="btn btn-danger" href="handlers/handledeletestudent.php?id=<?php echo $information['id']?>">Delete</a></td>
            </tr>
        <?php } ?>
        <h3 style="color:#08526d;"><?php echo $x.' STUDENTS'?></h3>
        <a class="btn btn-outline-dark m-5" href="dashboard.php">DASHBOARD</a>
        <a class="btn btn-danger m-5" href="handlers/handledeleteall.php">Delete All Students</a>
    </table>
    <div class="home"></div>
</section>
<?php include("inc/footer.php") ?>
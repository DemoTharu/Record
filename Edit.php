<?php
    require "Data.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM record WHERE SN = '$id'";
    $result = $con->query($sql);
    if ($result->num_rows>0) {
        $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    else {
        echo "<script>alert('You have Error in feteching data!!!');</script>";
    }


    if (isset($_POST['submit'])) {
        $date = $_POST["date"];
        $name = $_POST["name"];
        $particular = $_POST["particular"];
        $qty = $_POST["qty"];
        $rate = $_POST["rate"];

        $querys = "UPDATE record SET Date='$date',Name='$name',Particular='$particular',Qty='$qty',Rate='$rate' WHERE SN='$id'";

        if (mysqli_query($con,$querys)) {
            echo "<script>alert('Data Updated successfully !!!!');</script>";
            ?>
            <meta http-equiv="refresh" content="0; url='Database.php'">
            <?php
        }
        else{
            echo "<script>alert('You have an Error in Updating !!!!');</script>";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="100">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link rel="stylesheet" href="Edit.css">
    <link rel="icon" type="image/png" href="Img/Logo 4.png"/>
    <script src="https://kit.fontawesome.com/dc0fcbd0b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="nav">
                <div class="logo">
                    <a href="Home.php"><img src="Img/Logo 3.png" alt="Logo"></a>
                </div>
                <div class="link">
                    <a href="Home.php"><i class="fa-solid fa-house"></i> Home</a>
                    <a href="Record.php"><i class="fa-solid fa-record-vinyl"></i> Record</a>
                    <a href="Database.php"><i class="fa-solid fa-database"></i> Database</a>
                </div>
            </div>
    <div class="center">
        <div class="main">
            <form action="" method="post">
                <h2 style="text-align:center;">Edit Record System</h2>
                <?php
                     foreach ($res as $ress)
                     {
                 ?>
                <label for="date">Date</label>
                <input type="date" name="date" required value="<?php echo $ress['Date']; ?>">
                <label for="">Name</label>
                <input type="text" name="name" required value="<?php echo $ress['Name']; ?>">
                <label for="">Particular</label>
                <input type="text" name="particular" required value="<?php echo $ress['Particular']; ?>">
                <label for="qty">Quantity</label>
                <input type="number" name="qty" required value="<?php echo $ress['Qty']; ?>">
                <label for="rate">Rate</label>
                <input type="number" name="rate" required value="<?php echo $ress['Rate']; ?>">
                <input type="submit" name="submit" value="Update">
                <?php
                     }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
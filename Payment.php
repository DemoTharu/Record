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
        $discount = $_POST["discount"];

        $querys = "UPDATE record SET Discount='$discount',Status='Paid' WHERE SN='$id'";

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
    <link rel="stylesheet" href="Payment.css">
    <link rel="icon" type="image/png" href="Img/Logo 4.png"/>
    <script src="https://kit.fontawesome.com/dc0fcbd0b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="center">
        <div class="main">
            <form action="" method="post">
                <h2>Paymemt Manage System</h2>
                <?php
                     foreach ($res as $ress)
                     {
                 ?>
                <label for="date"><strong>Date</strong></label>
                <p><?php echo $ress['Date']; ?></p>
                <label for=""><strong>Name</strong></label>
                <p><?php echo $ress['Name']; ?></p>
                <label for=""><strong>Particular</strong></label>
                <p><?php echo $ress['Particular']; ?></p>
                <label for="qty"><strong>Quantity</strong></label>
                <p><?php echo $ress['Qty']; ?></p>
                <label for="rate"><strong>Rate</strong></label>
                <p><?php echo $ress['Rate']; ?></p>
                <label for=""><strong>Discount</strong></label>
                <input type="number" name="discount" id="discount">
                <input type="submit" name="submit" value="Confirm Payment">
                <?php
                     }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
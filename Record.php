<?php
    require "Data.php";
        if (isset($_POST['submit'])) {
            $date = $_POST['date'];
            $name = $_POST['name'];
            $particular = $_POST['particular'];
            $qty = $_POST['qty'];
            $rate = $_POST['rate'];
            $status = $_POST['status'];
            $sql = "INSERT INTO `record` VALUES (NULL, '$date', '$name','$particular', '$qty', '$rate', '$status','0');";

            if ($con->query($sql) === TRUE) {
                echo "<script>alert('New Data Inserted !!!!')</script>";
              } else {
                echo "<script>alert('Inserted Data Failed !!!!')</script>";
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
    <link rel="stylesheet" href="Record.css">
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
                    <a href="Record.php" class="active"><i class="fa-solid fa-record-vinyl"></i> Record</a>
                    <a href="Database.php"><i class="fa-solid fa-database"></i> Database</a>
                </div>
            </div>
    <div class="center">
        <div class="main">
            <form action="" method="post">
                <h2>Record System</h2>
                <label for="date">Date</label>
                <input type="date" name="date" required>
                <label for="">Name</label>
                <input type="text" name="name" required>
                <label for="">Particular</label>
                <input type="text" name="particular" required>
                <label for="qty">Quantity</label>
                <input type="number" name="qty" required>
                <label for="rate">Rate</label>
                <input type="number" name="rate" required>
                <label for="">Status</label>
                <select name="status" id="status">
                    <option value="Paid">Paid</option>
                    <option value="Pending">Pending</option>
                </select>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
<?php
    require "Data.php";
    $sql = "SELECT * FROM record";
    $result = $con->query($sql);
    if ($result->num_rows>0) {
        $res = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    else {
        echo "<script>alert('Data Cannot Fetched !!!!');</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="Database.css">
    <link rel="icon" type="image/png" href="Img/Logo 4.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
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
                    <a href="Database.php" class="active"><i class="fa-solid fa-database"></i> Database</a>
                </div>
            </div>
    <div class="table">
            <table border="1">
                <thead>
                    <tr>
                        <td style="width:1%;" class="a"><strong>S.N.</strong></td>
                        <td style="width: 10%;" class="a"><strong>Date</strong></td>
                        <td style="width: 30%" class="a"><strong>Name</strong></td>
                        <td style="width: 30%;" class="a"><strong>Particular</strong></td>
                        <td style="width: 4%;" class="a"><strong>Qty</strong></td>
                        <td style="width: 4%;" class="a"><strong>Rate</strong></td>
                        <td style="width: 6%;" class="a"><strong>Total</strong></td>
                        <td style="width: 6%;" class="a"><strong>Status</strong></td>
                        <td colspan="3" style="width: 9%;text-align:center;" class="a"><strong>Action</strong></td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($res as $ress)
                        {
                ?>
                    <tr>
                        <td><?php echo $ress['SN']; ?></td>
                        <td><?php echo $ress['Date']; ?></td>
                        <td><?php echo $ress['Name']; ?></td>
                        <td><?php echo $ress['Particular']; ?></td>
                        <td><?php echo $ress['Qty']; ?></td>
                        <td><?php echo $ress['Rate']; ?></td>
                        <td><?php echo $ress['Qty']*$ress['Rate']; ?></td>
                        <?php    
                        if ($ress['Status'] == "Pending") {
                            ?>
                                <td class="tbl"><a href="Payment.php?id=<?php echo $ress['SN']; ?>">Pending</a></td>
                                <?php
                            }
                            else{
                                ?>
                                <td class="tbla"><i class="fa-sharp fa-regular fa-square-check"></i> Paid</td>
                                <?php
                            }
                            ?>
                        <td class="edit"><a href="Edit.php?id=<?php echo $ress['SN']; ?>"><i class="fa-solid fa-pen-to-square" title="Edit"></i></a></td>
                        <td class="delete"><a href="Delete.php"><i class="fa-solid fa-trash" title="Delete"></i></a></td>
                        <?php
                            if ($ress['Status'] == "Pending") {
                                ?>
                                    <td class="print"><a href="Print.php"><i class="fa-regular fa-print-slash"></i></a></td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td class="print"><a href="Print.php?id=<?php echo $ress['SN']; ?>"><i class="fa-solid fa-print" title="Print"></i></a></td>
                                    <?php
                                }
                                ?>
                    </tr>
                    <?php
                                }
                        ?>
                </tbody>
            </table>
    </div>
</body>
</html>
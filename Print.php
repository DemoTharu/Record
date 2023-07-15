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

function convertNumber($num = false)
    {
    $num = str_replace(array(',', ''), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : '' ) . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' and ' . $list1[$tens] . ' ' : '' );
        } elseif ($tens >= 20) {
            $tens = (int)($tens / 10);
            $tens = ' and ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    $words = implode(' ',  $words);
    $words = preg_replace('/^\s\b(and)/', '', $words );
    $words = trim($words);
    $words = ucfirst($words);
    $words = $words;
    return $words;
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
    <link rel="stylesheet" href="Print.css">
    <link rel="icon" type="image/png" href="Img/Logo 4.png"/>
    <script src="https://kit.fontawesome.com/dc0fcbd0b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="center">
        <div class="main">
        <button onclick="window.print()"><i class="fa-sharp fa-solid fa-print"></i> Print</button>
            <form action="" method="post">
                <div class="head">
                    <div class="logo">
                        <img src="Img/Logo 6.png" alt="Logo">
                    </div>
                    <p>Tilottama-15, Kotihawa</p>
                    <p>Email:demotharu@gmail.com</p>
                </div>
                <?php
                     foreach ($res as $ress)
                     {
                 ?>
                <div class="second">
                    <label for="Bill No">Bill No : <?php echo $ress['SN']; ?></label>
                    <label for="Date">Date : <?php echo $ress['Date']; ?></label>
                </div>
                <div class="3rd">
                    <label for="Name">Name : <?php echo $ress['Name']; ?></label>
                </div>
                <div class="tbl">
                    <table>
                        <thead>
                            <tr>
                                <td>S.N.</td>
                                <td style="width: 40%;">Particular</td>
                                <td>Qty</td>
                                <td>Rate</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="high">1</td>
                                <td class="high" rowspan="2"><?php echo $ress['Particular']; ?></td>
                                <td class="high"><?php echo $ress['Qty']; ?></td>
                                <td class="high"><?php echo $ress['Rate']; ?></td>
                                <td class="high"><?php echo $ress['Qty']*$ress['Rate']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Total</td>
                                <td><?php echo $ress['Qty']*$ress['Rate']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Discount</td>
                                <td><?php echo $ress['Discount']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Grand Total</td>
                                <td><?php echo $ress['Qty']*$ress['Rate']-$ress['Discount']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="num">
                    <label for="Num">In Words : <?php echo convertNumber($ress['Qty']*$ress['Rate']-$ress['Discount'])?> rupees only.</label>
                </div>
                <?php
                     }
                ?>
                <div class="autho">
                    <div class="slogan">
                        <label for="slogan"><i>Once product is sold then no return.</i></label>
                    </div>
                    <div class="sign">
                        <label for="...">................................</label>
                        <label for="auth">Authorized Sign</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
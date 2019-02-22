<!DOCTYPE HTML>  
<html>
<head>
  <title>Pre-Order TOTORO GOODS</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$name = $email = $delivery = $myFile = "";
$nameErr = $emailErr = $deliveryErr = $fileErr = "";
$ttr_1 = $ttr_2 = $ttr_3 = $ttr_4 = $ttr_5 = "";
$ttr1Err = $ttr2Err = $ttr3Err = $ttr4Err = $ttr5Err = "";
$pass = "";
$goodsCost = $delCost = $total = 0;

include "submitData.php";
include "upload.php";

?>
<section style="text-align: center;">
<h2>Pre-Order<br>Totoro Crafts</h2>
</section>
<section style="text-align: center;">
<p> <br> Fill the Form by Yourself OR Dowload
  <a href="download/CSVform.csv" download>
     <i class="fa fa-download"></i> CSVform
  </a> and Upload Back After Fill It</p>
  </section>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<section style="text-align: center;">
  Upload CSVform : 
  <input id="chooseFile" type="file" accept=".csv" name="myFile" id="myFile" value="<?php echo $myFile;?>">
  <input id="button" type="submit" name="submitFile" value="Upload File">
  <br><span style="font-size: 25px;"class="error"> <?php echo $fileErr;?></span><br>
</section>

<section style="margin: 300px; margin-top: 10px; margin-bottom: 30px;">
  <span class="error">* required field</span>
  <br>
  Name : <input class="inputText" type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>        
  E-mail : <input class="inputText" type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br> 
</section>
<section class="section">
  
  <img class="pic" src="goods/GOODS-1.jpg" alt="TTR-1">
  <img class="pic" src="goods/GOODS-2.jpg" alt="TTR-2">
  <br>
  TTR-1 ( 420 Baht/piece ) :
  <input style="margin-right: 70px;" class="inputNum" type="text" name="ttr_1" value="<?php echo $ttr_1;?>"> 
  TTR-2 ( 340 Baht/piece ) : <input class="inputNum" type="text" name="ttr_2" value="<?php echo $ttr_2;?>">
  <br>
  <span class="error"> <?php echo $ttr1Err;?></span>
  <span class="error"> <?php echo $ttr2Err;?></span>
  <br>
  
 
</section>
<section class="section">
 
  
  <img class="pic" src="goods/GOODS-3.jpg" alt="TTR-3">
  <img class="pic" src="goods/GOODS-4.jpg" alt="TTR-4">
  <br>
  TTR-3 ( 635 Baht/piece ) :
  <input style="margin-right: 70px;" class="inputNum" type="text" name="ttr_3" value="<?php echo $ttr_3;?>">
  TTR-4 ( 600 Baht/piece ) : 
  <input class="inputNum" type="text" name="ttr_4" value="<?php echo $ttr_4;?>">
  <br>
  <span class="error"><?php echo $ttr3Err;?></span>
  <span class="error"><?php echo $ttr4Err;?></span>
  <br>

</section>
<section class="section">
  <img src="goods/GOODS-5.jpg" alt="TTR-5">
  <br>
  TTR-5 ( 5050 Baht/piece ) : <input class="inputNum" type="text" name="ttr_5" value="<?php echo $ttr_5;?>">
  <br>
  <span class="error"><?php echo $ttr5Err;?></span>
  <br>
 
</section>
<section class="section">

  Delivery :

  <input class="radio" type="radio" name="delivery" <?php if (isset($delivery) && $delivery=="regis") echo "checked";?> value="regis">Registered
  <input class="radio" type="radio" name="delivery" <?php if (isset($delivery) && $delivery=="ems") echo "checked";?> value="ems">Express Mail Service 
  <span class="error">*</span>
  <br>
  <span class="error"><?php echo $deliveryErr;?></span>
  <br><br>
  <input style="font-size: 50px;" id="button" type="submit" name="submitData" value="Submit Order">
  <br><br>
  <span style="font-weight: bold; font-size: 40px"><?php echo $pass;?></span>


</form>  

</section>
<section class="order">
<span>
  <?php 
  if ($pass != ""){
    echo "<script type='text/javascript'>alert('Check Your Orders Below');</script>";

    echo "Name&nbsp&nbsp:&nbsp&nbsp";
    echo $name;
    echo "<br>";

    echo "E-mail&nbsp:&nbsp&nbsp";
    echo $email;
    echo "<br>";
    echo "<br>";

    echo "TTR - 1&nbsp&nbsp:&nbsp&nbsp";
    echo $ttr_1;
    echo "<br>";

    echo "TTR - 2&nbsp&nbsp:&nbsp&nbsp";
    echo $ttr_2;
    echo "<br>";

    echo "TTR - 3&nbsp&nbsp:&nbsp&nbsp";
    echo $ttr_3;
    echo "<br>";

    echo "TTR - 4&nbsp&nbsp:&nbsp&nbsp";
    echo $ttr_4;
    echo "<br>";

    echo "TTR - 5&nbsp&nbsp:&nbsp&nbsp";
    echo $ttr_5;
    echo "<br>";
    echo "<br>";

    echo "Goods Cost&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp";
    echo $goodsCost;
    echo " Baht";
    echo "<br>";

    echo "Delivery Cost&nbsp:&nbsp&nbsp";
    echo $delCost;
    echo " Baht";
    echo "<br>";
    echo "<br>";

    echo "Total Cost&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp";
    echo $total;
    echo " Baht";
    echo "<br>";
  }
  



  ?>

</span>

</section>

    


<?php
// echo "<h2>Your Input:</h2>";
// echo $name;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $ttr_1;
// echo "<br>";
// echo $ttr_2;
// echo "<br>";
// echo $ttr_3;
// echo "<br>";
// echo $ttr_4;
// echo "<br>";
// echo $ttr_5;
// echo "<br>";
// echo $delivery;

?> 

</body>
</html>

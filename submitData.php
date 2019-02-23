<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $check = 0;
  $totalGoods = 0;

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
    else{
        $check++;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
    else{
        $check++;
    }
  }
  
  ///////// ORDER ////////

  if (empty($_POST["ttr_1"])) {
    // $ttr1Err = "Order is required, at lease 0";
    $ttr_1 = "0";
    $check++;
  } else {
    $ttr_1 = test_input($_POST["ttr_1"]);
    // check if order only number
    if (!preg_match("/^[0-9]*$/",$ttr_1)) {
      $ttr1Err = "Only numbers at least 0 allowed"; 
    }
    else{
        $check++;
        $totalGoods += $ttr_1;
    }
  }
  if (empty($_POST["ttr_2"])) {
    $ttr_2 = "0";
    $check++;
  } else {
    $ttr_2 = test_input($_POST["ttr_2"]);
    // check if order only number
    if (!preg_match("/^[0-9]*$/",$ttr_2)) {
      $ttr1Err = "Only numbers at least 0 allowed"; 
    }
    else{
        $check++;
        $totalGoods += $ttr_2;
    }
  }
  if (empty($_POST["ttr_3"])) {
    $ttr_3 = "0";
    $check++;
  } else {
    $ttr_3 = test_input($_POST["ttr_3"]);
    // check if order only number
    if (!preg_match("/^[0-9]*$/",$ttr_3)) {
      $ttr3Err = "Only numbers at least 0 allowed"; 
    }
    else{
        $check++;
        $totalGoods += $ttr_3;
    }
  }
  if (empty($_POST["ttr_4"])) {
    $ttr_4 = "0";
    $check++;
  } else {
    $ttr_4 = test_input($_POST["ttr_4"]);
    // check if order only number
    if (!preg_match("/^[0-9]*$/",$ttr_4)) {
      $ttr3Err = "Only numbers at least 0 allowed"; 
    }
    else{
        $check++;
        $totalGoods += $ttr_4;
    }
  }
  if (empty($_POST["ttr_5"])) {
    $ttr_5 = "0";
    $check++;
  } else {
    $ttr_5 = test_input($_POST["ttr_5"]);
    // check if order only number
    if (!preg_match("/^[0-9]*$/",$ttr_5)) {
      $ttr5Err = "Only numbers at least 0 allowed"; 
    }
    else{
        $check++;
        $totalGoods += $ttr_5;
    }
  }



  if (empty($_POST["delivery"])) {
    $deliveryErr = "Delivery is required";
  } else {
    $delivery = ($_POST["delivery"]);
    $check++;
  }


  if ( isset($_POST["submitData"]) ){
    $delCost = 0;
    $goodsCost = 0;
    $total = 0;
    // echo "sub data";
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
    // echo "<br>";
    // echo $check;
    if ($check == 8 && $totalGoods>0) {
      $goodsCost = ($ttr_1*420)+($ttr_2*340)+($ttr_3*635)+($ttr_4*600)+($ttr_5*5050);
      // echo "Goods Price : ";
      
      // echo "<br>";

      if ($delivery == "regis") {
        $delCost += 30;
      }
      else{
        $delCost += 50;
      }
      $delCost += ((($ttr_1+$ttr_2+$ttr_3+$ttr_4)/2)%10*10)+($ttr_5/2%10*20);
      // echo "Delivery : ";
      
      // echo "<br>";

      $total = $goodsCost + $delCost;
      // echo "Total : ";
      
      $pass = "- - - - - YOUR ORDER - - - - -"; 
      

    }
    else if ($check == 8 && $totalGoods == 0){
      echo "<script type='text/javascript'>alert('You Need To Order At Least 1 piece');</script>";
    }
    
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

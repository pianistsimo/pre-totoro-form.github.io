<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $deliveryErr = $fileErr = "";
$name = $email = $delivery = $comment = $myFile = "";
$ttr_1 = $ttr_2 = $ttr_3 = $ttr_4 = $ttr_5 = "0";
$ttr1Err = $ttr2Err = $ttr3Err = $ttr4Err = $ttr5Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// if ( isset($_POST["submitData"]) ) {
  echo "submitData";
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
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
  }
  
  ///////// ORDER ////////

  if (empty($_POST["ttr_1"])) {
    $ttr1Err = "Order is required, at lease 0";
  } else {
    $ttr_1 = test_input($_POST["ttr_1"]);
    // check if order only number
    // if (!preg_match("/^[0-9]*$/",$order)) {
    //   $orderErr = "Only numbers allowed"; 
    // }
  }
  if (empty($_POST["ttr_2"])) {
    $ttr2Err = "Order is required, at lease 0";
  } else {
    $ttr_2 = test_input($_POST["ttr_2"]);
    // check if order only number
    // if (!preg_match("/^[0-9]*$/",$order)) {
    //   $orderErr = "Only numbers allowed"; 
    // }
  }
  if (empty($_POST["ttr_3"])) {
    $ttr3Err = "Order is required, at lease 0";
  } else {
    $ttr_3 = test_input($_POST["ttr_3"]);
    // check if order only number
    // if (!preg_match("/^[0-9]*$/",$order)) {
    //   $orderErr = "Only numbers allowed"; 
    // }
  }
  if (empty($_POST["ttr_4"])) {
    $ttr4Err = "Order is required, at lease 0";
  } else {
    $ttr_4 = test_input($_POST["ttr_4"]);
    // check if order only number
    // if (!preg_match("/^[0-9]*$/",$order)) {
    //   $orderErr = "Only numbers allowed"; 
    // }
  }
  if (empty($_POST["ttr_5"])) {
    $ttr5Err = "Order is required, at lease 0";
  } else {
    $ttr_5 = test_input($_POST["ttr_5"]);
    // check if order only number
    // if (!preg_match("/^[0-9]*$/",$order)) {
    //   $orderErr = "Only numbers allowed"; 
    // }
  }



    


  if (empty($_POST["delivery"])) {
    $deliveryErr = "Delivery is required";
  } else {
    $delivery = test_input($_POST["delivery"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$storagename = "";
if ( isset($_POST["submitFile"]) ) {

  // if (empty($_POST["myFile"])) {
  //   $fileErr = "File is required";
  // } else {
    // $myFile = test_input($_POST["myFile"]);
    // // check if name only contains letters and whitespace
    // if (!preg_match("/^[a-zA-Z]*.[cC][sS][vV]$/",$myFile)) {
    //   $fileErr = "Only CSV file type allowed"; 
    // }
  // }
   if ( isset($_FILES["myFile"])) {

            //if there was an error uploading the file
        if ($_FILES["myFile"]["error"] > 0) {
            echo "Return Code: " . $_FILES["myFile"]["error"] . "<br />";

        }
        else {
                 //Print file details
             // echo "Upload: " . $_FILES["myFile"]["name"] . "<br />";
             // echo "Type: " . $_FILES["myFile"]["type"] . "<br />";
             // echo "Size: " . ($_FILES["myFile"]["size"] / 1024) . " Kb<br />";
             // echo "Temp file: " . $_FILES["myFile"]["tmp_name"] . "<br />";

                 //if file already exists
             if (file_exists("upload/" . $_FILES["myFile"]["name"])) {
            // echo $_FILES["myFile"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "data.txt";
            move_uploaded_file($_FILES["myFile"]["tmp_name"], "upload/" . $storagename);
            // echo "Stored in: " . "upload/" . $_FILES["myFile"]["name"] . "<br />";
            }
        }
     } else {
             // echo "No file selected <br />";
     }

	$myfile = fopen("upload/" . $storagename, "r") or die("Unable to open file!");
	$data = fread($myfile,filesize("upload/" . $storagename));
	$listLine = explode("EMS", $data);
  $listData = explode(",", $listLine[1]);
  $listData[8] = (explode("D", $listData[8]))[0];
	// echo "<br>";
	// echo $listLine[0];
 //  echo "<br>";
 //  echo $listLine[1];
	// echo "<br>";
	// echo $listData[0];
	// echo "<br>";
	// echo $listData[1];
	// echo "<br>";
	// echo $listData[2];
	// echo "<br>";
	// echo $listData[3];
 //  echo "<br>";
 //  echo $listData[4];
 //  echo "<br>";
 //  echo $listData[5];
 //  echo "<br>";
 //  echo $listData[6];
 //  echo "<br>";
 //  echo $listData[7];
 //  echo "<br>";
 //  echo $listData[8];
	fclose($myfile);

  //////// Fill Data To Input Form ////////
	$name = $listData[0];
	$email = $listData[1];


	$ttr_1 = $listData[2];
  if ($ttr_1 < 0 || $ttr_1 == null || !is_numeric($ttr_1)) {
    $ttr_1 = 0;
  }
  $ttr_2 = $listData[3];
  if ($ttr_2 < 0 || $ttr_2 == null || !is_numeric($ttr_2)) {
    $ttr_2 = 0;
  }
  $ttr_3 = $listData[4];
  if ($ttr_3 < 0 || $ttr_3 == null || !is_numeric($ttr_3)) {
    $ttr_3 = 0;
  }
  $ttr_4 = $listData[5];
  if ($ttr_4 < 0 || $ttr_4 == null || !is_numeric($ttr_4)) {
    $ttr_4 = 0;
  }
  $ttr_5 = $listData[6];
  if ($ttr_5 < 0 || $ttr_5 == null || !is_numeric($ttr_5)) {
    $ttr_5 = 0;
  }
	

	if ( $listData[7] == 1 ) {
		$delivery = "regis";
	}
	if ( $listData[8] == 1) {
		$delivery = "ems";
	} 

	

}

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span> or upload CSV file</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<form>

  <a href="download/data.csv" download>
    <i class="fa fa-download"></i>Download    
    
  </a>
  
  Select a file: <input type="file" accept=".csv" name="myFile" id="myFile" value="<?php echo $myFile;?>">
  <span class="error"> <?php echo $fileErr;?></span>
  <input type="submit" name="submitFile">
  <br><br>
</form>

 
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  TTR-1 : <input id="order" type="number" name="ttr_1" min="0" value="<?php echo $ttr_1;?>">
  <span class="error">* <?php echo $ttr1Err;?></span>
  <br><br>

  TTR-2 : <input type="number" name="ttr_2" min="0" value="<?php echo $ttr_2;?>">
  <span class="error">* <?php echo $ttr2Err;?></span>
  <br><br>

  TTR-3 : <input type="number" name="ttr_3" min="0" value="<?php echo $ttr_3;?>">
  <span class="error">* <?php echo $ttr3Err;?></span>
  <br><br>

  TTR-4 : <input type="number" name="ttr_4" min="0" value="<?php echo $ttr_4;?>">
  <span class="error">* <?php echo $ttr4Err;?></span>
  <br><br>

  TTR-5 : <input type="number" name="ttr_5" min="0" value="<?php echo $ttr_5;?>">
  <span class="error">* <?php echo $ttr5Err;?></span>
  <br><br>



  Delivery:
  <input type="radio" name="delivery" <?php if (isset($delivery) && $delivery=="regis") echo "checked";?> value="Registered">Registered
  <input type="radio" name="delivery" <?php if (isset($delivery) && $delivery=="ems") echo "checked";?> value="EMS">Express Mail Service 
  <span class="error">* <?php echo $deliveryErr;?></span>
  <br><br>

  <!-- Comment: <textarea name="comment" rows="3" cols="40"><?php echo $comment;?></textarea>
  <br><br> -->

  <input type="submit" name="submitData" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $ttr_1;
echo "<br>";
echo $ttr_2;
echo "<br>";
echo $ttr_3;
echo "<br>";
echo $ttr_4;
echo "<br>";
echo $ttr_5;
echo "<br>";
echo $delivery;

?> 

</body>
</html>
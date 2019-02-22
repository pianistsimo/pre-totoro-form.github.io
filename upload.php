<?php
$storagename = "";
if ( isset($_POST["submitFile"]) ) {

   if ( isset($_FILES["myFile"])) {
        
            //if there was an error uploading the file
        if ($_FILES["myFile"]["error"] > 0) {
            // echo "Return Code: " . $_FILES["myFile"]["error"] . "<br />";
            $fileErr = "File is required";
            $nameErr = $emailErr = $deliveryErr = "";
            $ttr_1 = $ttr_2 = $ttr_3 = $ttr_4 = $ttr_5 = "";
            $ttr1Err = $ttr2Err = $ttr3Err = $ttr4Err = $ttr5Err = "";
        }
        else {                 
              //Print file details
             // echo "Upload: " . $_FILES["myFile"]["name"] . "<br />";
             // echo "Type: " . $_FILES["myFile"]["type"] . "<br />";
             // echo "Size: " . ($_FILES["myFile"]["size"] / 1024) . " Kb<br />";
             // echo "Temp file: " . $_FILES["myFile"]["tmp_name"] . "<br />";
            $myFile = $_FILES["myFile"]["name"];
            // check if filetype only contains .csv
            if (!preg_match("/^.*.[cC][sS][vV]$/",$myFile)) {
              $fileErr = "Only .csv file type allowed"; 
              $nameErr = $emailErr = $deliveryErr = "";
              $ttr_1 = $ttr_2 = $ttr_3 = $ttr_4 = $ttr_5 = "";
              $ttr1Err = $ttr2Err = $ttr3Err = $ttr4Err = $ttr5Err = "";
            }else {

                 //if file already exists
             if (file_exists("upload/" . $_FILES["myFile"]["name"])) {
            // echo $_FILES["myFile"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "data.txt";
            move_uploaded_file($_FILES["myFile"]["tmp_name"], "upload/" . $storagename);
            // echo "Stored in: " . "upload/" . $_FILES["myFile"]["name"] . "<br />";
            $myfile = fopen("upload/" . $storagename, "r") or die("Unable to open file!");
            $data = fread($myfile,filesize("upload/" . $storagename));
            fclose($myfile);
            // echo $data;
            $listLine = explode("EMS", $data);
            $listData = explode(",", $listLine[1]);
            $listData[8] = (explode("D", $listData[8]))[0];

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
            
            if ( $listData[7] == 1 && $listData[8] == 0) {
              $delivery = "regis";
            }
            else if ( $listData[8] == 1 && $listData[7] == 0) {
              $delivery = "ems";
            }
            else {
            	$delivery = null;
            }
            $nameErr = $emailErr = $deliveryErr = $fileErr = "";
            $ttr1Err = $ttr2Err = $ttr3Err = $ttr4Err = $ttr5Err = "";

            }

          }
        }
     } else {
             $fileErr = "File is required";
     }

   
 //  $listLine = explode("EMS", $data);
 //  $listData = explode(",", $listLine[1]);
 //  $listData[8] = (explode("D", $listData[8]))[0];
 //  // echo "<br>";
 //  // echo $listLine[0];
 // //  echo "<br>";
 // //  echo $listLine[1];
 //  // echo "<br>";
 //  // echo $listData[0];
 //  // echo "<br>";
 //  // echo $listData[1];
 //  // echo "<br>";
 //  // echo $listData[2];
 //  // echo "<br>";
 //  // echo $listData[3];
 // //  echo "<br>";
 // //  echo $listData[4];
 // //  echo "<br>";
 // //  echo $listData[5];
 // //  echo "<br>";
 // //  echo $listData[6];
 // //  echo "<br>";
 // //  echo $listData[7];
 // //  echo "<br>";
 // //  echo $listData[8];


 //  //////// Fill Data To Input Form ////////
 //  $name = $listData[0];
 //  $email = $listData[1];


 //  $ttr_1 = $listData[2];
 //  if ($ttr_1 < 0 || $ttr_1 == null || !is_numeric($ttr_1)) {
 //    $ttr_1 = 0;
 //  }
 //  $ttr_2 = $listData[3];
 //  if ($ttr_2 < 0 || $ttr_2 == null || !is_numeric($ttr_2)) {
 //    $ttr_2 = 0;
 //  }
 //  $ttr_3 = $listData[4];
 //  if ($ttr_3 < 0 || $ttr_3 == null || !is_numeric($ttr_3)) {
 //    $ttr_3 = 0;
 //  }
 //  $ttr_4 = $listData[5];
 //  if ($ttr_4 < 0 || $ttr_4 == null || !is_numeric($ttr_4)) {
 //    $ttr_4 = 0;
 //  }
 //  $ttr_5 = $listData[6];
 //  if ($ttr_5 < 0 || $ttr_5 == null || !is_numeric($ttr_5)) {
 //    $ttr_5 = 0;
 //  }
  

 //  if ( $listData[7] == 1 ) {
 //    $delivery = "regis";
 //  }
 //  if ( $listData[8] == 1) {
 //    $delivery = "ems";
 //  }  
	
}


?>
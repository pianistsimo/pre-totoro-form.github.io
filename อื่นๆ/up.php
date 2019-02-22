<!DOCTYPE HTML>  
<html>
<head>

</head>
<body> 
<table width="600">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

<tr>
<td width="20%">Select file</td>
<td width="80%"><input type="file" name="mfile" id="file" /></td>
</tr>

<tr>
<td>Submit</td>
<td><input type="submit" name="submitFile" /></td>
<input type="submit" name="submit" />
</tr>

</form>
</table>

<?php  
$storagename = "";
if ( isset($_POST["submitFile"]) ) {

   if ( isset($_FILES["mfile"])) {

            //if there was an error uploading the file
        if ($_FILES["mfile"]["error"] > 0) {
            echo "Return Code: " . $_FILES["mfile"]["error"] . "<br />";

        }
        else {
                 //Print file details
             echo "Upload: " . $_FILES["mfile"]["name"] . "<br />";
             echo "Type: " . $_FILES["mfile"]["type"] . "<br />";
             echo "Size: " . ($_FILES["mfile"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["mfile"]["tmp_name"] . "<br />";

                 //if file already exists
             if (file_exists("upload/" . $_FILES["mfile"]["name"])) {
            echo $_FILES["mfile"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "data.txt";
            move_uploaded_file($_FILES["mfile"]["tmp_name"], "upload/" . $storagename);
            echo "Stored in: " . "upload/" . $_FILES["mfile"]["name"] . "<br />";
            }
        }
     } else {
             echo "No file selected <br />";
     }

	$myfile = fopen("upload/" . $storagename , "r") or die("Unable to open file!");
	$data = fread($myfile,filesize("upload/" . $storagename));
	$listData = explode(",", $data);
	echo "<br>";
	echo $data;
	echo "<br>";
	echo $listData[0];
	echo "<br>";
	echo $listData[1];
	echo "<br>";
	echo $listData[2];
	echo "<br>";
	echo $listData[3];
	fclose($myfile);


}

// if ( $file = fopen( "upload/" . $storagename , "r" ) ) {

//     echo "File opened.<br />";



    // $firstline = fgets ($file, 4096 );
    //     //Gets the number of fields, in CSV-files the names of the fields are mostly given in the first line
    // $num = strlen($firstline) - strlen(str_replace(";", "", $firstline));

    //     //save the different fields of the firstline in an array called fields
    // $fields = array();
    // $fields = explode( ";", $firstline, ($num+1) );

    // $line = array();
    // $i = 0;

        //CSV: one line is one record and the cells/fields are seperated by ";"
        //so $dsatz is an two dimensional array saving the records like this: $dsatz[number of record][number of cell]
    // while ( $line[$i] = fgets ($file, 4096) ) {

    //     $dsatz[$i] = array();
    //     $dsatz[$i] = explode( ";", $line[$i], ($num+1) );

    //     $i++;
    // }

    //     echo "<table>";
    //     echo "<tr>";
    // for ( $k = 0; $k != ($num+1); $k++ ) {
    //     echo "<td>" . fields[$k] . "</td>";
    // }
    //     echo "</tr>";

    // foreach ($dsatz as $key => $number) {
    //             //new table row for every record
    //     echo "<tr>";
    //     foreach ($number as $k => $content) {
    //                     //new table cell for every field of the record
    //         echo "<td>" . $content . "</td>";
    //     }
    // }

    // echo "</table>";
// }

?>

</body>
</html>
<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fichappc_InVenture_v2";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
/* Getting file name */
$filename = $_FILES['file']['name'];
// echo $_POST['file'];
/* Location */
$location = "upload/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png");

/* Check file extension */
if(!in_array(strtolower($imageFileType), $valid_extensions)) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
     echo $location;
     $result = mysqli_query($conn, "SELECT pic FROM users where id='".$_POST['uid']."'");
     $rowcount=mysqli_num_rows($result);
            if($rowcount==0){
            	$sql= mysqli_query($conn,"INSERT INTO users(pic) VALUES('".$location."')");
            }else{
            	$sql = mysqli_query($conn,"UPDATE users SET pic='".$location."' WHERE id='".$_POST['uid']."'");

            	}
   }else{
     echo 0;
   }
}
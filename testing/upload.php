<?php

session_start();

    function connectDB() {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "himassui_to2016";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            return $conn;
    }
          $username = $_SESSION["userlogin"];  
          $conn = connectDB();
          $sql = "SELECT * FROM peserta WHERE username='$username'";
          $idpeserta = "";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          $idpeserta = $row['id'];
          }

$target_dir = "uploads/";
$target_file = "fotoh";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["selectedFile"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
if ($_FILES["selectedFile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["selectedFile"], $target_file)) {
        echo "The file  has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?> 
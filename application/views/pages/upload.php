<?php
    if(!isset($_SESSION["userlogin"])){
        header("Location: home");
      } 
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

$target_dir = "uploads/id= ".$idpeserta."_";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, and PNG Files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $target_file = $target_dir . "bukti.jpeg";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        echo "<center> The file has been uploaded </center><br><br>";
        echo "<center><a href='profile' class='btn btn-link' role='button'> Kembali ke Halaman Profile</a></center>";
        echo "<br><br><br><br><br><br><br>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?> 
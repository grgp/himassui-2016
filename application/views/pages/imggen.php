<?php
		
		/* * * * * * * * * * * * * *
		 * IMAGE PROCESSING SCRIPT *
		 * * * * * * * * * * * * * */
		if(!isset($_SESSION["userlogin"])){
         // header('Location: http://www.himassui.com/UIGTB2016/index.html');
        header('Location: home');
        }
        $username = $_SESSION["userlogin"];  
		$conn = connectDB();
		$sql = "SELECT * FROM peserta WHERE username='$username'";
		$idpeserta = "";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
	        if ($row['status'] === '0') {
	          header("Location: home");
	        }
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
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          		$kode = "";
          		if ($row['jurusan'] === "Saintek") {
          			$kode = '01';
          		}
          		else {
          			$kode = '02';
          		}
          		$temp = '13'.$kode.$row['tipesoal'].$row['nomorujian'];
        		$name = strtoupper($row['nama']);
				$id_num = strtoupper($temp);
				$school = strtoupper($row['asal']);  	
          }

		$photoFileName = "tmp/" . basename($_FILES["selectedFile"]["name"]);
		$uploadOk = 1;

		// Check whether the uploaded file is a fake image to prevent site penetration
		$check = getimagesize($_FILES["selectedFile"]["tmp_name"]);
		if($check == false) {
			echo "Sorry, there was an error uploading your file.";
			$uploadOk = 0;
		} 

		// allow JPEG & PNG only
		else {
			$imageFileType = strtolower(pathinfo($photoFileName,PATHINFO_EXTENSION));
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
				echo "Sorry, there was an error uploading your file.";
				$uploadOk = 0;
			}
		}

		// allow <= 500 kB images only
		if ($_FILES["selectedFile"]["size"] > 500000000) {
			echo "Sorry, there was an error uploading your file.";
			$uploadOk = 0;
		} 

		if ($uploadOk == 1) {
			// upload
			move_uploaded_file($_FILES["selectedFile"]["tmp_name"], $photoFileName);

		// redefine the posted variables
		
		
		// save the template to memory
		$tag = imagecreatefromjpeg("assets/gen/card2.jpg");

		// save the photo to memory
		$imageInfo = getImageSize($photoFileName);
		if ($imageInfo['mime'] == 'image/jpeg') {
			$originalPhoto = imagecreatefromjpeg($photoFileName);
		} else {
			$originalPhoto = imagecreatefrompng($photoFileName);
		}

		// get image's width and height
		$photoWidth = imagesx($originalPhoto);
		$photoHeight = imagesy($originalPhoto);

		// compute crop area
		$startCropX = 0;
		$startCropY = 0;
		$photoSideLength = $photoWidth;
		if ($photoWidth < $photoHeight) { // if the photo's portrait
			$startCropY = $photoHeight / 2 - $photoWidth / 2;
		} else if ($photoWidth > $photoHeight) { // if the photo's landscape
			$startCropX = $photoWidth / 2 - $photoHeight / 2;
			$photoSideLength = $photoHeight;
		}

		// create the resized and cropped photo
		$croppedPhoto = imagecreatetruecolor(250, 250);
		imagecopyresampled($croppedPhoto, $originalPhoto, 0, 0, $startCropX, $startCropY, 250, 250, $photoSideLength, $photoSideLength);


		// set the font color
		$black = ImageColorAllocate($tag, 10, 10, 10);

		// compute the font size and coordinate of the name
		$nameFontSize = 45;
		$nameDimensions = imageftbbox($nameFontSize, 0, 'assets/gen/BebasNeue Regular.ttf', $name);
		$nameWidth = abs($nameDimensions[4] - $nameDimensions[0]);
		while ($nameWidth > 478) { // while the name exceeds the maximum width, decrement the font size
			$nameFontSize = $nameFontSize - 1;
			$nameDimensions = imageftbbox($nameFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $name);
			$nameWidth = abs($nameDimensions[4] - $nameDimensions[0]);
		}

		// compute the font size and coordinate of the id number
		$id_numFontSize = 45;
		$id_numDimensions = imageftbbox($id_numFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $id_num);
		$id_numWidth = abs($id_numDimensions[4] - $id_numDimensions[0]);
		while ($id_numWidth > 478) { // while the id_num name exceeds the maximum width, decrement the font size
			$id_numFontSize = $id_numFontSize - 1;
			$id_numDimensions = imageftbbox($id_numFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $id_num);
			$id_numWidth = abs($id_numDimensions[4] - $id_numDimensions[0]);
		}

		// compute the font size and coordinate of the school
		$schoolFontSize = 45;
		$schoolDimensions = imageftbbox($schoolFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $school);
		$schoolWidth = abs($schoolDimensions[4] - $schoolDimensions[0]);
		while ($schoolWidth > 478) { // while the school name exceeds the maximum width, decrement the font size
			$schoolFontSize = $schoolFontSize - 1;
			$schoolDimensions = imageftbbox($schoolFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $school);
			$schoolWidth = abs($schoolDimensions[4] - $schoolDimensions[0]);
		}

		// put the photo on the tag
		imagecopymerge($tag,$croppedPhoto,55,365,0,0,250,250,100);


		// put the name on the tag
		imagefttext($tag,$nameFontSize,0,688,462,$black,'assets/gen/BebasNeue Regular.otf',$name);

		// put the id_num on the tag
		imagefttext($tag,$id_numFontSize,0,902,113,$black,'assets/gen/BebasNeue Regular.otf',$id_num);

		// put the school on the tag
		imagefttext($tag,$schoolFontSize,0,688,557,$black,'assets/gen/BebasNeue Regular.otf',$school);

		// save the created tag
		$createdTagFile = 'tmp/' . $id_num . '.jpg';
		imagejpeg($tag,$createdTagFile,75);

		// preview the created tag
		echo '<center><img src="' . $createdTagFile . '"><br><br><i>(right click > save image as)</i><br><br><b>YOUR FILE WILL NOT BE PRESERVED  DUE TO PRIVACY CONCERNS</b>';

		}
 
	else {
		echo "Sorry, there was an error processing your tag.";
	}
?>
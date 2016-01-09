<?php
if (!empty($_POST['name']) && !empty($_POST['id_num']) && !empty($_POST['school'])) { // ensure fields aren't empty

		/* * * * * * * * * * * * * *
		 * IMAGE PROCESSING SCRIPT *
		 * * * * * * * * * * * * * */

		// redefine the posted variables
		$name = strtoupper($_POST['name']);
		$id_num = strtoupper($_POST['id_num']);
		$school = strtoupper($_POST['school']);

		// save the template to memory
		$tag = imagecreatefromjpeg("assets/gen/card.jpg");

		// set the font color
		$blue = ImageColorAllocate($tag, 55, 70, 113);

		// compute the font size and coordinate of the name
		$nameFontSize = 60;
		$nameDimensions = imageftbbox($nameFontSize, 0, 'assets/gen/BebasNeue Regular.ttf', $name);
		$nameWidth = abs($nameDimensions[4] - $nameDimensions[0]);
		while ($nameWidth > 518) { // while the name exceeds the maximum width, decrement the font size
			$nameFontSize = $nameFontSize - 1;
			$nameDimensions = imageftbbox($nameFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $name);
			$nameWidth = abs($nameDimensions[4] - $nameDimensions[0]);
		}

		// compute the font size and coordinate of the id number
		$id_numFontSize = 45;
		$id_numDimensions = imageftbbox($id_numFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $id_num);
		$id_numWidth = abs($id_numDimensions[4] - $id_numDimensions[0]);
		while ($id_numWidth > 518) { // while the id_num name exceeds the maximum width, decrement the font size
			$id_numFontSize = $id_numFontSize - 1;
			$id_numDimensions = imageftbbox($id_numFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $id_num);
			$id_numWidth = abs($id_numDimensions[4] - $id_numDimensions[0]);
		}

		// compute the font size and coordinate of the school
		$schoolFontSize = 45;
		$schoolDimensions = imageftbbox($schoolFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $school);
		$schoolWidth = abs($schoolDimensions[4] - $schoolDimensions[0]);
		while ($schoolWidth > 518) { // while the school name exceeds the maximum width, decrement the font size
			$schoolFontSize = $schoolFontSize - 1;
			$schoolDimensions = imageftbbox($schoolFontSize, 0, 'assets/gen/BebasNeue Regular.otf', $school);
			$schoolWidth = abs($schoolDimensions[4] - $schoolDimensions[0]);
		}

		// put the name on the tag
		imagefttext($tag,$nameFontSize,0,670,276,$blue,'assets/gen/BebasNeue Regular.otf',$name);

		// put the id_num on the tag
		imagefttext($tag,$id_numFontSize,0,758,387,$blue,'assets/gen/BebasNeue Regular.otf',$id_num);

		// put the school on the tag
		imagefttext($tag,$schoolFontSize,0,508,562,$blue,'assets/gen/BebasNeue Regular.otf',$school);

		// save the created tag
		$createdTagFile = 'tmp/' . $id_num . '.jpg';
		imagejpeg($tag,$createdTagFile,75);

		// preview the created tag
		echo '<center><img src="' . $createdTagFile . '"><br><br><i>(right click > save image as)</i><br><br><b>YOUR FILE WILL NOT BE PRESERVED  DUE TO PRIVACY CONCERNS</b>';

} else {
	echo "Sorry, there was an error processing your tag.";
}
?>

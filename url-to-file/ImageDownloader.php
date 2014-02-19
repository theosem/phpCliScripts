<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

//////// Config ////////////////
$fname = "URLs.txt";
$imagesDirectory = "data/";
$overwriteFiles = true;
$sleepSeconds = 2; //for each 100 images sleep 2 seconds

////////////////////////////////
$content = file_get_contents($fname);
$queries = explode("\n", $content);


if (!file_exists($imagesDirectory)){
    if (@mkdir($imagesDirectory, 0777, true) == false){
      echo "Error creating directory ".$imagesDirectory."\n";
	  exit();
	}
}
$counter = 0;
foreach($queries as $url){

	$url = trim($url); //trim white spaces
	$imageFile = $imagesDirectory . $counter . '.jpg';

	if (!file_exists($imageFile) or $overwriteFiles == true) {
			echo "#".$counter." saving image file ".$imageFile."\n";
			file_put_contents($imageFile, file_get_contents($url));
	}
	else{
		echo "skipping existing image file $imageFile\n";
	}
			
	$counter++;

	if($counter%100==0){
	sleep($sleepSeconds);
	}
}
?>
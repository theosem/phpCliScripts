<?php
$dir="D:/DATA/";
$fileExtensionFilter="jpg";

$outFile = "list.txt";
$fh = fopen($outFile, 'w') or die("can't open file");
		
$files1 = scandir($dir);

for($i=0;$i<count($files1);$i++){
$oldFile = $files1[$i];
$newname = $oldFile;// str_replace(" ","_",$oldFile);
echo $newname."\n";
//rename ( $dir.$files1[$i] , $dir.$newname);

	//to extract img lists
	if( is_dir($dir.$newname) && $dir.$newname !="." && $dir.$newname!="..")
	{
	$imgFiles = scandir($dir.$newname);
	for($j=0;$j<count($imgFiles);$j++){
	
	if( file_extension($imgFiles[$j]) == $fileExtensionFilter ){
	
	$dataout = $dir.$newname."/".$imgFiles[$j]."\n";
	fwrite($fh, $dataout);
	}
	}

	}
}

fclose($fh);		

function file_extension($filename)
{
    return end(explode(".", $filename));
}
?>
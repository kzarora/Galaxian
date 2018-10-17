<?php
  
$dir = getcwd();
chdir($dir);

// Open a directory, and read its contents
//$file_to_read = "$dir\hello.txt";
//print readfile($file_to_read);
 echo $dir;
$handle="./hello.php";
$document=file_get_contents($handle);
echo $document;

//echo $dir;
 $filename = 'C:\xampp\htdocs\Galaxian\hello.php';
 $d=file_get_contents($filename);
 //echo $d;

if (file_exists($filename)) {
    chmod($filename, 0777);
    echo "The file $filename exists";
} else {
    echo "The file $filename does not exist";
}
/*while(!feof($handle))
{
	echo fgets($handle);
}	
fclose($handle);
*/

//$fpath = "C:\\hello.txt";
//$handle = fopen($fpath, "rb");
//$contents = fread($handle, filesize($fpath));
//fclose($handle);
?>


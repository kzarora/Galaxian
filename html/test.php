<?php
$src = "/home/www/example.com/source/folders/";  // source folder or file
$dest = "/home/www/example.com/test/123456";   // destination folder or file        

shell_exec("cp -r $src $dest");
?>
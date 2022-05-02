
<?php

require ("Helpers/Downloader.php");


$start = new Downloader();
$start->download();
$start->unzip();
$start->deleteFile();


?>


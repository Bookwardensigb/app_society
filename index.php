
<?php

require ("Helpers/Downloader.php");


$start = new Downloader();
$start->download();
$start->rename();
$start->unzip();
$start->deleteFile();

?>


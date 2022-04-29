<?php 
 class Downloader {
       public $baseurl;
       public $filename;
       public $filecontent;
       public $directorydownload;
    
       public function __construct() {
       }

       public function download() {
            $url = "http://speedtest.ftp.otenet.gr/files/test100k.db";
            $filename = basename($url);
            $filecontent = file_get_contents($url);
            $directorydownload = "telechargement/";
           if(file_put_contents($directorydownload . $filename, $filecontent)) 
            {echo "Fichier téléchargé avec succès \n";} 
            else 
            {echo "Fichier non téléchargé \n";} 
        }
    }
$start = new Downloader();
echo "Start downloading \n";
$start->download();

?> 



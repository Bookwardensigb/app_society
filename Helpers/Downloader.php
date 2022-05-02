<?php 


/*
|--------------------------------------------------------------------------
| Downloaders
|--------------------------------------------------------------------------
|
| This file is used to download the files 
| 
| 
|
*/

class Downloader {
       public $baseurl;
       public $filename;
       public $filecontent;
       public $directorydownload;
    
       public function __construct() {
       }

       public function download() {
            echo "Start downloading \n";
            $url = "https://elementaire.ijclab.in2p3.fr/wp-content/uploads/sites/5/2016/06/web.zip";
            $filename = basename($url);
            $filecontent = file_get_contents($url);
            $directorydownload = "telechargement/";
           if(file_put_contents($directorydownload . $filename, $filecontent)) 
            {echo "Fichier téléchargé avec succès \n";} 
            else 
            {echo "Fichier non téléchargé \n";} 
        }
    
        public function unzip() {
            $zip = new ZipArchive;
            if ($zip->open('telechargement/web.zip') === TRUE) {
                $zip->extractTo('telechargement/');
                $zip->close();
                echo "ok \n";
            } else {
                echo "échec \n";
            }
        }

        public function deleteFile(){
            If (unlink('telechargement/web.zip')) {
                echo "file was successfully deleted\n";
              } else {
                echo "there was a problem deleting the file\n";
              }
        }
    }

$start = new Downloader();
$start->download();
$start->unzip();
$start->deleteFile();

?> 



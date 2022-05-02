<?php 


/*
|--------------------------------------------------------------------------
| Downloaders
|--------------------------------------------------------------------------
|
| This file is used to download the files. There is three functions. 
| One to download the files. One to unzip. One to deletefiles. 
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
            $url = "https://www.data.gouv.fr/fr/datasets/r/88fbb6b4-0320-443e-b739-b4376a012c32";
            $filename = basename($url);
            $filecontent = file_get_contents($url);
            $filepath = (__DIR__. DIRECTORY_SEPARATOR . "telechargement" . DIRECTORY_SEPARATOR);
           if(file_put_contents($filepath . $filename, $filecontent)) 
            {echo "Fichier téléchargé avec succès \n";} 
            else 
            {echo "Fichier non téléchargé \n";} 
        }

        public function rename() {
            rename(__DIR__. DIRECTORY_SEPARATOR . "telechargement" . DIRECTORY_SEPARATOR . "88fbb6b4-0320-443e-b739-b4376a012c32", __DIR__. DIRECTORY_SEPARATOR . "telechargement" . DIRECTORY_SEPARATOR . "88fbb6b4-0320-443e-b739-b4376a012c32.zip");
            echo "ok \n";
        }
    
        public function unzip() {
            $zip = new ZipArchive;
            if ($zip->open(__DIR__. DIRECTORY_SEPARATOR . "telechargement" . DIRECTORY_SEPARATOR . "88fbb6b4-0320-443e-b739-b4376a012c32.zip") === TRUE) {
                $zip->extractTo(__DIR__. DIRECTORY_SEPARATOR. "telechargement" . DIRECTORY_SEPARATOR);
                $zip->close();
                echo "ok \n";
            } else {
                echo "échec \n";
            }
        }

        public function deleteFile(){
            If (unlink(__DIR__. DIRECTORY_SEPARATOR. "telechargement".DIRECTORY_SEPARATOR. "88fbb6b4-0320-443e-b739-b4376a012c32.zip")) {
                echo "file was successfully deleted\n";
              } else {
                echo "there was a problem deleting the file\n";
              }
        }
    }
?> 



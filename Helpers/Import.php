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

require(__DIR__. DIRECTORY_SEPARATOR "APP_SOCIETY" . DIRECTORY_SEPARATOR "config.php")

 class import() {

    // db connection config vars
    private $user = DBUSER;
    private $pass = DBPWD;
    private $dbName = DBNAME;
    private $dbHost = DBHOST;
    public $mysqli;
    public $file;
    public $stmt; 

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);;

    $csvFilePath = "import-template.csv";
    $file = fopen($csvFilePath, "r");
    while (($row = fgetcsv($file)) !== FALSE) {
        $stmt = $mysqli->prepare("INSERT INTO tbl_users (userName, firstName, lastName) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $row[1], $row[2], $row[3]);
        $stmt->execute();
    }
 }
?>




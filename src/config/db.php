
<?php

class db
{

    //Propiedades

    //?Depuracion

    private $dbHost = 'localhost';
    private $dbUser = 'root';
    private $dbPass = '';
    private $dbName = 'mrd';

    /*
    //? Produccion
    private $dbHost = 'localhost';
    private $dbUser = 'ustgmnet_appreportes';
    private $dbPass = 'x8gYH7skHn2V';
    private $dbName = 'ustgmnet_app';
*/

    //coneccion
    public function connectDB()
    {
        $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
        $dbConnection = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
}

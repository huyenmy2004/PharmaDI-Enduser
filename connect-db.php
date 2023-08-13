<?php
class Connection{
    protected $connection,
    $host,
    $dbname,
    $username,
    $password;
    public function __construct(){
        $this->host = 'localhost';
        $this->dbname = 'pharmadi';
        $this->username = 'root';
        $this->password = '';
        $this->connection = $this->connect();
    }
    public function connect(){
        try{
            $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connection;
        }
        catch (Exception $e) {
            die($e->getMessage());     
        }
    }
    public function prepareSQL($sql){
        return $this->connection->prepare($sql);
    }
}
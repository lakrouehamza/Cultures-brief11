<?php
class Connect{
    private  $conn ;
    public function __construct()
    {
        try{
        $conn = new  PDO ("mysql:host=localhost;dbname=cultures",'root',"12345");
            if(!$conn)
                throw new ExceptionConnect("le base de donnee ne existe pas !! ");
        $this->conn= $conn;
        }catch(ExceptionConnect $e){
                echo $e->getMessage();
        }
    }
    public function getConnect(){
        return $this->conn;
    }
};

?>
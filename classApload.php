<?php
class connect  
{  
    public $username="root";
    public $password=""; 
    public function __construct()
    {  
      $this->connect=new PDO("mysql:host=localhost;dbname=appgestionbanquaire;",$this->username,$this->password); 
    }
}    
class Apload extends connect 
{
   
}

<?php 
     namespace App;
     class postgresql
     {
          private $hostname ='localhost';
          private $username ='postgres';
          private $pass='postgres';
          private $dbname='quanlythanhvienmvc';
          private $port = '5432';
          private $conn = NULL;
          
     
          public function connect()
          {
               $this->conn = pg_connect(" host = $this->hostname port = $this->port dbname = $this->dbname user = $this->username password = $this->pass ")or die("kết nối không thành công");
               echo "kết nối thành công postgresql"; 
               
               return $this->conn;
          }
     }
?>

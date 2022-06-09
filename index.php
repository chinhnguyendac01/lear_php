<?php
     require 'vendor/autoload.php';
     use App\postgresql;
     use App\Mysql;
         
     $db = new Mysql;
     echo "<h3>Kiểm tra kết nối MYSQL</h3><br>";
     $db->connect();  
     echo "<br>-------------------------------------------------------------<br>";  
     echo "<h3>Kiểm tra kết nối POSTGRESQL</h3><br>";
     $pg = new postgresql;
     $pg->connect();
     echo "<br>-------------------------------------------------------------<br>";
     
    if(isset($_GET['controller']))
     {
          $controller = $_GET['controller'];
     }else
     {
          $controller = '';
     }
     switch($controller){
          case 'thanh-vien':{
               require_once('src/controller/thanhvien/Homecontroller.php');
               break;
          }
          
     }

    
?>
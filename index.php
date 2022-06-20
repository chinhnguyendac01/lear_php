<?php
     require 'vendor/autoload.php';
     use App\postgresql;
     use App\Mysql;  
     use App\DBB;
     use App\Blogs;

//      $db = new Mysql;
//      echo "<h3>Kiểm tra kết nối MYSQL</h3><br>";
//      $db->connect();  
//      echo "<br>-------------------------------------------------------------<br>";  
//      echo "<h3>Kiểm tra kết nối POSTGRESQL</h3><br>";
//      $pg = new postgresql;
//      $pg->connect();
//      echo "<br>-------------------------------------------------------------<br>";
     
//     if(isset($_GET['controller']))
//      {
//           $controller = $_GET['controller'];
//      }else
//      {
//           $controller = '';
//      }
//      switch($controller){
//           case 'thanh-vien':{
//                require_once('src/controller/thanhvien/Homecontroller.php');
//                break;
//           }
          
//      }
       
     // $sql = "SELECT * FROM blogs";
     // $result = DBB::query($sql,$array = []);
     // $fechall =  DBB::getAll();
     // echo '<pre>' , var_dump($fechall) , '</pre>';


////////////////////////
     echo"<H3>-----------------------Lấy tất cả record trả về array các object-----------------------</H3>";
     $Blogs1 = Blogs::All();
     echo '<pre>' , var_dump($Blogs1) , '</pre>';
     echo"<H3>-----------------------WHERE AND WHERE OR-----------------------</H3>";
     $Id1 = 1;
     $Id2 = 2;
     $user1 = 111;
     $user2=222 ;
     $Blogs2 = Blogs::where($Id1,$user1,$Id2,$user2);
     echo '<pre>' , print_r($Blogs2) , '</pre>';
     echo"<H3>-----------------------WHERE IN-----------------------</H3>";
     $arr = ['java','PHP','C++','C++'];
     $Blogs3 = Blogs::where2($arr);
     echo '<pre>' , print_r($Blogs3) , '</pre>';
     echo"<H3>-----------------------WHERE LIKE-----------------------</H3>";
     $var1="my";
     $var2=3;
     $Blogs4 = Blogs::where3($var1,$var2);
     echo '<pre>' , print_r($Blogs4) , '</pre>';
     echo"<H3>-----------------------TRẢ VỀ ARRAY COMMENT CỦA BLOG  -----------------------</H3>";
     $blogs = new Blogs();
     $blogs->comments();
     echo"<H3>-----------------------TRẢ VỀ OBJECT BLOG của 1 comment-----------------------</H3>";
     $comment = new Blogs();
     $comments = 'hello';
     echo '<pre>' , var_dump($comment->blogs($comments)) , '</pre>';



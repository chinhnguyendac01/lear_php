<?php
  
     if(isset($_GET['action']))
     {
          $action = $_GET['action'];
     }else
     {
          $action = '';
     }
     switch($action){
          case 'add':{
               if(isset($_POST['add_user']))
               {
                    $hoten = $_POST['hoten'];
                    $namsinh = $_POST['namsinh'];
                    $quequan = $_POST['quequan'];

                   if ($db->InsertData($hoten,$namsinh,$quequan))
                   {
                    echo $thanhcong[] = 'Đã Thêm thành công';
                   }
               }
               require_once('src/view/thanhvien/add_user.php');
               break;
          }
          case 'edit':{
               require_once('src/view/thanhvien/edit_user.php');
               break;
          }
          case 'delete':{
               require_once('src/view/thanhvien/delete.php');
               break;
          }
          default :{
               require_once('src/view/thanhvien/list.php');
               break;
          }
     }
?>
<?php 
 namespace App;
     class Mysql
     {
          private $hostname ='127.0.0.1:3307';
          private $username ='root';
          private $pass= "";
          private $dbname='quanlythanhvienmvc';

          private $conn = NULL;
          private $result = NULL;

          public function connect()
          {
               $this->conn = mysqli_connect($this->hostname,$this->username,$this->pass,$this->dbname);

               if(!$this->conn)
               {
                    echo "kết nối thất bại";
                    exit();
               }else
               {
                    //lỗi phông tiếng việt
                    mysqli_set_charset($this->conn,'utf8');
                    echo "Kết nối thành công mysql";
               }
               return $this->conn;
          }
          //thực thi câu lệnh truy vấn:
          public function execute($sql)
          {
               //dùng thêm sửa xóa 
               // Hỏi xem đã kết nối csdl chưa?
               //kết nối xong đến câu lệnh truy vấn 
               $this->result = $this->conn->query($sql);
               return $this->result;
          }
          // phương thức lấy dữ liệu :
          public function getData()
          {
               if($this->result)
               {
                    //thực hiện truy vấn xong đưa vào biến $data
                    $data = mysqli_fetch_array($this->result);
               }else
               {
                    $data = 0;
               }
               
               return $data;
               
          }
          //phương thức lấy toàn bộ dữ liệu:
          public function getAllData()
          {
               if(!$this->result)
               {
                    return false;
               }else
               {
                    while($datas = $this->getData())
                    {
                         $data[] = $datas;
                    }
                    return $data;
               }
              
        
          }
          //Phương thức đếm số bản ghi:

          //Phương thức thêm dữ liệu:
          public function InsertData($hoten,$namsinh,$quequan)
          {
               $sql = "INSERT INTO thanhvien(id,hoten,namsinh,quequan)VALUES(null,'$hoten','$namsinh','$quequan')";
               return $this->execute($sql);
          }
          //phương thức sửa dữ liệu:

          public function UpdateData($id,$hoten,$namsinh,$quequan)
          {
               $sql = "UPDATE thanhvien SET hoten = '$hoten',namsinh='$namsinh',quequan = '$quequan' WHERE id='$id'";
               return $this->execute($sql);
          }
          //phương thức xóa
          public function Delete($id)
          {
               $sql ="DELETE FROM thanhvien WHERE id='$id'";
               return $this->execute($sql);
          }
     }
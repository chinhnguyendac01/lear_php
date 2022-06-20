<?php

namespace App;

use App\DBB;

class Blogs
{
     public $Id;
     public $title;
     public $content;
     public $user_id;
     public $view;
     public $is_actived;
    public function __construct()
     {
         
     }
     function getId()
     {
          return $this->Id;
     }
     function getTitle()
     {
          return $this->title;
     }
     function getContent()
     {
          return $this->content;
     }
     function getUserId()
     {
          return $this->user_id;
     }
     function getView()
     {
          return $this->view;
     }
     function getActived()
     {
          return $this->is_actived;
     }
     function getBlogs()
     {
          var_dump([
               'iD' => $this->Id,
               'title' => $this->title,
               'Content' => $this->content,
               'UserId' => $this->user_id,
               'View' => $this->view,
               'Actived' => $this->is_actived
          ]);
     }
     public static function All()
     {    
          if(DBB::connection()!=null)
          {
               DBB::connection();
          }         
          $sql = "SELECT Id,title,content,user_id,view,IF(is_actived, 'true', 'false') is_actived  FROM blogs";          
          $stmt = DBB::$dbConnect->prepare($sql);
          $stmt->execute([]);
          $user =$stmt->fetchAll(\PDO::FETCH_CLASS);
          DBB::$dbConnect = NULL;
          return $user;
     }
     public static function where($Id1,$user_id1,$Id2,$user_id2)
     {
          if(DBB::connection()!=null)
          {
               DBB::connection();
          }      
          $sql = "SELECT * FROM blogs WHERE (Id = :Id1 AND user_id = :user_id1) OR (Id =:Id2 AND user_id = :user_id2) ";
          $stmt =  DBB::$dbConnect->prepare($sql);
          $stmt->execute(array(':Id1' => $Id1,
                              ':user_id1'=>$user_id1,
                              ':Id2'=> $Id2,
                              ':user_id2'=>$user_id2 )); 
          $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);  
          DBB::$dbConnect = NULL;
          return $user;          
     }
     public static function where2($titleList = [])
     {
          if(DBB::connection()!=null)
          {
               DBB::connection();
          }      
          $in  = str_repeat('?,', count($titleList) - 1) . '?';
          $sql = "SELECT * FROM blogs WHERE title IN($in) ";
          $stmt =  DBB::$dbConnect->prepare($sql);
          $stmt->execute($titleList); 
          $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);  
          DBB::$dbConnect = NULL;
          return $user;          
     }
     public static function where3($var1,$var2)
     {
          if(DBB::connection()!=null)
          {
               DBB::connection();
          }      
          $query ="SELECT * FROM blogs WHERE content LIKE ? OR id = ?";
          $params = array("%$var1%","$var2");
          $stmt = DBB::$dbConnect->prepare($query);
          $stmt->execute($params);
          $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
          DBB::$dbConnect = NULL;
          return $user;
     }
     public function comments()
     {
          if(DBB::connection()!=null)
          {
               DBB::connection();
          }  
          $query = "SELECT comment FROM blogs inner join comments on blogs.Id = comments.target_id";   
          $stmt = DBB::$dbConnect->prepare($query);
          $stmt->execute();
          
          while($row =  $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
               echo '<pre>' , var_dump($row) , '</pre>';
             }
          DBB::$dbConnect = NULL;       
          return $row;
     }
     public function blogs($comment )
     {
          if(DBB::connection()!=null)
          {
               DBB::connection();
          }
         
          $query = "SELECT blogs.Id FROM blogs inner join comments on blogs.Id = comments.target_id WHERE comments.comment = :comment "; 
         
          $stmt =  DBB::$dbConnect->prepare($query);
          $stmt->bindParam(':comment', $comment); 
          $stmt->execute(array($comment)); 
          $user = $stmt->fetchAll(\PDO::FETCH_CLASS);  
          DBB::$dbConnect = NULL;                 
          return $user;
     }

}

<?php
    require_once 'UserDTO.php';
    require_once 'DBConnector.php';
      
    class UserDAO{
        //private static $instance = new UserDAO();
        private static $instance = null;
        private $connection = null;        

        private function __construct(){                        
            $dbConnector = DBConnector::getInstance();                                  
            $this->connection = $dbConnector->getConnection();
            
        }

        public static function getInstance(){
            echo "<script> console.log('dao getInstance'); </script>";
            if(self::$instance == null){
                self::$instance = new self;
            } 
            return self::$instance;
                     
        }        
        
        public function selectById($userId){
            $userDTO = null;
            $sql = "SELECT * FROM user WHERE user_id=?";
            $stmt = $this->connection->prepare($sql);
            
            $stmt->bind_param('s', $userId);           
            $stmt->execute();
            
            $stmt->bind_result($id, $pw, $type);
            if($stmt->fetch()){
                $userDTO = new UserDTO($id, $pw, $type);
            }
            var_dump($userDTO);
            return $userDTO;
        }
    }
?>

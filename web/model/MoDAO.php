<?php
    
    require_once 'MoDTO.php';
    require_once 'DBConnector.php';
      
    class MoDAO{
        //private static $instance = new UserDAO();
        private static $instance = null;
        private $connection = null;        

        private function __construct(){                        
            $dbConnector = DBConnector::getInstance();                                  
            $this->connection = $dbConnector->getConnection();            
        }

        public static function getInstance(){
            echo "<script> console.log('modao getInstance'); </script>";
            if(self::$instance == null){
                self::$instance = new self;
            } 
            return self::$instance;
                     
        }        
        
        public function mSelectMoByMapId($mapId){
            echo "<script> console.log('mo controller mSelectMoByMapId()'); </script>";
            
            $moDTOs = array();
            $sql = "SELECT * FROM mobile_object WHERE mo_type='1'";
            //$sql = "SELECT * FROM mobile_object";
            $stmt = $this->connection->prepare($sql);
            
            //$stmt->bind_param('s', $mapId);           
            $stmt->execute();            
            

            $stmt->bind_result($moId, $userId, $mId, $type);
            
            while($stmt->fetch()){
                $moDTOs[] = new MoDTO($moId, $userId, $mId, $type);
            }
            
            return $moDTOs;
        }
    }
?>

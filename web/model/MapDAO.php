<?php
    echo "<script> console.log('mapdao load'); </script>";
    require_once 'MapDTO.php';
    require_once 'DBConnector.php';

    class MapDAO{
        //private static $instance = new MapDAO();
        private static $instance = null;
        private $connection = null;

        private function __construct(){
            $dbConnector = DBConnector::getInstance();
            $this->connection = $dbConnector->getConnection();

        }

        public static function getInstance(){
           // echo "<script> console.log('dao getInstance'); </script>";
            if(self::$instance == null){
                self::$instance = new self;
            }
            return self::$instance;

        }

        public function mSelectMapByUseruId($userId){
            $userDTOs = array();
            $sql = "SELECT * FROM map WHERE user_id=?";
            $stmt = $this->connection->prepare($sql);

            $stmt->bind_param('s', $userId);
            $stmt->execute();

            $stmt->bind_result($mid, $uid, $location);
            while($stmt->fetch()){
                $userDTOs[] = new MapDTO($mid, $uid, $location);
            }

            return $userDTOs;
        }
    }
?>

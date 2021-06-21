<?php
    echo "<script> console.log('dbconnector load'); </script>";
    class DBConnector{
        //private static $instance = new DBConnector();
        private static $instance = null; 
        private $connection = null;

        private function __construct(){
            echo "<script> console.log('dbconnector construct'); </script>";            
            $this->connection = new mysqli('localhost', 'iamground', 'iamground', 'DB_iamground');
            if($connection->connect_error){
                die($connection->connect_error);
            }
        }

        public static function getInstance(){
            if(self::$instance == null){                
                self::$instance = new DBConnector();                
            }            
            return self::$instance;
        }

        public function getConnection(){    
            echo "<script> console.log('return connection'); </script>";     
                      
            return $this->connection;
        }

        
    }
?>

<?php
    echo "<script> console.log('mocontroller load'); </script>";
    require_once './model/MoDAO.php';
    class MoController{
        private $dao;
        public $moList;

        public function __construct(){
            echo "<script> console.log('mocontroller construct'); </script>";
            $this->dao = MoDAO::getInstance();                                   
        }

        public function returnView($responseData=null){
            //var_dump($responseData);
            $frontController = new FrontController();
            $frontController->controlView($this->view, $responseData);
        }
        
        public function cSelectMoByMapId($mapId){
            echo "<script> console.log('mo controller cSelectMoByMapId()'); </script>";
            
            $moDTOs = $this->dao->mSelectMoByMapId($mapId);
                       
            if($moDTOs==null){   
                     
                $this->data = 'no mobile object';
                $this->view = 'mapList.php';
                $this->returnView();
                 
            } else {
                
                $this->data = 'select ok';
                $this->moList = $moDTOs; 
                $this->view = 'moList.php';                 
                $this->returnView($moDTOs);
                                   
            }
            
        }

       
    }

    
?>

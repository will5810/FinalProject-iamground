<?php
    echo "<script> console.log('mapcontroller load'); </script>";
    require_once './model/MapDAO.php';
    class MapController{        
        private $dao;

        public function __construct(){
           // echo "<script> console.log('mapcontroller construct'); </script>";
            $this->dao = MapDAO::getInstance();
        }

        public function returnView($responseData=null){
            $frontController = new FrontController();
            $frontController->controlView($this->view, $responseData);
        }

        public function cSelectMapByUserId($userId){
            //echo "<script> console.log(' SelectMap_UserId()'); </script>";

            $mapDTOs = $this->dao->mSelectMapByUseruId($userId);
            
            if($mapDTOs==null){
                $this->data = 'no map';
                $this->view = 'loginForm.php';      // check
                $this->returnView();
            } else {
                $this->data = 'OK';
                
                $this->view = 'mapList.php';
                $this->returnView($mapDTOs);
            }
            
        }


    }


?>

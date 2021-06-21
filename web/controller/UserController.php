<?php
    echo "<script> console.log('usercontroller load'); </script>";
    require_once './model/UserDAO.php';
    class UserController{
        private $dao;
        public function __construct(){
            echo "<script> console.log('usercontroller construct'); </script>";
            $this->dao = UserDAO::getInstance();                                   
        }

        public function returnView(){
            $frontController = new FrontController();
            $frontController->controlView($this->view);
        }
        
        public function login($userId, $userPw){
            echo "<script> console.log('user controller login()'); </script>";
            
            $userDTO = $this->dao->selectById($userId);            
            if($userDTO==null){   
                            
                $this->data = 'no id';
                $this->view = 'loginForm.php';
                $this->returnView(); 
            } else {
                 
                if($userDTO->getUserPw()==$userPw){                     
                    $this->data = 'login ok';
                    session_start();
                    $_SESSION['userId']=$userDTO->getUserId();
                    $_SESSION['userType']=$userDTO->getUserType();
                    $this->view = 'mapList.php';
                    
                    $this->returnView();
                } else {                     
                    $this->data = 'wrong password';
                    $this->view = 'loginForm.php';
                    $this->returnView();
                }
            }
            
        }

       
    }

    
?>

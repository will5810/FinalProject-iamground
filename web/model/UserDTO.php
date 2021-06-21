<?php
    class UserDTO{
        private $userId;
        private $userPw;
        private $userType;

        public function __construct($userId, $userPw, $userType){
            $this->userId = $userId;
            $this->userPw = $userPw;
            $this->userType = $userType;
        }

        public function setUserId($userId){
            $this->userId = $userId;
        }

        public function getUserId(){
            return $this->userId;
        }

        public function setUserPw($userPw){
            $this->userPw = $userPw;
        }

        public function getUserPw(){
            return $this->userPw;
        }

        public function setUserType($userType){
            $this->userType = $userType;
        }

        public function getUserType(){
            return $this->userType;
        }
    }
?>

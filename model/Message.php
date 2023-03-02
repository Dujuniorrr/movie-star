<?php

    class Message {
        private $url;

        public function __construct($url){
            $this->setUrl($url);
        }

        public function set_message($msg, $type, $redirect = "index.php"){
            $_SESSION['msg'] = $msg;
            $_SESSION['type'] = $type;

            if($redirect == 'back'){
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }else{
                header("Location: " . $this->getUrl() . $redirect );
            }
        }

        public function get_message(){
           if(!empty($_SESSION['msg'])){
                return [
                    'msg' => $_SESSION['msg'],
                    'type' => $_SESSION['type']
                ];
           }
           else{
                return false;
           }
        }
        public function clear_message(){
            $_SESSION['msg'] = false;
            $_SESSION['type'] = false;
        }
        public function getUrl() {
            return $this->url;
        }
        
        public function setUrl($url): self {
            $this->url = $url;
            return $this;
        }
}

?>
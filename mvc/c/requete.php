<?php

class Requete
{
    public $control; 
    public $action; 
    public $args;
    
    public $url;
    
    public function __construct()
    {
        $this->url = trim($_SERVER['REQUEST_URI'],"/");
        $this->dispache();
    }
    
    private function dispache()
    {
        $url = explode('/', trim($this->url, "/"));
        session_start();
        $this->control = $_SESSION['control'] = isset($url[0])? ucfirst($url[0]):'';
        $this->action  = isset($url[1])? $url[1]:''; 
        
        $this->args = array();
        for($i=2;$i<count($url);$i++) $this->args[$i-2] = $url[$i];
    }
}

?>
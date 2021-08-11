<?php
use duncan3dc\Laravel\BladeInstance;

class blade
{
    private $blade_directory;
    private $current_blade;
    private $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->blade_directory = config_item('blade_directory');
        $this->current_blade = config_item('blade_default');
        if(config_item('composer_autoload') == false){
            require_once config_item('blade_engine');
        }
    }
    public function setblade($blade){
        $this->current_blade = $load;
        return $this;
    }
    public function view($view, $data = array()){
        $dir = $this->_get_blade_dir();
        $blade = new BladeInstance($dir, APPPATH.'cache/');
        echo $output = $blade->render($view,$data);
        exit();
    }
    public function getCurrentblade(){
        return $this->current_blade;
    }

    public function getbladeUrl(){
        return site_url('blade/'.$this->current_blade.'/');
    }
    private function _get_blade_dir(){
        $dir = rtrim($this->blade_directory,'/');
        $dir = $dir.'/'.$this->current_blade.'/';
        return $dir;
    }
}

<?php

if(!function_exists('cas_url')){
    function cas_url($url){
        $ci = &get_instance();
        $url = ltrim($url,'/');
        return $ci->cas->getCasUrl().$url;
    }
}

function language($language) {
    $ci = &get_instance();
    return $ci->lang->line($language);
}

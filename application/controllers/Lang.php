<?php
class Lang extends CI_Controller
{
    public function vi()
    {
        $this->session->set_userdata(array('lang'=>'vi','locale'=>'vietnamese'));
    }
    public function en()
    {
        $this->session->set_userdata(array('lang'=>'en','locale'=>'english'));
    }    
}
?>
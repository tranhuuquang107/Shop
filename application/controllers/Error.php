<?php
class Error extends CI_Controller
{
    public function index()
    {
        $data['heading']='Hệ thống website ';
        $data['message']='Không có trang nào';
        $this->load->view('errors/html/error_404.php',$data);
    }
}
?>
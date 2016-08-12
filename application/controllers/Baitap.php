<?php
class Baitap extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //....
    }
    public function index()
    {
        echo 'hello';
    }    
    public function baitap1()
    {
       // $dssp=$this->mSanPham->DSSanPham();
       // var_dump($dssp);exit;        
        $this->data['path']='BaiTap/v_bai_tap1';
        $this->load->view('layout/v_layout',$this->data) ;
    }
    public function baitap2()
    {    
        $this->data['title_ung_dung']='baitap2';
        $this->data['path']='BaiTap/v_bai_tap2';
        $this->load->view('layout/v_layout',$this->data) ;       
    }
     public function baitap3()
    {        
        $this->data['title_ung_dung']='baitap3';
        $this->data['path']='BaiTap/v_bai_tap3';
        $this->load->view('layout/v_layout',$this->data) ;
    }
    public function baitap4()
    {
        $this->data['title_ung_dung']='baitap4';
        $this->data['path']='BaiTap/v_bai_tap4';
        $this->load->view('layout/v_layout',$this->data) ;
    }
}
?>  
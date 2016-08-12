<?php
class MY_Controller extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('san_pham/M_san_pham_table','mSanPham');        
        $this->load->model('loai_san_pham/M_loai_san_pham_table','mLoaiSanPham');
        $this->load->model('tin_tuc/M_tin_tuc_table','mTinTuc');
        $this->data['DSLoaiSanPhamMeNu']=$this->mLoaiSanPham->DSLoaiSanPham();
        $this->data['title_ung_dung']='Sản phẩm gỗ';
        if($this->session->userdata('lang'))
            $this->lang->load($this->session->userdata('lang'),$this->session->userdata('locale'));
        else
            $this->lang->load('vi','vietnamese');        
    }
}
?>
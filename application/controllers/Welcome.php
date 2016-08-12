<?php
class Welcome extends MY_Controller {

	public function index()
	{
        $this->data['dssp']=$this->mSanPham->DSSanPhamMoi();  
        $this->data['dsspkm']=$this->mSanPham->DSSanPhamKM();              
        $this->data['path']='welcome_message';
        $this->load->view('layout/v_layout',$this->data);   
	
	}
}
?>
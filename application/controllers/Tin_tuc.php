<?php 
class Tin_tuc extends MY_Controller
{
	public function TinTucMoi()
	{
		$DSTinTuc=$this->mTinTuc->TinTucMoi();
		$this->data['DSTinTuc']=$DSTinTuc;
		$this->data['path']='tin_tuc/v_tin_tuc_moi';
		$this->load->view('layout/v_layout',$this->data);
	}
	public function ChiTietTinTuc()
	{
		$chuoi=$this->uri->segment(2);
		$mang=explode('-',$chuoi);
		$id=array_pop($mang);
		$this->data['CT_TinTuc']=$this->mTinTuc->TinTucID($id);
		$this->data['path']='tin_tuc/v_chi_tiet_tin_tuc';
		$this->load->view('layout/v_layout',$this->data);
	}
}

/* End of file Tin_tuc.php */
/* Location: ./application/controllers/Tin_tuc.php */
?>
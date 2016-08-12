<?php
class Khach_hang extends MY_Controller
{
    public function ThemMatHang()
    {   
        $msl=$this->input->post('masanpham');
        $sl=$this->input->post('soluong');
        $SanPham=$this->mSanPham->SanPhamID($msl);
        if(!$SanPham)
        {
            echo json_encode(array('tsl'=>$this->cart->total_items(),'tt'=>$this->cart->total()));
        }
        else
        {
            $dongia=$SanPham['dongiakhuyenmai']>0?$SanPham['dongiakhuyenmai']:$SanPham['dongia'];
            $data=array(
                'id'=>$msl,
                'qty'=>$sl,
                'price'=>$dongia,
                'name'=>$SanPham['tensanpham']
            );
            $this->cart->insert($data);
            echo json_encode(array('tsl'=>$this->cart->total_items(),'tt'=>$this->cart->total()));
        }
      
    }
    public function ThongTinGioHang()
    {
        if($this->input->post('btnCapNhat')!='')
        {
            $mangarray=array();
           
            foreach($this->cart->contents() as $item)
            {
                 $slMoi=$this->input->post('sl_'.$item['rowid']);
                if($slMoi!=$item['qty'] && $slMoi>=0)
                {
                    $mangarray[]=array('rowid'=>$item['rowid'],'qty'=>$slMoi);
                }
            }
            if($mangarray)
            {
                $this->cart->update($mangarray);
            }
        }
        $this->data['path']='khach_hang/v_ThongTinGioHang';
        $this->load->view('layout/v_layout',$this->data);
    }
    function check_email()
    {
        $this->load->model('khach_hang/M_khach_hang_table');
        // $email = $this->input->post('email');
        $Hoten = $this->input->post('Hoten');
        $where = array('Hoten'=>$Hoten);
        //kiểm tra điều kiện email có tồn tại trong csdl hay không
        echo '<pre>';
        var_dump($this->M_khach_hang_table->check_exists($where));exit;
        if($this->M_khach_hang_table->check_exists($where))
        {
             //trả về thông báo lỗi nếu đã tồn tại email này
         $this->form_validation->set_message(__FUNCTION__, 'Email đã sử dụng');
             return FALSE;
        }
        return TRUE;
    }
    public function DatHang()
    {
        //`Hoten`, `Diachi`, `Dienthoai`, `Diachigiaohang`, `email`
        $this->load->library('form_validation');
        if($this->input->post('btnThem')!='')
        {
           $config = array(
                    array('field' => 'Hoten','label' => 'Họ tên ','rules' => 'required|callback_check_email'),
                    array('field' => 'Diachi','label' => 'Địa chỉ','rules' => 'required'),
                    array('field' => 'Dienthoai','label' => 'Điện thoại','rules' => 'required|numeric'),
                    array('field' => 'Diachigiaohang','label' => 'Địa chỉ giao hàng','rules' => 'required'),
                    array('field' => 'email','label' => 'email','rules' =>'required|valid_email|callback_check_email'));
        $this->form_validation->set_message('required','<span style="color:#ff0000">%s phải nhập dữ liệu</span>');
         $this->form_validation->set_message('valid_email','<span style="color:#ff0000">%s Email không họp lệ%s</span>');
         $this->form_validation->set_message('numeric','<span style="color:#ff0000">%s phải nhập là số</span>');
        $this->form_validation->set_rules($config);
            if($this->form_validation->run())
            {
                $dataKhachHang=$this->input->post(null);
                $this->load->model('khach_hang/M_khach_hang');
                $this->load->model('khach_hang/M_khach_hang_table');
                $this->M_khach_hang->setData($dataKhachHang);
                $dataKhachHang=$this->M_khach_hang->getData();
                $MaKh=$this->M_khach_hang_table->ThemKhachHang($dataKhachHang);
                $SoHD=$this->M_khach_hang_table->ThemDonDatHang(array('ngay_hoadon'=>date('Y-m-d'), 'ma_kh'=>$MaKh, 'trigia_hd'=>$this->cart->total()));
                
                $dataCTDonDatHang=array();
                foreach($this->cart->contents() as $item)
                {
                    $dataCTDonDatHang[]=array('so_hd'=>$SoHD,'masanpham'=>$item['id'],'so_luong'=>$item['qty'],'don_gia'=>$item['price'],'thanh_tien'=>$item['qty']*$item['price']);
                }               
                $this->M_khach_hang_table->ThemChiTietHoaDon($dataCTDonDatHang);
                $this->cart->destroy();
                redirect('khach-hang/thong-tin-don-dat-hang/'.$SoHD);

            }
        }
        $this->data['path']='khach_hang/v_ThemKhachHang';
        $this->load->view('layout/v_layout',$this->data);
    }
    public function ThongTinDonDatHang()
	{
		$SoHD=$this->uri->segment(3);
		if(!$SoHD)
			redirect(site_url());
		else
		{
			$this->load->model('khach_hang/M_khach_hang_table');
			$DSDonDatHang=$this->M_khach_hang_table->HoaDonKhachHang($SoHD);
			if(!$DSDonDatHang)
				redirect(site_url());
			else
			{
				$this->gui_mail($DSDonDatHang);
				$this->data['DonDatHang']=$DSDonDatHang;
				$this->data['path']='khach_hang/v_thong_tin_don_dat_hang';
				$this->load->view('layout/v_layout',$this->data);
			}
		}
	}
    public function gui_mail($don_hang)
    {        
        if(!$don_hang)
            redirect(site_url());
        //cau hinh mail
            $this->load->library('email');
        	$config['protocol'] = 'smtp';
        	$config['smtp_host'] = 'ssl://smtp.gmail.com';
        	$config['smtp_port'] = '465';
        	$config['smtp_timeout'] = '7';
        	$config['smtp_user'] = "tranhuuquang107@gmail.com"; //gmail lam mail server
        	$config['smtp_pass'] = "Quang272405423"; //password gmail
        	$config['charset'] = 'utf-8';
        	$config['newline'] = "\r\n";
        	$config['mailtype'] = 'html'; // or html
        	$config['validation'] = TRUE; // bool whether to validate email or not
        	
        	$this->email->initialize($config);
        	$this->email->from('tranhuuquang107@gmail.com','nhan vien Cty ABC'); //mail nguoi gui
        	$this->email->to('tranhuuquang107@gmail.com');
        	$this->email->subject('Đơn đặt hàng của khách hàng');
        	$this->email->message($this->tao_noi_dung($don_hang));
        	$this->email->send();  
    }
    public function tao_noi_dung($don_hang)
    {
        $noi_dung='<p>Mã khách hàng'.$don_hang[0]['MaKH'].'</p>';
		$noi_dung.='<p>Tên khách hàng: '.$don_hang[0]['Hoten'] .'</p>';
		$noi_dung.='<p>Địa chỉ giao hàng: '.$don_hang[0]['Diachigiaohang'].'</p>';
		$noi_dung.='<p>Email: '. $don_hang[0]['email'] .'</p>';
		$noi_dung.='<p>Điện thoại: '. $don_hang[0]['Dienthoai'] .'</p>';
  
		$noi_dung.='<table>
			<thead>
			  <tr>
				<th>STT</th>
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Đơn giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
			  </tr>
			</thead>
			<tbody>';
			$i=1;
			foreach($don_hang as $item)
            {
				$noi_dung.='<tr>';
				$noi_dung.='<th>'.$i.'</th>';
				$noi_dung.='<td>'.$item['masanpham'].'</td>';
				$noi_dung.='<td>'.$item['tensanpham'].'</td>';
				$noi_dung.='<td>'.$item['don_gia'].'</td>';
				$noi_dung.='<td>'.$item['so_luong'].'</td>';
				$noi_dung.='<td>'.$item['thanh_tien'].'</td>';
                $noi_dung.='</tr>';

			     $i++;
			}
        $noi_dung.='</tbody>';
        $noi_dung.='</table>';
        return $noi_dung;        
    }
    
}
?>
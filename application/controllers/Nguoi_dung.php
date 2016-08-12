<?php
class Nguoi_dung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('nguoi_dung/M_nguoi_dung','MND');
    }
    public function DSNguoiDung()
    {
        $dsnguoidung=$this->MND->DSNguoiDung();
        $data['dsnguoidung']=$dsnguoidung;
        $data['path']='nguoi_dung/v_nguoi_dung';
        $this->load->view('layout/v_layoutAdmin',$data);               
    }  
    public function DangNhap()
    {
        
        $this->load->library('form_validation');
        if($this->input->post('btnNhap')!='')
        {
           $config = array(
                    array('field' => 'tendn','label' => 'Tên Đăng nhập','rules' => 'required'),
                    array('field' => 'mat_khau','label' => 'Mật khẩu','rules' => 'required') 
                 );
            
        $this->form_validation->set_message('required','<span style="color:#ff0000">%s phải nhập dữ liệu</span>');         
        $this->form_validation->set_rules($config);
            if($this->form_validation->run())
            {   
                $WordSV=$this->session->userdata('captch');
                $timeSV=$this->session->userdata('time');
                $ipSV=$this->session->userdata('ip');
                $timewait=time()-$timeSV;
                $tendangnhap=$this->input->post('tendn');
                $matkhau=$this->input->post('mat_khau'); 
                if($timewait<300&& $this->input->ip_address()==$ipSV && $this->input->post('MXT')==$WordSV )
                {
                    $NguoiDung=$this->MND->DangNhapNguoiDung($tendangnhap,$matkhau);
                    
                    if($NguoiDung)
                    {
                        $this->session->unset_userdata(array('captch','time','ip'));
                        $ArrTTNguoiDung=array(
                                        'tennguoidung'=>$NguoiDung['ten_nguoi_dung'],                                    
                                        'role'=>$NguoiDung['ma_loai_nguoi_dung'],
                        );
                        $this->session->set_userdata($ArrTTNguoiDung);
                        redirect('quan-tri/he-thong');
                    }   
                    else
                        $data['error']='Đăng nhập không thành công';
                }
                else
                    $data['error']='Captcha không hợp lệ';
            }
          
        }
        $this->load->helper('captcha');
        $vals = array(
        //'word'          => 'Random word',
        'img_path'      => './public/captcha/',
        'img_url'       => base_url().'public/captcha',
        'font_path'     => './public/fonts/arial.ttf',
        'img_width'     => '150',
        'img_height'    => 30,
        'expiration'    => 7200,
        'word_length'   => 4,
        'font_size'     => 16,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789',

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40))
        );
        
        $cap = create_captcha($vals);
        $mangTTCaptcha=array('captch'=>$cap['word'],'time'=>$cap['time'],'ip'=>$this->input->ip_address());
        $this->session->set_userdata($mangTTCaptcha);        
        $data['images']=$cap;    
        $data['path']='nguoi_dung/v_dang_nhap';
        $this->load->view('layout/v_layoutAdmin',$data);
        if($this->session->userdata('tennguoidung'))
            redirect('quan-tri/nguoi-dung/dang-xuat');
    }
    public function HeThong()
    {
        if($this->session->userdata('tennguoidung'))
        {
            $data['path']='nguoi_dung/v_he_thong';
            $this->load->view('layout/v_layoutAdmin',$data);
        }
        else
            redirect('quan-tri/nguoi-dung/dang-nhap');
    }
    public function DangXuat()
    {
        $this->session->unset_userdata(array('tennguoidung','role'));
        redirect('quan-tri/nguoi-dung/dang-nhap');
    }
}
?>
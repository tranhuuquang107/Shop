<?php
class San_pham extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();       
    }   
    public function XoaSanPham()
    {
        $msp=$this->input->post('masanpham');
        $kq=$this->mSanPham->XoaSanPham($msp);
        echo json_encode(array('kq'=>$kq));
    }
    public function ChiTietSanPham()
    {   $chuoi=$this->uri->segment(3);
        if(!$chuoi)
            redirect(site_url());        
        $mang=explode('-',$chuoi);
        $chuoimang=array_pop($mang);
         $chuoimang=intval($chuoimang);
        $ChiTietSanPham=$this->mSanPham->SanPhamID($chuoimang); 
            if(!$ChiTietSanPham)
            {
                $this->session->set_flashdata('LOI','không tồn tại sản phẩm');
            }
        $SanPhamCungLoai=$this->mSanPham->SanPhamCungLoai($chuoimang,$ChiTietSanPham['maloai']);
        if($SanPhamCungLoai)
            $this->data['DSSanPham']=$SanPhamCungLoai;   
        $this->data['ChiTiet']=$ChiTietSanPham;
        $this->data['title_ung_dung']=$this->data['ChiTiet']['tensanpham'];    
        $this->data['path']='san_pham/v_ChiTietSanPham';
        $this->load->view('layout/v_layout',$this->data);
    }     
    public function SanPhamLoaiCon()
    {
       $chuoicha=$this->uri->segment(2);       
       $Loaicha=$this->mLoaiSanPham->SanPhamTheoTenURL($chuoicha); 
       if(!$Loaicha)
            redirect(site_url());                 
       $chuoicon=$this->uri->segment(3);
       $LoaiCon=$this->mLoaiSanPham->SanPhamConTheoTenURL($Loaicha['maloai'],$chuoicon);
        if(!$LoaiCon)
            redirect(site_url());
       $DSSanPham=$this->mSanPham->SanPhamTheoLoaiCon($LoaiCon['maloai']);
       $this->data['DSSanPham']=$DSSanPham;
       $this->data['LoaiCha']=$Loaicha;
       $this->data['LoaiCon']=$LoaiCon;
       $this->data['path']='san_pham/v_DocDSSanPhamCon.php';
       $this->load->view('layout/v_layout',$this->data);
    }
    public function SanPhamLoaiCha()
    {
       $chuoiCha=$this->uri->segment(2);
       $LoaiCha=$this->mLoaiSanPham->SanPhamTheoTenURL($chuoiCha);
       if(!$LoaiCha)
            redirect(site_url());      
       $DSSanPham=$this->mSanPham->DSSanPhamLoaiCha($LoaiCha['maloai']);      
       $this->data['DSSanPham']=$DSSanPham;
       $this->data['LoaiCha']=$LoaiCha;
       $this->data['path']='san_pham/v_DocDSSanPhamCon.php';
       $this->load->view('layout/v_layout',$this->data);
    }
    public function DSSachSanPham()
    {
      
        $config['base_url'] = site_url().'/san-pham/';
        $config['total_rows'] = $this->mSanPham->TongSanPham();
        $config['per_page'] = 12;
        $config['uri_segment'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['suffix'] = '.html';
        $config['full_tag_open'] = '<div class="ui-grid-d" align="center">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = "|< ";
        $config['last_link'] = " >|";
        $config['first_tag_open'] = '';
        $config['first_tag_close'] = '';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['next_tag_open'] = '';
        $config['next_tag_close'] = '';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['cur_tag_open'] = '<div class="ui-shadow ui-btn ui-btn-b ui-corner-all ui-m ui-btn-inline" >';
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $config['attributes'] = array('class' => 'ui-shadow ui-btn ui-corner-all ui-m ui-btn-inline ');
        $this->load->library('pagination',$config);       
        $page=$this->uri->segment(2)?$this->uri->segment(2):1;
        $start=($page-1)*$config['per_page']; 
        $this->data['DSSanPham']=$this->mSanPham->DSSanPhamPhanTrang($start,$config['per_page']); 
        $this->data['link']=$this->pagination->create_links();     
        $this->data['path']='san_pham/v_DocDSSanPhamCon.php';
        $this->load->view('layout/v_layout',$this->data);
    }
    public function ThemSanPham()
    {
        $this->load->library('form_validation');
        if($this->input->post('them')!='')
        {
           $config = array(
                    array('field' => 'tensanpham','label' => 'Tên sản phẩm','rules' => 'required'),
                    array('field' => 'tensanphamurl','label' => 'Tên url','rules' => 'required'),
                    array('field' => 'diengiaitomtat','label' => 'Tóm tắt Sp','rules' => 'required|min_length[15]'),
                    array('field' => 'diengiai','label' => 'Chi tiết SP','rules' => 'required|min_length[50]'),
                    array('field' => 'dongia','label' => 'Đơn giá','rules' => 'required|numeric'),
                            
                 );
        $this->form_validation->set_message('required','<span style="color:#ff0000">%s phải nhập dữ liệu</span>');
         $this->form_validation->set_message('min_length','<span style="color:#ff0000">%s phải nhập ít nhất%s</span>');
         $this->form_validation->set_message('numeric','<span style="color:#ff0000">%s phải nhập là số</span>');
        $this->form_validation->set_rules($config);
            if($this->form_validation->run())
            {
                $config['upload_path']          = './public/tam1';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('hinh'))
                {
                        $this->data['error'] = $this->upload->display_errors();                      
                }
                else
                {

                        $data = $this->upload->data();                       
                        $TenHinh=$data['file_name'];
                        
                        $config1['image_library'] ='gd2';
                        $config1['source_image'] ='./public/tam1/'.$TenHinh;
                        $config1['wm_text'] ='Hello';
                        $config1['wm_type'] ='text';
                        $config1['wm_font_path'] ='./public/fonts/arial.ttf';
                        $config1['wm_font_size'] ='30';
                        $config1['wm_font_color'] ='BCBCBC';
                        $config1['wm_vrt_alignment'] ='bottom';
                        $config1['wm_hor_alignment'] ='center';                       
                        $this->load->library('image_lib',$config1);
                        $this->image_lib->watermark(); 
                        $this->image_lib->clear();
                        $data=$this->input->post(null);
                        $data['hinh']=$TenHinh;
                        $this->load->model('san_pham/M_san_pham');
                        $this->M_san_pham->setData($data);
                        $data=$this->M_san_pham->getData();
                        $kq=$this->mSanPham->ThemSanPham($data);
                        if($kq)
                        {
                            $this->session->set_flashdata('mss','thêm thành công');
                            echo '<meta http-equiv="refresh" content="0;URL=\''.site_url('quan-tri/san-pham/them-san-pham').'\'" />';
                        }
                        else
                            $this->data['error']='Thêm không thành công';
                }              
            }
        }
        $this->data['DSLoaiSanPhamSelect']=$this->mLoaiSanPham->DSLoaiSanPham();
        $this->data['path']='san_pham/v_them_san_pham';
        $this->load->view('layout/v_layoutAdmin',$this->data);
    }
    public function DanhSachSanphamAdmin()
    {
        $config['base_url'] = site_url().'quan-tri/san-pham/danh-sach-san-pham';
        $config['total_rows'] = $this->mSanPham->TongSanPham();
        $config['per_page'] = 12;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        $config['suffix'] = '.html';
        $config['full_tag_open'] = '<div class="ui-grid-d" align="center">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = "|< ";
        $config['last_link'] = " >|";
        $config['first_tag_open'] = '';
        $config['first_tag_close'] = '';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['next_tag_open'] = '';
        $config['next_tag_close'] = '';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['cur_tag_open'] = '<div class="ui-shadow ui-btn ui-btn-b ui-corner-all ui-m ui-btn-inline" >';
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $config['attributes'] = array('class' => 'ui-shadow ui-btn ui-corner-all ui-m ui-btn-inline ');      
        $this->load->library('pagination',$config);       
        $page=$this->uri->segment(4)?$this->uri->segment(4):1;
        $start=($page-1)*$config['per_page']; 
        $this->data['DSSanPham']=$this->mSanPham->DSSanPhamPhanTrang($start,$config['per_page']); 
        $this->data['link']=$this->pagination->create_links(); 
        $this->data['path']='san_pham/v_DocDSSanPhamAdmin';
        $this->load->view('layout/v_layoutAdmin',$this->data);
    }
    public function CapNhatSanPham()
    {
        $msp=$this->uri->segment(4);
        if(!$msp)
            redirect(site_url());
        $SanPham=$this->mSanPham->SanPhamID($msp);
        if(!$SanPham)
            redirect(site_url());
        $this->load->library('form_validation');
        if($this->input->post('btnCapNhat')!='')
        {
           $config = array(
                    array('field' => 'tensanpham','label' => 'Tên sản phẩm','rules' => 'required'),
                    array('field' => 'tensanphamurl','label' => 'Tên url','rules' => 'required'),
                    array('field' => 'diengiaitomtat','label' => 'Tóm tắt Sp','rules' => 'required|min_length[15]'),
                    array('field' => 'diengiai','label' => 'Chi tiết SP','rules' => 'required|min_length[50]'),
                    array('field' => 'dongia','label' => 'Đơn giá','rules' => 'required|numeric'),
                            
                 );
        $this->form_validation->set_message('required','<span style="color:#ff0000">%s phải nhập dữ liệu</span>');
         $this->form_validation->set_message('min_length','<span style="color:#ff0000">%s phải nhập ít nhất%s</span>');
         $this->form_validation->set_message('numeric','<span style="color:#ff0000">%s phải nhập là số</span>');
        $this->form_validation->set_rules($config);
            if($this->form_validation->run())
            {
                $config['upload_path']          = './public/tam1/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('hinh'))
                {
                        $this->data['error'] = $this->upload->display_errors();                      
                }
                else
                {
                    $data = $this->upload->data();                
                    $TenHinh=$data['file_name'];                     
                    $data=$this->input->post(null);
                    $config1['image_library'] ='gd2';
                    $config1['source_image'] ='./public/tam1/'.$TenHinh;
                    $config1['wm_text'] ='Hello';
                    $config1['wm_type'] ='text';
                    $config1['wm_font_path'] ='./public/fonts/arial.ttf';
                    $config1['wm_font_size'] ='30';
                    $config1['wm_font_color'] ='BCBCBC';
                    $config1['wm_vrt_alignment'] ='bottom';
                    $config1['wm_hor_alignment'] ='center';                       
                    $this->load->library('image_lib',$config1);
                    $this->image_lib->watermark(); 
                    $this->image_lib->clear();                    
                    $data['hinh']=$TenHinh;
                    $data['masanpham']=$msp;
                    $this->load->model('san_pham/M_san_pham');
                    $this->M_san_pham->setData($data);
                    $data=$this->M_san_pham->getData();
                    $kq=$this->mSanPham->CapNhatSanPham($data);
                    if($kq)
                    {
                        $this->session->set_flashdata('mss','cập nhật thành công');
                        echo '<meta http-equiv="refresh" content="0;URL=\''.site_url('quan-tri/san-pham/cap-nhat-san-pham/'.$SanPham['masanpham']).'\'" />';
                    }
                    else
                        $this->data['error']='cập nhật thành công';
                }              
            }
        }            
        $this->data['SanPham']=$SanPham;
        $this->data['DSLoaiSanPhamSelect']=$this->mLoaiSanPham->DSLoaiSanPham();
       $this->data['path']='san_pham/v_Capnhatsanpham';
       $this->load->view('layout/v_layoutAdmin',$this->data);
    }
    
}
?>
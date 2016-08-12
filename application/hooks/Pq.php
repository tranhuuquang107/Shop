<?php
class PhanQuyen
{
    var $CI;
    public function Ham()
    {
       $this->CI=&get_instance();
       $uri=uri_string();
        if(strpos($uri,'san-pham')!==false || strpos($uri,'san_pham')!==false)
            $this->CheckRouteSanPham($uri);
    }
    public function CheckRouteSanPham($uri)
    {
        $vitri;
        $route=array('San_pham/CapNhatSanPham','quan-tri/san-pham/cap-nhat-san-pham','San_pham/XoaSanPham','San_pham/ThemSanPham','quan-tri/san-pham/danh-sach-san-pham','quan-tri/san-pham/xoa-san-pham','quan-tri/san-pham/them-san-pham');
        foreach($route as $r)
        {
            $vitri=strpos($uri,$r);
            if($vitri!==false)
            {
                break;
            }
        }
        if($vitri!==false)
        {
            if($this->CI->session->userdata('role')=='')
            {
                redirect('Error');
            }
            else if(!$this->CheckSanPham($this->CI->session->userdata('role'),$uri))
            {
                redirect('Error');
            }
        }
    }
    private function CheckSanPham($role,$uri)
    {
        $kq=false;
        $mangSanPhamRoute=array(
                '1'=>array('San_pham/CapNhatSanPham','quan-tri/san-pham/cap-nhat-san-pham','San_pham/XoaSanPham','San_pham/DanhSachSanphamAdmin','San_pham/ThemSanPham','quan-tri/san-pham/danh-sach-san-pham','quan-tri/san-pham/xoa-san-pham','quan-tri/san-pham/them-san-pham'),
                '2'=>array('San_pham/CapNhatSanPham','quan-tri/san-pham/cap-nhat-san-pham','San_pham/XoaSanPham','San_pham/DanhSachSanphamAdmin','San_pham/ThemSanPham','quan-tri/san-pham/danh-sach-san-pham','quan-tri/san-pham/xoa-san-pham','quan-tri/san-pham/them-san-pham'),
                '3'=>array('San_pham/CapNhatSanPham','quan-tri/san-pham/cap-nhat-san-pham','San_pham/XoaSanPham','San_pham/DanhSachSanphamAdmin','San_pham/ThemSanPham','quan-tri/san-pham/danh-sach-san-pham','quan-tri/san-pham/xoa-san-pham','quan-tri/san-pham/them-san-pham'),
                '4'=>array('San_pham/CapNhatSanPham','quan-tri/san-pham/cap-nhat-san-pham','San_pham/XoaSanPham','San_pham/DanhSachSanphamAdmin','San_pham/ThemSanPham','quan-tri/san-pham/danh-sach-san-pham','quan-tri/san-pham/xoa-san-pham','quan-tri/san-pham/them-san-pham'),
                '5'=>array('San_pham/CapNhatSanPham','quan-tri/san-pham/cap-nhat-san-pham','San_pham/XoaSanPham','San_pham/DanhSachSanphamAdmin','San_pham/ThemSanPham','quan-tri/san-pham/danh-sach-san-pham','quan-tri/san-pham/xoa-san-pham','quan-tri/san-pham/them-san-pham'),
        );
        foreach($mangSanPhamRoute as $key => $Route)
        {
            if($role==$key)
            {
                foreach($Route as $r)
                {
                    $vitri=strpos($uri,$r);
                    if($vitri!==false)
                    {
                        $kq=true;
                        break;
                    }
                }
                break;
            }
        }
        return $kq;
    } 
    // end sản phẩm

}
?>
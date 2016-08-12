<?php
class M_khach_hang_table extends CI_Model
{
    public function ThemKhachHang($data)
    {
        $this->db->insert('khach_hang',$data);
        return $this->db->insert_id();
    }
    public function ThemDonDatHang($data)
    {
        $this->db->insert('hoa_don',$data);
        return $this->db->insert_id();
    }
    public function ThemChiTietHoaDon($data)
    {
        return $this->db->insert_batch('ct_hoa_don',$data);
        
    }
   public function HoaDonKhachHang($sohd)
    {
        $chuoiSQL='SELECT `MaKH`, `Hoten`, `Diachi`, `Dienthoai`, `Diachigiaohang`, `email`, `hoa_don`.`so_hd`, `ngay_hoadon`, `ma_kh`, `trigia_hd` , `ct_hoa_don`.`masanpham`,`tensanpham`,`hinh`,`so_luong`, `don_gia`, `thanh_tien` FROM `khach_hang` INNER JOIN `hoa_don` ON `hoa_don`.`ma_kh`=`khach_hang`.`MaKH` INNER JOIN `ct_hoa_don` ON `ct_hoa_don`.`so_hd`=`hoa_don`.`so_hd` INNER JOIN `san_pham` ON `san_pham`.`masanpham`=`ct_hoa_don`.`masanpham` WHERE `hoa_don`.`so_hd`=?';
        $query=$this->db->query($chuoiSQL,array($sohd));
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
    public function check_exists($where)
    {
        $this->db->select('email,Hoten');
        $this->db->where($where);
        $query = $this->db->get('khach_hang');      
        if($query->num_rows() > 0)
            return $query->result_array();        
        return FALSE;
         
    }
   

}
?>
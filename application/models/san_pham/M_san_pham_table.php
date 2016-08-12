<?php
class M_san_pham_table extends CI_Model
{
    public function DSSanPhamMoi()
    {
        $this->db->where(array('sanphammoi'=>1));
        $query=$this->db->get('san_pham');
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
    public function DSSanPhamKM()
    {
        $this->db->where(array('dongiakhuyenmai >'=>0));
        $query=$this->db->get('san_pham');
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
     public function DSSanPhamPhanTrang($start,$limit)
    {
        $this->db->limit($limit,$start);
        $query=$this->db->get('san_pham');
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
    public function SanPhamID($msp)
    {
        $this->db->where(array('masanpham'=>$msp));
        $query=$this->db->get('san_pham');
        if($query->num_rows()>0)
            return $query->row_array();
        return false;
    }
    public function SanPhamCungLoai($msp,$maloai)
    {
        $this->db->where(array('masanpham !='=>$msp,'maloai'=>$maloai));
        $query=$this->db->get('san_pham');
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
     public function SanPhamTheoLoaiCon($maloai)
    {
        $this->db->where(array('maloai'=>$maloai));
        $query=$this->db->get('san_pham');
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
    public function DSSanPhamLoaiCha($maloaicha)
    {
       $query= $this->db->query('SELECT `masanpham`, `tensanpham`, `tensanphamurl`, `diengiaitomtat`, `diengiai`, `dongia`, `dongiakhuyenmai`, `hinh`, `ngaycapnhat`, `san_pham`.`maloai`, `sanphammoi`, `maloaicha` FROM `san_pham` INNER JOIN `loai_san_pham` ON `san_pham`.`maloai`=`loai_san_pham`.`maloai`WHERE `maloaicha`=?',array($maloaicha));        
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
    public function SanPhamBanChay()
    {
        $this->db->select('ct_hoa_don.masanpham,sum(so_luong)');
        $this->db->group_by('ct_hoa_don.masanpmha');
        $this->db->from('san_pham');
        $this->join('ct_hoa_don','san_pham_masanpham=ct_hoa_don.masanpham');
        $this->db->order_by('sum(so_luong) desc');
        $this->db->limit(10,0);
        $query=$this->db->get();
         if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
    public function TongSanPham()
    {
        return $this->db->count_all('san_pham');
    }
     public function ThemSanPham($data)
    {
        $this->db->cache_delete_all();
        return $this->db->insert('san_pham',$data);
    }
    public function CapNhatSanPham($data)
    {
        $this->db->cache_delete_all();
       return $this->db->update('san_pham',$data,array('masanpham'=>$data['masanpham']));
    }
    public function XoaSanPham($ma)
    {
        $this->db->cache_delete_all();
        $this->db->where(array('masanpham'=>$ma));
        return $this->db->delete('san_pham');
    }    
}
?>
<?php
class M_loai_san_pham_table extends CI_Model
{
    public function DSLoaiSanPham()
    {
        $this->db->where(array('maloaicha'=>0));
        $query=$this->db->get('loai_san_pham');
        $MangLoaiCha=array();
        if($query->num_rows()>0)
        {
            foreach($query->result_array() as $lc)
            {
                $MangLoaiCha[]=array($lc,$this->DSSanPhamCon($lc['maloai']));
            }
        } 
        return $MangLoaiCha;       
    }
    public function DSSanPhamCon($maloaicha)
    {
        $this->db->where(array('maloaicha'=>$maloaicha));
        $query=$this->db->get('loai_san_pham');
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
    public function SanPhamTheoTenURL($tenurl)
    {
        $this->db->where(array('tenloaiurl'=>$tenurl));
        $query=$this->db->get('loai_san_pham');
        if($query->num_rows()>0)
            return $query->row_array();
        return false;
    }
    public function SanPhamConTheoTenURL($maloai,$tenurl)
    {
        $this->db->where(array('tenloaiurl'=>$tenurl,'maloaicha'=>$maloai));
        $query=$this->db->get('loai_san_pham');
        if($query->num_rows()>0)
            return $query->row_array();
        return false;
    }
}
?>
<?php
class M_nguoi_dung extends CI_Model
{
    public function DSNguoiDung()
    {
        $query=$this->db->get('nguoi_dung');
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
    public function NguoiDungID($ma)
    {
        $query=$this->db->query('select * from nguoi_dung where ma_nguoi_dung=?',array($ma));
        if($query->num_rows()>0)
            return $query->row_array();
        return false;
    }
     public function DangNhapNguoiDung($tendn,$matkhau)
    {
        $this->db->where(array('tendn'=>$tendn,'mat_khau'=>$matkhau));
        $query=$this->db->get('nguoi_dung');
        if($query->num_rows()>0)
            return $query->row_array();
        return false;
    }
    public function ThemNguoiDung($data)
    {
        return $this->db->insert('nguoi_dung',$data);
    }
    public function CapNhatNguoiDung($data)
    {
       return $this->db->update('nguoi_dung',$data,array('ma_nguoi_dung'=>$data['ma_nguoi_dung']));
    }
    public function XoaNguoiDung($ma)
    {
        $this->db->where(array('ma_nguoi_dung'=>$ma));
        return $this->db->delete('nguoi_dung');
    }
}
?>
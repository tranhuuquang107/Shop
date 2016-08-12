<?php
class M_tin_tuc_table extends CI_Model 
{
	public function TinTucMoi()
	{
		$this->db->where(array('tin_tuc_moi'=>1));
		$query=$this->db->get('tin_tuc');
		if($query->num_rows()>0)
			return $query->result_array();
		return false;
	}
	public function TinTucID($id)
	{
		$this->db->where(array('matintuc'=>$id));
		$query=$this->db->get('tin_tuc');
		if($query->num_rows()>0)
			return $query->row_array();
		return false;
	}
}
?>
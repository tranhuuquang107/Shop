<?php
class M_san_pham extends CI_Model
{
    private $masanpham, $tensanpham , $tensanphamurl , $diengiaitomtat , $diengiai , $dongia , $dongiakhuyenmai , $hinh ,$ngaycapnhat ,$maloai , $sanphammoi;
    public function setData($data)
    {
        $this->masanpham=isset($data['masanpham'])?$data['masanpham']:'';
        $this->tensanpham=isset($data['tensanpham'])?$data['tensanpham']:'';
        $this->tensanphamurl=isset($data['tensanphamurl'])?$data['tensanphamurl']:'' ;
        $this->diengiaitomtat=isset($data['diengiaitomtat'])?$data['diengiaitomtat']:'';
        $this->diengiai=isset($data['diengiai'])?$data['diengiai']:'';
        $this->dongia=isset($data['dongia'])?$data['dongia']:'';
        $this->dongiakhuyenmai=isset($data['dongiakhuyenmai'])?$data['dongiakhuyenmai']:'';
        $this->hinh=isset($data['hinh'])?$data['hinh']:'';
        $this->ngaycapnhat=isset($data['ngaycapnhat'])?$data['ngaycapnhat']:'';
        $this->maloai=isset($data['maloai'])?$data['maloai']:'';
        $this->sanphammoi=isset($data['sanphammoi'])?$data['sanphammoi']:0;
    }
    public function getData()
    {
       $data=array( 'masanpham'=>$this->masanpham,
        'tensanpham '=>$this-> tensanpham,
        'tensanphamurl '=>$this-> tensanphamurl,
        'diengiaitomtat '=>$this-> diengiaitomtat,
        'diengiai '=>$this-> diengiai,
        'dongia '=>$this-> dongia,
        'dongiakhuyenmai '=>$this-> dongiakhuyenmai,
        'hinh '=>$this->hinh,
        'ngaycapnhat '=>$this->ngaycapnhat,
        'maloai '=>$this-> maloai,
        'sanphammoi'=>$this->sanphammoi);
        return $data;
    }
}
?>
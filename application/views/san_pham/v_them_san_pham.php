<div role="main" class="ui-content jqm-content">
<script src="<?php echo base_url('public')?>/ckeditor/ckeditor.js"></script>
<h3>Nhập sản phẩm mới</h3>
<?php
$this->load->helper('form');
echo '<h5 align="center" style="color:#0000ff">'.$this->session->flashdata('mss').'</h5>';
if(isset($error))
    echo '<span style="color:#ff0000">'.$error.'</span>';
//echo validation_errors();
echo form_open_multipart('quan-tri/san-pham/them-san-pham',"data-ajax='false'")
?>
<div class="ui-field-contain">
    <label for="tensanpham">Tên sản phẩm:</label>
    <?php
        $data=array(
            'name'=>'tensanpham',
            'id'=>'tensanpham',
            'value'=>set_value('tensanpham',''),
            'placeholder'=>'Nhập tên sản phẩm',
            'type'=>'text'
        );
        echo form_error('tensanpham');
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="tensanphamurl">Tên URL:</label>
    <?php
        $data=array(
            'name'=>'tensanphamurl',
            'id'=>'tensanphamurl',
            'value'=>set_value('tensanphamurl',''),
            'placeholder'=>'Nhập tên URL',
            'type'=>'text'
        );
        echo form_error('tensanphamurl');
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="dongia">Đơn giá:</label>
    <?php
        $data=array(
            'name'=>'dongia',
            'id'=>'dongia',
            'value'=>set_value('dongia',''),
            'placeholder'=>'Nhập đơn giá',
            'type'=>'number'
        );
        echo form_error('dongia');
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="dongiakhuyenmai">Đơn giá KM:</label>
    <?php
        $data=array(
            'name'=>'dongiakhuyenmai',
            'id'=>'dongiakhuyenmai',
            'value'=>set_value('dongiakhuyenmai',''),
            'placeholder'=>'Nhập đơn giá KM',
            'type'=>'number'
        );
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="hinh">Hình:</label>
    <?php
        $data=array(
            'name'=>'hinh',
            'id'=>'hinh',           
            'placeholder'=>'Nhập đơn giá KM',
            'type'=>'file'
        );
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="maloai">Loại sản phẩm:</label>
    <select name="maloai">
    <?php    
    if(isset($DSLoaiSanPhamSelect))
     {
        foreach($DSLoaiSanPhamSelect as $itemlc)
        {
            $LoaiCha=$itemlc[0];
            $DSLoaiCon=$itemlc[1];
          echo '<optgroup label="'.$LoaiCha['tenloai'].'">'; 
          if($DSLoaiCon)
          {
            foreach($DSLoaiCon as $item)
            {
                 echo '<option value="'.$item['maloai'].'"'.set_select('maloai',$item['maloai']).'>'.$item['tenloai'].'</option>';
            }
          }               
          echo '</optgroup>';
        }
     }
     ?>
    </select>
    
</div>

<div class="ui-field-contain">
    <label for="ngaycapnhat">Ngày cập nhật:</label>
    <?php
        $data=array(
            'name'=>'ngaycapnhat',
            'id'=>'ngaycapnhat',
            'value'=>set_value('ngaycapnhat',date('Y-m-d')),            
            'type'=>'date'
        );
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="sanphammoi">Sản phẩm mới:</label>
    <?php
        echo form_checkbox('sanphammoi',1,set_checkbox('sanphammoi',1,true));
    ?>
</div>

<div class="ui-field-contain">
    <label for="diengiaitomtat">Chi tiết tóm tắt:</label>
    <?php
        $data=array(
            'name'=>'diengiaitomtat',
            'id'=>'diengiaitomtat',
            'value'=>set_value('diengiaitomtat',''),
        );
         echo form_error('diengiaitomtat');
        echo form_textarea($data);
    ?>
</div>
<div class="ui-field-contain">
    <label for="diengiai">Chi tiết:</label>
</div>        
<div class="ui-field-contain">    
    <?php
        $data=array(
            'name'=>'diengiai',
            'id'=>'diengiai',
            'value'=>set_value('diengiai',''),
            'class'=>'ckeditor'            
        );
         echo form_error('diengiai');
        echo form_textarea($data);
    ?>
</div>
<div class="ui-field-contain">    
    <?php
       echo form_submit('them','Thêm');
    ?>
</div>
<?php
echo form_close();
?>
</div>
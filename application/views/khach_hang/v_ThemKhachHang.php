<div role="main" class="ui-content jqm-content">
<h3>Nhập sản phẩm mới</h3>
<?php
$this->load->helper('form');
echo '<h5 align="center" style="color:#0000ff">'.$this->session->flashdata('mss').'</h5>';
if(isset($error))
    echo '<span style="color:#ff0000">'.$error.'</span>';
//echo validation_errors();
echo form_open('khach-hang/dat-hang','data-ajax="false"')
?>
<div class="ui-field-contain">
    <label for="Hoten">Tên KH:</label>
    <?php
        $data=array(
            'name'=>'Hoten',
            'id'=>'Hoten',
            'value'=>set_value('Hoten',''),
            'placeholder'=>'Nhập tên',
            'type'=>'text'
        );
        echo form_error('Hoten');
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="Diachi">Địa chỉ:</label>
    <?php
        $data=array(
            'name'=>'Diachi',
            'id'=>'Diachi',
            'value'=>set_value('Diachi',''),
            'placeholder'=>'Nhập địa chỉ',
            'type'=>'number'
        );
        echo form_error('Diachi');
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="Dienthoai">Điện thoại:</label>
    <?php
        $data=array(
            'name'=>'Dienthoai',
            'id'=>'Dienthoai',
            'value'=>set_value('Dienthoai',''),
            'placeholder'=>'Nhập số điện thoại',
            'type'=>'text'
        );
        echo form_error('Dienthoai');
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="Diachigiaohang">Địa chỉ giao hàng:</label>
    <?php
        $data=array(
            'name'=>'Diachigiaohang',
            'id'=>'Diachigiaohang',
            'value'=>set_value('Diachigiaohang',''),
            'placeholder'=>'Nhập địa chỉ giao hàng',
            'type'=>'text'
        );
        echo form_error('Diachigiaohang');
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="email">Email:</label>
    <?php
        $data=array(
            'name'=>'email',
            'id'=>'email',
            'value'=>set_value('email',''),
            'placeholder'=>'Nhập Email',
            'type'=>'text'
        );
        echo form_error('email');
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">    
    <?php
       echo form_submit('btnThem','Thêm');
    ?>
</div>
<?php
echo form_close();
?>
</div>
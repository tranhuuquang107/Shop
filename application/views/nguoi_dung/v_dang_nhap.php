<div role="main" class="ui-content jqm-content">
<script src="<?php echo base_url('public')?>/ckeditor/ckeditor.js"></script>
<h3>Thông tin đăng nhập</h3>
<?php
$this->load->helper('form');
echo '<h5 align="center" style="color:#0000ff">'.$this->session->flashdata('mss').'</h5>';
if(isset($error))
    echo '<span style="color:#ff0000">'.$error.'</span>';
echo form_open('quan-tri/nguoi-dung/dang-nhap','data-ajax="false"')
?>
<div class="ui-field-contain">
    <label for="tendn">Tên đăng nhập:</label>
    <?php
        $data=array(
            'name'=>'tendn',
            'id'=>'tendn',
            'value'=>set_value('tendn',''),
            'placeholder'=>'Nhập tên đăng nhập',
            'type'=>'text'
        );
        echo form_error('tendn');
        echo form_input($data);
    ?>
</div>

<div class="ui-field-contain">
    <label for="mat_khau">Mật khẩu:</label>
    <?php
        $data=array(
            'name'=>'mat_khau',
            'id'=>'mat_khau',
            'value'=>set_value('mat_khau',''),
            'placeholder'=>'Nhập mật khẩu',
            'type'=>'password'
        );
        echo form_error('mat_khau');
        echo form_input($data);
    ?>
</div>
<div class="ui-field-contain">
    <label for="MXT">MXT:</label>
    <div class="ui-gird-a">
    <div class="ui-block-a">
    <?php
        $data=array(
            'name'=>'MXT',
            'id'=>'MXT',
            'value'=>set_value('MXT',''),
            'placeholder'=>'Nhập mật khẩu',
            'type'=>'text',
        );
        echo form_error('MXT');
        echo form_input($data);
    ?>
    </div>
    <div class="ui-block-b">    
       <?php echo $images['image'];?>
    </div>
    </div>
</div>
<div class="ui-field-contain">    
    <?php
       echo form_submit('btnNhap','Đăng nhập');
    ?>
</div>
<?php
echo form_close();
?>
</div>
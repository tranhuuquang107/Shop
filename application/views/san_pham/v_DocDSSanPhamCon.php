<div role="main" class="ui-content jqm-content my-page">
    <h3 style="margin-bottom: -20px;padding-bottom: -20px;">
    <?php
    if(isset($LoaiCon))
    {
        echo anchor('san-pham',$this->lang->line('Sản phẩm'),'data-ajax="false"');
        echo '/';
        echo anchor('san-pham/'.$LoaiCha['tenloaiurl'],$this->lang->line($LoaiCha['tenloai']),'data-ajax="false"');
        echo '/'.$this->lang->line($LoaiCon['tenloai']);
        echo '('.count($DSSanPham).')';
    }
    elseif(isset($LoaiCha))
    {
        echo anchor('san-pham',$this->lang->line('Sản phẩm'),'data-ajax="false"');          
        echo '/'.$this->lang->line($LoaiCha['tenloai']);
        echo '('.count($DSSanPham).')';
    }
    else
    {
        echo $this->lang->line('Sản phẩm');
        echo '('.count($DSSanPham).')';
    }
    ?>
    </h3>
    <?php
        $this->load->view('san_pham/v_DocDSsanpham');
        if(isset($link))
        {
            echo '<p align="center">'.$link.'</p>';
        }
    ?>
</div>
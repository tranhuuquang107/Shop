<div data-role="header" class="jqm-header">
		<h2><a href="<?php echo site_url()?>" data-ajax="false"><img src="<?php echo base_url('public/css_js')?>/img/logo.png" alt="TTTH"></a></h2>
		<p>
        <?php
            if($this->session->userdata('tennguoidung'))  
                echo anchor('quan-tri/nguoi-dung/dang-xuat',$this->session->userdata('tennguoidung'),'data-ajax="false"');                
            else
                  echo anchor('quan-tri/nguoi-dung/dang-nhap','Đăng Nhập','data-ajax="false"');        
            
        ?>
        </p>
		<a href="#" class="jqm-navmenu-link ui-btn ui-btn-icon-notext ui-corner-all ui-icon-bars ui-nodisc-icon ui-alt-icon ui-btn-left">Menu</a>
		<a href="#" class="jqm-search-link ui-btn ui-btn-icon-notext ui-corner-all ui-icon-search ui-nodisc-icon ui-alt-icon ui-btn-right">Search</a>
	</div>
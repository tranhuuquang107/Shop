<div data-role="panel" class="jqm-navmenu-panel" data-position="left" data-display="overlay" data-theme="a">
	    	<ul class="jqm-list ui-alt-icon ui-nodisc-icon">
<li data-filtertext="demos homepage" data-icon="home"><a href="<?php echo site_url()?>" data-ajax="false"><?php echo $this->lang->line('Trang chủ')?></a></li>
<!--Ngôn ngữ -->
<li data-role="collapsible" data-enhanced="true" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed">
	<h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed">
		<a href="#" class="ui-collapsible-heading-toggle ui-btn ui-btn-icon-right ui-btn-inherit ui-icon-carat-d">
		   <?php echo $this->lang->line('Ngôn ngữ')?>
		</a>
	</h3>
	<div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
		<ul>
			<li data-filtertext="form checkboxradio widget checkbox input checkboxes controlgroups">
                <a href="#" onclick="return false" id="TV">
                    <?php echo $this->lang->line('Tiếng Việt')?>
                </a>
            </li>
			<li data-filtertext="form checkboxradio widget checkbox input checkboxes controlgroups">
                <a href="#" onclick="return false" id="TA">
                  	<?php echo $this->lang->line('Tiếng Anh')?>
                    
                </a>
            </li>           
		</ul>
	</div>
</li>
<!--End-->
<!--Giỏ Hàng -->
<li data-role="collapsible" data-enhanced="true" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed">
	<h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed">
		<a href="#" class="ui-collapsible-heading-toggle ui-btn ui-btn-icon-right ui-btn-inherit ui-icon-carat-d">
		   <?php echo $this->lang->line('Giỏ hàng')?>
		</a>
	</h3>
	<div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
		<ul>
			<li data-filtertext="form checkboxradio widget checkbox input checkboxes controlgroups">
                <a href="<?php echo site_url('khach-hang/thong-tin-gio-hang')?>" data-ajax="false" id="GH">
                SL:<?php echo $this->cart->total_items()?> - 
                TT:<?php echo number_format($this->cart->total())?> - VNĐ
                </a>
            </li>
			           
		</ul>
	</div>
</li>
<!--End Giỏ hàng-->
<li data-role="collapsible" data-enhanced="true" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed">
	<h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed">
		<a href="#" class="ui-collapsible-heading-toggle ui-btn ui-btn-icon-right ui-btn-inherit ui-icon-carat-d">
		    <?php echo $this->lang->line('Bài tập')?><span class="ui-collapsible-heading-status"> click to expand contents</span>
		</a>
	</h3>
	<div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
		<ul>
			<li data-filtertext="form checkboxradio widget checkbox input checkboxes controlgroups">
                <a href="<?php echo site_url('Baitap/baitap1')?>" data-ajax="false"><?php echo $this->lang->line('Bài tập 1')?></a>
            </li>
			<li data-filtertext="form checkboxradio widget checkbox input checkboxes controlgroups">
                <a href="<?php echo base_url('Baitap/baitap2')?>" data-ajax="false"><?php echo $this->lang->line('Bài tập 2')?></a>
            </li>
            <li data-filtertext="form checkboxradio widget checkbox input checkboxes controlgroups">
                <a href="<?php echo site_url('Baitap/baitap3')?>" data-ajax="false"><?php echo $this->lang->line('Bài tập 3')?></a>
            </li>
            <li data-filtertext="form checkboxradio widget checkbox input checkboxes controlgroups">
                <a href="<?php echo site_url('Baitap/baitap4')?>" data-ajax="false"><?php echo $this->lang->line('Bài tập 4')?></a>
            </li>
                        
		</ul>
	</div>
</li>
<?php 
    if(isset($DSLoaiSanPhamMeNu))
    {
        foreach($DSLoaiSanPhamMeNu as $item)
        {
            $LoaiCha=$item[0];
            $DSLoaiCon=$item[1];
?>

<li data-role="collapsible" data-enhanced="true" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false" class="ui-collapsible ui-collapsible-themed-content ui-collapsible-collapsed">
	<h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed">
		<a href="#" class="ui-collapsible-heading-toggle ui-btn ui-btn-icon-right ui-btn-inherit ui-icon-carat-d">
			<?php echo $this->lang->line($LoaiCha['tenloai'])?><span class="ui-collapsible-heading-status"> click to expand contents</span>
		</a>
	</h3>
	<div class="ui-collapsible-content ui-body-inherit ui-collapsible-content-collapsed" aria-hidden="true">
		<ul>
        <?php
            if($DSLoaiCon)
            {
                foreach($DSLoaiCon as $itemlc)
                {
                    
                    echo '<li data-filtertext="collapsibles content formatting">';
                    echo '<a href="'.site_url('san-pham/'.$LoaiCha['tenloaiurl'].'/'.$itemlc['tenloaiurl']).'" data-ajax="false">'.$this->lang->line($itemlc['tenloai']).'</a>';
                     echo '</li>';
                }
            }
        ?>
						
		</ul>
	</div>
</li>
<?php
        }
    }
?>
<li data-filtertext="demos homepage"><a href="<?php echo site_url('tin-tuc/tin-tuc-moi')?>" data-ajax="false"><?php echo $this->lang->line('Tin tức')?></a></li>


		     </ul>
		</div>
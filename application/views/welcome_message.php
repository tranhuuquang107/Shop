<div role="main" class="ui-content jqm-content my-page">
    <!--san pham moi-->
    <div class="ui-grid-a" data-role="collapsible" data-collapsed="false" data-content-theme="false">
        <h4><?php echo $this->lang->line('Danh sách sản phẩm mới')?></h4>
        <ul data-role="listview" data-inset="true" >
        <?php
            foreach($dssp as $spm)
            {
            ?>
                <li class="hide" ><a href="<?php echo site_url('san-pham/chitietsanpham/'.$spm['tensanphamurl'].'-'.$spm['masanpham'])?>"  data-ajax="false">
                	<img  src="<?php echo base_url('public/hinhsanpham/'.$spm['hinh'])?>" class="hide ui-li-thumb" >
                    <div class="mauvang">
                           <h2 ><?php echo $spm['tensanpham']?></h2>                    
                        <p >
                        <?php 
                            if($spm['dongiakhuyenmai']>0)  
                            { 
                               
                                echo '<br>Giá KM:'.number_format($spm['dongiakhuyenmai']);
                                echo '<br>Giá:<strike>'.number_format($spm['dongia']).'</strike>';
                            }
                            else
                            {
                                
                                echo '<br>Giá:'.number_format($spm['dongia']);
                            }
                                                     
                        ?>                    
                        </p>                         
                    </div>
                	
                    <p class="ui-li-aside">
                        <?php
                        if($spm['dongiakhuyenmai']>0)
                            echo 'KM';
                        else
                            if($spm['sanphammoi']==1)
                                echo 'Mới';
                        ?>
                    </p>
                </a></li>
            <?php
            }
            ?>
        </ul>	
    </div>
    <!--end san pham moi-->
    <div class="ui-grid-a" data-role="collapsible" data-collapsed="false" data-content-theme="false">
        <h4><?php echo $this->lang->line('Danh sách sản phẩm khuyến mãi')?></h4>
        <ul data-role="listview" data-inset="true" >
        <?php
            foreach($dssp as $spm)
            {
            ?>
                <li class="hide" ><a href="<?php echo site_url('san-pham/chitietsanpham/'.$spm['tensanphamurl'].'-'.$spm['masanpham'])?>" data-ajax="false">
                    <img src="<?php echo base_url('public/hinhsanpham/'.$spm['hinh'])?>" class="ui-li-thumb">
                    <div class="mauxanh">
                    <h2 ><?php echo $spm['tensanpham']?></h2>                    
                    <p>
                    <?php 
                        if($spm['dongiakhuyenmai']>0)  
                        {                             
                            echo '<br>Giá KM:'.number_format($spm['dongiakhuyenmai']);
                            echo '<br>Giá:<strike>'.number_format($spm['dongia']).'</strike>';
                        }
                        else
                        {
                            
                            echo '<br>Giá:'.number_format($spm['dongia']);
                        }
                                                 
                    ?>                    
                    </p>                   
                    </div>
                    <p class="ui-li-aside">
                        <?php
                        if($spm['dongiakhuyenmai']>0)
                            echo 'KM';
                        else
                            if($spm['sanphammoi']==1)
                                echo 'Mới';
                        ?>
                    </p>
                </a></li>
            <?php
            }
            ?>
        </ul>	
    </div>
</div>
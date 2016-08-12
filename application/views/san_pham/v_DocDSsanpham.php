<div class="ui-grid-a">
<?php
    if(!empty($DSSanPham))
    {
?>
        <ul data-role="listview" data-inset="true" >
        <?php
            foreach($DSSanPham as $spm)
            {
            ?>
                 <li class="hide" ><a href="<?php echo site_url('san-pham/chitietsanpham/'.$spm['tensanphamurl'].'-'.$spm['masanpham'])?>"  data-ajax="false">
                    <img  src="<?php echo base_url('public/hinhsanpham/'.$spm['hinh'])?>" class="hide ui-li-thumb" >
                    <div class="mauvang">
                           <h2 class="hide1"><?php echo $spm['tensanpham']?></h2>                    
                        <p class="hide1">
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
    <?php         
    }
     else        
        echo '<h3>Sản phẩm đang cập nhật</h3>';
        ?>
 </div>
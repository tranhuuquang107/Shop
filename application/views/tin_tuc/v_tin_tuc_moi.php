<div role="main" class="ui-content jqm-content my-page">
    <!--san pham moi-->
    <div class="ui-grid-a" data-role="collapsible" data-collapsed="false" data-content-theme="false">
        <h4>Danh sách tin tức mới</h4>
        <ul data-role="listview" data-inset="true" >      
        <?php
        foreach($DSTinTuc as $tt)
        {
        ?>
            <li class="hide" ><a href="<?php echo site_url('tin-tuc/'.$tt['tieu_de_url'].'-'.$tt['matintuc'])?>"  data-ajax="false">
                	<img  style ="height:100%" src="<?php echo base_url('public/hinhtintuc/'.$tt['hinh'])?>" class="hide ui-li-thumb" >
                    <div class="mauvang">
                           <h2 ><?php echo $tt['tieude']?></h2>                    
                        <p >
                                    
                        </p>                         
                    </div>
                	
                    <p class="ui-li-aside">
                        <?php
                        if($tt['tin_tuc_moi']==1)
                            echo 'New';
                        else
                            echo '';
                        ?>
                    </p>
                </a></li>
        <?php
        }
        ?>  
        </ul>
    </div>
</div>

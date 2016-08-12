<div role="main" class="ui-content jqm-content my-page">
    <h2><?php echo $this->session->userdata('LOI')?></h2>
    <div class="ui-grid-a ui-responsive">
        <div class="ui-block-a">
            <div class="ui-body ui-body-d">                
               <img src="<?php echo base_url('public/hinhsanpham/'.$ChiTiet['hinh'])?>" alt="" style="height: 275px; width:97%"/>
            </div>
        </div>
        <div class="ui-block-b">
            <div class="ui-body ui-body-d">
                <h2><?php echo $ChiTiet['tensanpham']?></h2>
                <p>
                    <?php 
                        if($ChiTiet['dongiakhuyenmai']>0)
                        {
                            echo 'Đơn KM:'.$ChiTiet['dongiakhuyenmai'];
                        }
                        else
                            echo 'Đơn giá:'.$ChiTiet['dongia'];
                    ?>
                </p>
                <p><input type="number" value="1" id="soluong" name="soluong"/> Số lượng</p>
                <p><input type="button" id="btnThem" value="Thêm giỏ hàng" name="<?php echo $ChiTiet['masanpham']?>" data-ajax="false"/></p>
            </div>
            
                
            
        </div>    
    </div>
    <div class="ui-gird-a">
    <div data-role="tabs" id="tabs">
        <div data-role="navbar">
            <ul>
                <li><a href="#ChiTiet" data-ajax="false">Chi tiết</a></li>
                <li><a href="#HDSD" data-ajax="false">HDSD</a></li>
                <li><a href="#SPCL" data-ajax="false">Sản phẩm cùng loại</a></li>
            </ul>
        </div>
        <div id="ChiTiet" class="ui-body-d ui-content">
        <p><?php echo $ChiTiet['diengiai']?></p>
        </div>
        <div id="HDSD" class="ui-body-d ui-content">
            <p>First tab contents</p>
        </div>
        <div id="SPCL" >            
            <?php $this->load->view('san_pham/v_DocDSsanpham')?>           
        </div>
    </div>
</div>
</div>

<div role="main" class="ui-content jqm-content my-page"> 
	<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
	     <thead>
			<tr>
				<th data-priority="1">Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
				<th data-priority="2">Tên URL</th>	
				<th data-priority="3">Ngày cập nhật</th>
				<th data-priority="4">Đơn giá</th>
				<th data-priority="5">Đơn giá KM</th>
                <th data-priority="6"></th>
                <th data-priority="6"></th>
			</tr> 
        </thead>
    	<tbody>
        <?php
            if(count($DSSanPham)>0)
            {
                foreach($DSSanPham as $sp)
                {
        ?>
        
            <tr>
                <th><?php echo $sp['masanpham']?></th>
                <td><?php echo $sp['tensanpham']?></td>
                <td><?php echo $sp['tensanphamurl']?></td>
                <td><?php echo $sp['ngaycapnhat']?></td>
                <td><?php echo number_format($sp['dongia'])?></td>
                <td><?php echo number_format($sp['dongiakhuyenmai'])?></td>
                <td>
                    <?php echo  anchor('quan-tri/san-pham/cap-nhat-san-pham/'.$sp['masanpham'],'Cập nhật','class=" btn ui-btn ui-icon-edit ui-btn-inline  ui-btn-icon-notext ui-shadow ui-corner-all" data-ajax="false"')?>   
                </td>              
                <td>
                     <?php echo  anchor('quan-tri/san-pham/xoa-san-pham','Xóa','class="btn ui-btn ui-btn-a ui-icon-delete ui-btn-inline ui-btn-icon-notext  ui-shadow ui-corner-all xoasp" onclick="return false" data-ajax="false" id="'.$sp['masanpham'].'"')?>
                </td>
            </tr>
            
        <?php
                }
            }
        ?>
        <tr>
            <td colspan="6"><?php echo $link;?></td>        
        </tr>
        </tbody>
     </table>
</div>
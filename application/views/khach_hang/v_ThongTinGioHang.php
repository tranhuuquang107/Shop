<div role="main" class="ui-content jqm-content">
<?php
if($this->cart->contents())
{
?>
<form method="post" action="">
	<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
	     <thead>
			<tr>
				<th data-priority="2">STT</th>
				<th>Mã sản phẩm</th>
				<th data-priority="3">Tên sản phẩm</th>	
				<th data-priority="4">Đơn giá</th>
				<th data-priority="5">Số lượng</th>
				<th data-priority="6">Thành tiền</th>
			</tr> 
	</thead>
	<tbody>
    
		<?php 
		$i=1;
			foreach($this->cart->contents() as $item)
			{
                echo '<tr>';
				echo '<td>';
				echo $i++;
				echo '</td>';
				echo '<td>';
				echo $item['id'];
				echo '</td>';
				echo '<td>';
				echo $item['name'];
				echo '</td>';			
				echo '<td>';
				echo number_format($item['price']);
				echo '</td>';
				echo '<td>';
				echo '<input type="number" value="'.$item['qty'].'" name="sl_'.$item['rowid'].'"/>';
				echo '</td>';			
				echo '<td>';
				echo number_format($item['price']*$item['qty']);
				echo '</td>';
                echo '</tr>';
			}$i=$i+1;
		?>
    <tr>
        <td colspan="6">
            <input type="submit" id="btnCapNhat" name="btnCapNhat" value="Cập nhật" />
        </td>
    </tr>	
    
    <tr>
         <td colspan="6"  style="text-align:center" ">
            <?php echo anchor('khach-hang/dat-hang','Đặt hàng',"data-ajax='false'")?>
        </td>
    </tr>
     <tr>
         <td colspan="6"  style="text-align:center">
            <?php echo anchor('khach-hang/huy-gio-hang','Hủy giỏ hàng',"data-ajax='false'")?>
        </td>
    </tr>
	</tbody>
	</table>
    </form>
 <?php 
    }
    else
        echo '<h2>Giỏ hàng rổng</h2>';
  ?>
</div>
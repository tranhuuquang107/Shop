<div role="main" class="ui-content jqm-content">
	<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
	     <thead>
			<tr>
				<th data-priority="2">STT</th>
				<th>Tên người dùng</th>
				<th data-priority="3">Ngày sinh</th>
				<th data-priority="1">
				<abbr title="Rotten Tomato Rating">Giới tính</abbr>
				</th><th data-priority="2">Địa chỉ</th>
				<th data-priority="4">Email</th>
				<th data-priority="5">CMND</th>
				<th data-priority="6">Điện thoại</th>
			</tr> 
	</thead>
	<tbody>
		<?php 
		$i=1;
			foreach($dsnguoidung as $nd)
			{
				echo '<tr>';
				echo '<td>';
				echo $i++;
				echo '</td>';
				echo '<td>';
				echo $nd['ten_nguoi_dung'];
				echo '</td>';
				echo '<td>';
				echo $nd['ngay_sinh'];
				echo '</td>';
				echo '<td>';
				if($nd['gioi_tinh']==1)
					echo 'Nam';
				else
					echo 'Nữ';
				echo '</td>';
				echo '<td>';
				echo $nd['dia_chi'];
				echo '</td>';
				echo '<td>';
				echo $nd['email'];
				echo '</td>';
				echo '<td>';
				echo $nd['cmnd'];
				echo '</td>';
				echo '<td>';
				echo $nd['dien_thoai'];
				echo '</td>';				
				echo '</tr>';

			}$i=$i+1;
		?>		
	</tbody>
	</table>
</div>
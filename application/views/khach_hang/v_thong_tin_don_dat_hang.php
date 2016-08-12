<div role="main" class="ui-content jqm-content">
<h2>Thông tin đơn đặt hàng của bạn</h2>
<div class="ui-field-contain">
     <label for="MaKH">Số HD:</label>
     <label ><b><?php echo $DonDatHang[0]['so_hd']?></b></label>  

     <label for="Ngày hóa đơn">Ngày hóa đơn:</label>
     <label ><b><?php echo $DonDatHang[0]['ngay_hoadon']?></b></label>      
</div>
<div class="ui-field-contain">
     <label for="MaKH">Mã khách hàng:</label>
     <label ><b><?php echo $DonDatHang[0]['MaKH']?></b></label>  

     <label for="Hoten">Họ tên khách hàng:</label>
     <label ><b><?php echo $DonDatHang[0]['Hoten']?></b></label>      
</div>
<div class="ui-field-contain">
     <label for="Diachi">Địa chỉ:</label>
     <label ><b><?php echo $DonDatHang[0]['Diachi']?></b></label>      

     <label for="Dienthoai">Điện thoại:</label>
     <label ><b><?php echo $DonDatHang[0]['Dienthoai']?></b></label>      
</div>
<div class="ui-field-contain">
     <label for="Diachigiaohang">Địa chỉ giao hàng:</label>
     <label ><b><?php echo $DonDatHang[0]['Diachigiaohang']?></b></label>      
</div>

<table data-role="table" data-mode="columntoggle" class="ui-responsive" id="myTable">
  <thead>
    <tr>
      <th data-priority="6">STT</th>
      <th>Mã sản phẩm</th>
      <th data-priority="1">Tên sản phẩm</th>
      <th data-priority="2">Số lượng</th>
      <th data-priority="3">Đơn giá</th>
      <th data-priority="4">Thành tiền</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    foreach($DonDatHang as $item)
    {
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $item['masanpham']?></td>
      <td><?php echo $item['tensanpham']?></td>
      <td><?php echo $item['so_luong']?></td>
      <td><?php echo number_format($item['don_gia'])?></td>
      <td><?php echo number_format($item['thanh_tien'])?></td>
    </tr>
    <?php
        $i++;
    }
    ?>
    <tr>
        <td colspan="5" align="right"><b>Cộng</b></td>
        <td  align="right"><?php echo number_format($item['trigia_hd'])?></td>
    </tr>
  </tbody>
</table>
</div>
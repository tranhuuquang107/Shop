<div data-role="footer" data-position="fixed" data-tap-toggle="false" class="jqm-footer">
		<p></p>
		<p></p>
<script type="text/javascript">
    $(document).ready(function(){
    $(".xoasp").click(function()
    {
        if(confirm("Xóa ko")==false)
            return;
        var id= $(this).attr('id');
        //sssssssssssssssss
	    $.ajax({
		url: '<?php echo site_url()?>quan-tri/san-pham/xoa-san-pham',
		type: "POST",
        //dataType:'json' or data=JSON.parse(data);
		contentType: 'application/x-www-form-urlencoded; charset=utf-8',   
		data: { masanpham : id },
		async: true,
		processData: true,                                                  
		cache: false,                                       
		success: function (data) {
		      data=JSON.parse(data);
             if(data['kq']==true)
              {
                 location.reload();
                 alert('Xóa thành công');                     
              } 
              else
              {                   
                  alert('Xóa KHÔNG thành công'); 
              }       
		},
		error: function (data) {
		   alert('that bai');
		}
	});                                
	//sssssssssssssssssss
    });
});
          
</script>
</div>
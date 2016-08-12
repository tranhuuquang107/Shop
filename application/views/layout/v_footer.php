<div data-role="footer" data-position="fixed" data-tap-toggle="false" class="jqm-footer">
		<p></p>
		<p>
		<a target="_blank" href="https://plus.google.com/u/0/117320702962930810646/posts"><img src="<?php echo base_url('public/hinhsanpham/logo_g.png')?>" alt="" target="_blank"></a>
		<a target="_blank" href="https://plus.google.com/u/0/117320702962930810646/posts"><img src="<?php echo base_url('public/hinhsanpham/logo_f.png')?>" alt="" ></a>
		</p>

<script type="text/javascript">
    $(document).ready(function(){
    $("#btnThem").click(function()
    {
        var sl=$('#soluong').val()
        if(sl<=0)
            alert('nhập số lượng lớn hơn 1')
        var msp=$('#btnThem').attr('name');
        //sssssssssssssssss
	    $.ajax({
		url: '<?php echo site_url()?>khach-hang/them-mat-hang',
		type: "POST",
        //dataType:'json' or data=JSON.parse(data);
		contentType: 'application/x-www-form-urlencoded; charset=utf-8',   
		data: { masanpham : msp , soluong : sl },
		async: true,
		processData: true,                                                  
		cache: false,                                       
		success: function (data) {
		      data=JSON.parse(data);
			         $('#GH').html('SL: '+data['tsl']+' TT:'+formatCurrency(data['tt'])+' - VNĐ');               
		},
		error: function (data) {
		   alert('that bai');
		}
	});                                
	//sssssssssssssssssss
    });
    
    ///Tiếng Việt///
    $("#TV").click(function()
    {        
        //sssssssssssssssss
	    $.ajax({
		url: '<?php echo site_url()?>Lang/vi',
        //dataType:'json' or data=JSON.parse(data);
		contentType: 'application/x-www-form-urlencoded; charset=utf-8',
		async: true,
		processData: true,                                                  
		cache: false,                                       
		success: function (data) {
            location.reload();
		},
		error: function (data) {
		  
		}
	});                                
	//sssssssssssssssssss
    });
  ///Tiếng Anh///
    $("#TA").click(function()
    {
        //sssssssssssssssss
	    $.ajax({
		url: '<?php echo site_url()?>Lang/en',
        //dataType:'json' or data=JSON.parse(data);
		contentType: 'application/x-www-form-urlencoded; charset=utf-8',
		async: true,
		processData: true,                                                  
		cache: false,                                       
		success: function (data) {
            location.reload();
		},
		error: function (data) {
		  
		}
	});                                
	//sssssssssssssssssss
    });        
});
        

    //Định dạng số
    function formatCurrency(num) 
    {
       num = num.toString().replace(/\$|\,/g,'');
       if(isNaN(num))
       num = "0";
       sign = (num == (num = Math.abs   (num)));
       num = Math.floor(num*100+0.50000000001);
       num = Math.floor(num/100).toString();
       for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
       num = num.substring(0,num.length-(4*i+3))+','+
       num.substring(num.length-(4*i+3));
       return (((sign)?'':'-') + num);
    }       
</script>
</div>
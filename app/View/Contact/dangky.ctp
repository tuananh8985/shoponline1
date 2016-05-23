
<div class='boxmain'  >  		
	<div class="title_regis">
        <p>Đăng ký  học / du học / việc làm trực tuyến</p>			
	</div>

<form  id="myform" name="contactForm" class="form_contact"  onsubmit="return validateForm();" method="post" action="<?php echo DOMAIN?>contact/dangky">
                    
<table width="550" border="0" cellspacing="8" cellpadding="0" style="">
    <tr>
    <td width="265">Họ tên:  </td>
    <td colspan="3"><input class="text_input" name="name" type="text" id="name" size="40" /></td>
  </tr>
    <tr>
    <td width="265">Công ty (Trường học):  </td>
    <td colspan="3"><input class="text_input" name="company" type="text" id="company" size="40" /></td>
  </tr>
  <tr>
    <td><p>Trình độ tiếng Nhật hiện tại:</p>
		<p>Ví dụ: Học đến bài 20 của Minna no nihongo, đã thi N5 được 80 điểm năm 2013</p>
	</td>
    <td colspan="3"> <input class="text_input" name="address" type="text" id="address" size="40" />
                                   </td>
  </tr>
 
  <tr>
    <td>Khóa học đăng ký: </td>
     <td width="84"><input type="checkbox" name="title[]" value="Lớp sơ cấp">Lớp sơ cấp</td>
    <td width="92"><input type="checkbox" name="title[]" value="Lớp cấp tốc">Lớp cấp tốc</td>
	<td></td>
  </tr>
  <tr>
    <td>Thời gian muốn học tiếng Nhật :</td>
    <td width="84"><input type="checkbox" name="thoigian[]" value="Buổi sáng">Buổi sáng</td>
    <td width="92"><input type="checkbox" name="thoigian[]" value="Buổi chiều">Buổi chiều</td>
    <td width="90"><input type="checkbox" name="thoigian[]" value="Buổi tối">Buổi tối</td>
  </tr>
  
    <tr>
    <td>Số buổi học / 1 tuần :</td>
    <td width="84"><input type="checkbox" name="sobuoihoc[]" value="Thứ 3,5">Thứ 3,5</td>
    <td width="92"><input type="checkbox" name="sobuoihoc[]" value="Thứ 2,6">Thứ 2,6</td>
    <td width="90"><input type="checkbox" name="sobuoihoc[]" value="Thứ 2,4,6">Thứ 2,4,6</td>
	<td width="90"><input type="checkbox" name="sobuoihoc[]" value="Thứ 3,5,7">Thứ 3,5,7</td>
  </tr>
  
  
  <tr>
    <td><p>Thời điểm muốn đi du học :</p>
	<p>Chỉ dành cho các bạn có nhu cầu đi du học </p>
	</td>
    <td><p>
        <input type="checkbox" name="thoidiem[]" value="Tháng 1">
    Tháng 1</p>
    <p>
      <input type="checkbox" name="thoidiem[]" value="Tháng 4" />
    Tháng 4</p></td>
    <td><p>
        <input type="checkbox" name="thoidiem[]" value="Tháng 7" />
    Tháng 7</p>
    <p>
      <input type="checkbox" name="thoidiem[]" value="Tháng 10">Tháng 10</p></td>
    <td>&nbsp;</td>

  </tr>
  <tr>
    <td>Điện thoại:  </td>
     <td colspan="3"><input class="text_input" name="mobile" type="text" id="mobile" size="40" /></td>

  </tr>
  <tr>
    <td>Email:  </td>
    <td colspan="3"><input class="text_input" name="email" type="text" id="email" size="40" /></td>

  </tr>
  <tr>
    <td>Facebook :</td>
    <td colspan="3"> <input class="text_input" name="facebook" type="text" id="facebook" size="40" /></td>
    
  </tr>
  <tr>
    <td>Skype :</td>
    <td colspan="3"> <input class="text_input" name="skype" type="text" id="skype" size="40" /></td>
   
  </tr>
  <tr>
    <td>Yahoo :</td>
    <td colspan="3"> <input class="text_input" name="yahoo" type="text" id="yahoo" size="40" /></td>
  </tr>
  <tr>
    <td><p>Mong muốn tham gia chương trình </p>
    <p>(Có thể chọn cả 3 chương trình) :</p></td>
    <td colspan="3"><p>
        <input type="checkbox" name="subject[]" value="Du học Nhật Bản">
        Du học Nhật Bản
      </p>
      <p>
        <input type="checkbox" name="subject[]" value="Học tiếng Nhật">
        Học tiếng Nhật      </p>
      <p>
        <input type="checkbox" name="subject[]" value="Công việc liên quan đến TN">
    Công việc liên quan đến TN</p></td>
  </tr>
  <tr>
    <td>Ghi chú:  </td>
    <td colspan="3"> <textarea name="content"cols="40" rows="8" ></textarea></td>

  </tr>
  
  <tr>
    <td>Upload CV du học: </td>
    <td colspan="3">
	   <input type="text" size="50" style="height:25px;"  name="userfile" readonly="true"> &nbsp;
	   <a href="javascript:window.open('<?php echo DOMAINAD; ?>upload_pic.php','userfile','width=1008,height=508');window.history.go(1)" >
	   <input style="margin-top: 3px;" type="button" value="Chọn file" class="button" />
	   </a>
                    	
	</td>

  </tr> 
  <tr>
    <td>Mã xác nhận :</td>
    <td colspan="3" class="content-register" id="code-register">
		<img alt="" id="captcha" src="<?php echo DOMAIN ?>usermembers/usermembers/create_image" />
	</td>
  </tr>
  <tr>
    <td>Nhập mã xác nhận</td>
    <td colspan="3" class="content-register" id="privacy-register">
    <input  style="width:171px;" maxlength="5"class="input_text" id="security" name="security" /></td>
    
  </tr>
  <tr>
    <td>
    </td>

    <td><button type="submit" value="Gửi mail" name="save" style="margin-top: 10px; margin-left: 80px; width: 70px;height: 30px" />
                                    Gửi
                                    </button></td>    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
                    </form>
               
    </div> 
<!--end #center-->	
<script type="text/javascript">
                   
    $(function(){
	  
        $("#myform").validate({
            rules: {
	
			
                name: {
                    required: true,
                    minlength:8
                },
			
                email: {
                    required: true,
                    email: true
				
                },
			
                phone: {
                    required: true,
                    number: true,
                    minlength: 7,
                    maxlength: 15
                },
			
			
                ngaysinh: {
                    required: true,
                    minlength:5
                }
		
			
            },
            messages: {
	
			
                name: {
                    required: "Xin vui lòng nhập họ tên của bạn!",
                    minlength: "Họ tên bao gồm ít nhất 8 kí tự!"
                },
                phone: {
                    required: "Xin vui lòng nhập số điện thoại!",
                    number: "Số điện thoại chỉ bao gồm các số từ 0 - 9!",
                    minlength: "Số điện thoại ít nhất 7 ký tự!",
                    maxlength: "Số điện thoại lớn nhất 15 ký tự!"
                },
			
                email: {
                    required: "Xin vui lòng nhập email!",
                    minlength: "Họ tên bao gồm ít nhất 8 kí tự!"
                },
				
                ngaysinh: {
                    required: "Xin vui lòng nhập thời gian bạn muốn học!",
                    minlength: "Địa chỉ bao gồm ít nhất 5 kí tự!"
                }
				
		
			
            }
        });
	  
	
	  

	
	
	

    })
	
</script>

<script>
function reload()
{  
	var random1= Math.random()*5
	$.ajax({
		type: "GET", 
		url: "<?php echo DOMAINAD;?>"+'login/create_image1/'+random1,
		data: null,
		success: function(msg){	
		$('#abc').find('img').remove().end();
		 $('#abc').append('<img alt="" id="captcha" src="<?php echo DOMAINAD?>login/create_image1/'+random1+'" />');				
		}
	});	
}
</script>


<script>
    function reload(){  
        var random1= Math.random()*5
        jQuery.ajax({
            type: "GET", 
            url: "<?php echo DOMAIN; ?>"+'usermembers/usermembers/create_image1/'+random1,
            data: null,
            success: function(msg){	
                jQuery('#abc').find('img').remove().end();
                jQuery('#abc').append('<img id="captcha" src="<?php echo DOMAIN ?>usermembers/usermembers/create_image1/'+random1+'" alt=""/>');				
            }
        });	
    }
	</script>
	<script>
	$(function($){
		$("#email").change(function(){
			var email=$("#email").val();
			$.ajax({
				type: "GET", 
				url: "<?php echo DOMAIN;?>"+'usermembers/usermembers/ck_mail_register/',
				data: 'email='+email,
				success: function(msg){	
					//alert (msg);	
					$('#validate-emai-register').find('span').remove().end();										
					$('#validate-emai-register').append(msg);					
				}
			});
			
		});
		
	});
	
</script>
			




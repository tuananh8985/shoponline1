<?php 
//echo $this->Session->read('language'); die;
if($this->Session->read('language')=='vie') 
{  
  include('../Vendor/lang_vn.php');
  $duoi=null; 
} 
elseif($this->Session->read('language')=='chi') 
{  
  include('../Vendor/lang_chi.php');
  $duoi="_chi"; 
} 
else { $duoi="_eg"; include('../Vendor/lang_eng.php');
 }?>
<script type="text/javascript" src="<?php echo DOMAIN; ?>js/jquery.validate.js"></script>
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
			
			
                address: {
                    required: true,
                    minlength:5
                }
		
			
            },
            messages: {
	
			
                name: {
                    required: " <br><span style='color:#FF0000; '>Xin vui lòng nhập họ tên của bạn!</span>",
                    minlength: " <br><span style='color:#FF0000; '>Họ tên bao gồm ít nhất 8 kí tự!</span>"
                },
                phone: {
                    required: " <br><span style='color:#FF0000; '>Xin vui lòng nhập số điện thoại!</span>",
                    number: "<br><span style='color:#FF0000; '>Số điện thoại chỉ bao gồm các số từ 0 - 9!</span>",
                    minlength: "<br><span style='color:#FF0000; '>Số điện thoại ít nhất 7 ký tự!</span>",
                    maxlength: "<br><span style='color:#FF0000; '>Số điện thoại lớn nhất 15 ký tự!</span>"
                },
			
                email: {
                    required: " <br><span style='color:#FF0000;'>Xin vui lòng nhập email!</span>",
                    minlength: " <br><span style='color:#FF0000;'>Họ tên bao gồm ít nhất 8 kí tự!</span>"
                },
				
                address: {
                    required: " <br><span style='color:#FF0000;'>Xin vui lòng nhập địa chỉ của bạn!</span>",
                    minlength: " <br><span style='color:#FF0000;'>Địa chỉ bao gồm ít nhất 5 kí tự!</span>"
                }
				
		
			
            }
        });
	  
	
	  

	
	
	

    })
	
</script>

<link type="text/css" href="<?php echo DOMAIN ?>css/phantrang.css" rel="stylesheet" />
<div class='boxmain'  >
<div id="title_content">

         
             <h2>Liên hệ</h2>
				
   </div>
 

<div class="content" style="padding: 20px;"><?php
$setting = $this->requestAction('/comment/setting');
echo $setting['Setting']["address$duoi"];
?>
</div>
        </h3>

        <table style="margin: auto;
width: 524px;" border="0" cellspacing="0" cellpadding="0">
            <tr>

            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <form style="height:386px;margin-right: 5px;"  id="myform" name="contactForm" class="form_contact"  onsubmit="return validateForm();" method="post" action="<?php echo DOMAIN?>contact/index">
                        <table width="100%" border="0" cellspacing="0" cellpadding="4" style="padding-left: 20px;">
                            <tr>
                                <td width="70" height="30" align="left"><span class="field">
                                        <label for="Họ tên" class="styled"><?php echo $ten ?>:&nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input class="text_input" name="name" type="text" id="name" size="40" />
                                    </span></td>
                            </tr>
                            <tr>
                                <td height="30" align="left"><span class="field">
                                        <label for="Địa chỉ2" class="styled"><?php echo $diachi ?>:&nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input class="text_input" name="address" type="text" id="address" size="40" />
                                    </span></td>
                            </tr>
                            <tr>
                                <td height="30" align="left"><span class="field">
                                        <label for="Email2" class="styled"><?php echo $email ?>: &nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input class="text_input" name="email" type="text" id="email" size="40" />
                                    </span></td>
                            </tr>
                            <tr>
                                <td height="30" align="left"><span class="field">
                                        <label for="Điện thoại2" class="styled"><?php echo $dienthoai ?>:&nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input class="text_input" name="mobile" type="text" id="mobile" size="40" />
                                    </span></td>
                            </tr>
                            <tr>
                                <td align="left"><span class="field">
                                        <label for="Nội dung2" class="styled"><?php echo $tieude ?>: &nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input name="title" type="text" id="title1" size="40" class="text_input" />
                                    </span></td>
                            </tr>
                            <tr>
                                <td align="left"><span class="field">
                                        <label for="Nội dung2" class="styled"><?php echo $noidung ?>:&nbsp;&nbsp;</label>
                                    </span></td>
                                <td style="padding-top: 10px;"><span class="thefield">
                                        <textarea name="content1"cols="40" rows="8" ></textarea>
                                    </span></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button type="submit" value="Gửi mail" name="save" style="margin-top: 10px; margin-left: 80px; width: 70px;height: 30px" />
                                    <?php echo $gui ?>
                                    </button></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </div>  
<!--end #center-->				




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
   
						<div class="main">
<div class="title_top_news_detail" style="margin-top:7px;margin-bottom: 10px;">

         
                <p><?php echo $dangkihoconline?></p>
				
   </div></div>


        <table width="590px" border="0" cellspacing="0" cellpadding="0">
            <tr>

            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                         <form style="margin-right: 5px;"  id="myform" name="contactForm" class="form_contact"  onsubmit="return validateForm();" method="post" action="<?php echo DOMAIN?>contact/dangky">
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
                                        <label for="gioitinh" class="styled"><?php echo $gioitinh ?>:&nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input class="text_input" name="gioitinh" type="text" id="gioitinh" size="40" />
                                    </span></td>
                            </tr>
							<tr>
                                <td height="30" align="left"><span class="field">
                                        <label for="ngaysinh" class="styled"><?php echo $ngaysinh ?>:&nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input class="text_input" name="ngaysinh" type="text" id="ngaysinh" size="40" />
                                    </span></td>
                            </tr>
							<tr>
                                <td height="30" align="left"><span class="field">
                                        <label for="hokhau" class="styled"><?php echo $hokhau ?>:&nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input class="text_input" name="hokhau" type="text" id="hokhau" size="40" />
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
                            <!--<tr>
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
                            </tr>-->
								<tr>
								<td>
                               <?php echo $trinhdohocvan ?>:&nbsp;&nbsp;</label>
                      </td>
                              
                            </tr>
								<tr>
                                <td height="30" align="left"><span class="field">
                                        <label for="totnghieptruong" class="styled"><?php echo $totnghieptruong ?>:&nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input class="text_input" name="totnghieptruong" type="text" id="totnghieptruong" size="40" />
                                    </span></td>
                            </tr>
								<tr>
                                <td height="30" align="left"><span class="field">
                                        <label for="namtotnghiep" class="styled"><?php echo $namtotnghiep ?>:&nbsp;&nbsp;</label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input class="text_input" name="namtotnghiep" type="text" id="namtotnghiep" size="40" />
                                    </span></td>
                            </tr>
							
							  <tr>
                  <td style="padding-left:5px;" width="100"><?php echo $dangky?></td>
                   <td height="30">
                 <select name="dangky" id="dangky">
                <option value="Du học nhật"><?php echo $duhocnhat?></option>
            <option value="Khóa học tiếng Nhật"><?php echo $khoahoctiengnhat?></option>
             <option value="Trường CĐ SP Trung Ương"><?php echo $truongcdsptw?></option>
               <option value="Ngành CĐ SP Mầm Non"><?php echo $nganhcdspmamnon?></option>
            <option value="Ngành TC SP Mầm Non"><?php echo $nganhtcspmamnon?></option>
         <option value="Ngành TC SP Tiểu học"><?php echo $nganhtcsptieuhoc?></option>
          <option value="Ngành CĐ SP Tiểu học"><?php echo $nganhcdsptieuhoc?></option>
			 <option value="Trường ĐH CN Đông Á"><?php echo $truongdhcongnghedonga?></option>
			 <option value="Ngành ĐH kế toán"><?php echo $nganhdhketoan?></option>
			<option value="Ngành ĐH Tài Chính Ngân hàng"><?php echo $nganhdhtaichinhnganhang?></option>
			<option value="Ngành ĐH Quản trị KD"><?php echo $nganhdhquantrikinhdoanh?></option>
			<option value="Ngành ĐH Công Nghệ Thông Tin"><?php echo $nganhdhcntt?></option>
		<option value="Ngành ĐH Xây Dựng"><?php echo $nganhdhxaydung?></option>
		<option value="Ngành ĐH Điện - Điện tử"><?php echo $nganhdhdiendientu?></option>
			<option value="Trường TC Y - Dược Hà nam"><?php echo $truongtcyduochanam?></option>
			<option value="Ngành y điều dưỡng"><?php echo $nganhydieuduong?></option>
		<option value="Ngành y sỹ đa khoa"><?php echo $nganhysydakhoa?></option>
		<option value="Ngành Dược sỹ"><?php echo $nganhduocsy?></option>
                                                            </select>
                                                        </td>
                                                    </tr>
                            <tr>
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




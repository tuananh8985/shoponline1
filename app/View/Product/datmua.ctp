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
<script type="text/javascript" src="<?php echo DOMAIN;?>js/ckeditor/ckeditor.js"></script>
<script src="<?php echo DOMAIN;?>js/ckeditor/sample.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo DOMAIN;?>js/ckfinder/ckfinder.js"></script>

<script type="text/javascript" src="<?php echo DOMAIN;?>js/jquery.validate.js"></script>

<style>
  #goi-thieu h1,h2,h3{
	  font-size:12px;
	  font-weight:normal;
	  }

    #main-register input, .text-main input, .a-delete {
    border: 1px solid #CCC;
    border-radius: 5px;
	 padding: 3px;width: 60px;
    margin-bottom: 10px;
    font-size: 14px;
    color: #333;
    }
.a-delete{padding-top:5px;}
</style>

<script>
function confirmDelete(delUrl)
{
if (confirm("Bạn có chắc muốn xóa sản phẩm này không?"))
{
	document.location = delUrl;
}
}
</script> 
 <script>
 
 
 
 
	  $(function(){
	  
	  $("#myform").validate({
		rules: {
	
			
			name: {
				required: true,
				minlength:8
			},
			
			email: {
				required: true,
				email: true,
				
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
			},
		
			
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
			},
				
		
			
		}
	});
	  
	
	  

	
	
	

	  })
	
	

	  
  function keypress(e){
 //Hàm dùng d? ngan ngu?i dùng nh?p các ký t? khác ký t? s? vào TextBox
 var keypressed = null;
 if (window.event)
 {
 keypressed = window.event.keyCode; //IE
 }
 else
 { 
 keypressed = e.which; //NON-IE, Standard
 }
 if (keypressed < 48 || keypressed > 57)
 { //CharCode c?a 0 là 48 (Theo b?ng mã ASCII)
 //CharCode c?a 9 là 57 (Theo b?ng mã ASCII)
 if (keypressed == 8 || keypressed == 127)
 {//Phím Delete và Phím Back
 return;
 }
 if (keypressed == 45 || keypressed == 32)
 {//Phím Delete và Phím Back
 return true;
 }
 return false;
 }
 }
 </script>


 <link type="text/css" href="<?php echo DOMAIN ?>css/phantrang.css" rel="stylesheet" /> 
 
 
 
  <div class="boxmain">
           <div id="intro">
<h3><?php echo $sanphamtronggiohang ?></h3>
                    

 <?php // pr($shopingcart); die;?>
<div id="sanphams">
<input type="hidden" id="url" value="<?php echo "gio-hang" ?>" />
    	<div class="top">
        </div>
        <div class="m3">            
             <div class="clearfix"> 		                   
                <div class="roundBoxBody">
                     <div class="text-main" style="padding-top:10px; padding-bottom:20px;">
                         <table width="737"  class="tblGrid wf" border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse">
                            <tr>
                                <th width="100"><?php echo $hinhanh?></th>
                                <th width="300"><?php echo $tensanpham?></th>
                                <th width="70"><?php echo $soluong?></th>
                                <th width="130"><?php echo $gia?></th>
                                <th width="130"><?php echo $tonggia?></th>

                            </tr>
                            <?php $total=0; $i=0; foreach($shopingcart as $key=>$product) {?>
                            <?php if($product['name']!=null){?>
                            <tr>       
                                  <td class="tal" align="center"><img style="max-width:100px!important;"src="<?php echo DOMAINAD?><?php echo $product['images']?>" /></td>
                               <td style="padding-left: 5px;width:200px;"><?php echo $product['name']; ?></td>
                                <td class="tal">
                               
								<?php echo $product['sl']?>
                                </td>
                               
                                <td class="tal" align="center"><font color="red"><?php echo  $product['price']; ?> VNĐ</font></td>
                                <td class="tal" align="center"><font color="red"><?php echo $product['total']; ?> VNĐ</font></td>
                                 
                            </tr>
                            <?php $total +=$product['total']; $i++; }} 
							
							
							?> 
                              <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="font-weight:bold"><?php echo $tongtienphaitra ?>:</td>
                            <td style="font-weight:bold"><?php echo number_format($total);?> VNĐ</td>
                            </tr> 
                        </table>
                        <?php if($i==0){ echo"<br/><b>Chưa có sản phẩm nào trong giỏ hàng!</b><br/>";}?>
                       
					   
                      </div>
                </div>                  
             </div>            
             <div class="clearfix"></div>
        </div> 
        <div class="b3"><div class="b3"><div class="b3"></div></div></div>
    </div>
	
			<div style="overflow:hidden; margin-bottom:20px;">	       
					<form action="<?php echo DOMAIN?>product/datmua" method="POST" name="images" id='myform'/>
						 <div style="margin-top:20px;display:block;">
		
					<div>
                        <td nowrap="" height="10" align="center" colspan="2">
						<a name="gh"></a>
						<h3 ><?php echo $thongtincuaban ?></h3>
						</td>
						
                      </div>
                    
                      

                      <div>
                        <td nowrap="" height="10" align="center" colspan="2"></td>
                      </div>
                      

                      <div>
                        <td nowrap="" height="28" align="center" class="label1">
                        <?php echo $ten ?>
                        <span class="required_field">(*)</span></td>
                        <td>
						<input style="margin-left: 10px;margin-bottom: 10px;"name="name" class="textfield1" />
                           
                         </td>
                        </div>
						
						
                      <div>
                        <td nowrap="" height="28" align="center" class="label1">
                        <?php echo $email ?>
                        <span class="required_field">(*)</span></td>
                        <td>
						<input style="margin-left: 29px;margin-bottom: 10px;" name="email" class="textfield1" />
                           
                         </td>
                        </div>
						
						
                      <div>
                        <td nowrap="" height="28" align="center" class="label1">
                       <?php echo $dienthoai ?>
                        <span class="required_field">(*)</span></td>
                        <td >
						<input style="margin-left: 6px;margin-bottom: 10px;" name="phone" class="textfield1" onkeypress="return keypress(event);"/>
                           
                         </td>
                        </div>
						
						 <div>
                        <td  nowrap="" height="28" align="center" class="label1">
                       <?php echo $diachi ?>
                        <span class="required_field">(*)</span></td>
                        <td>
						<input style="margin-left: 24px;margin-bottom: 10px;" name="address" class="textfield1" />
                           
                         </td>
                        </div>
							
                      <div>
                        <td nowrap="" height="28" align="center" class="label1">
                      <?php echo $tieude ?>
                       </td>
                        <td>
						<input style="margin-left: 37px;margin-bottom: 10px;" name="title" class="textfield1" />
                           
                         </td>
                        </div>	
						
							
                    <div>
                       <td nowrap="" height="28" align="top" class="label1">
                      <?php echo $noidung ?>
                       </td>     <td width="688px" align="center" colspan="2">
							   <textarea  style="margin-left: 30px;width:352px;"  name="content" cols="30" rows="5"></textarea>
					<!--	  class="ckeditor text-input textarea"-->
						 
                       </td>
					   
					   <div>
					   <td colspan="2">
					       
                        <div style="float:left; margin-left:10px;padding-top:15px; padding-right:20px;" class="div-tt">
							<input style="padding: 2px;" type="submit" value="<?php echo $gui ?>" />
						</div>
                        <div style="float:left;margin-left:10px; padding-top:15px;" class="div-tt">
						<input style="padding: 2px;" type="reset" value="<?php echo $huy ?>" /></div>
					   
					   </td>
					   </div>
					   
					
						</div>
						</form>

					</div>
					</div>
 </div>


           
        <div class="clear margin"></div>
    </div><!--end #body-->
    








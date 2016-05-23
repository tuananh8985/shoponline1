<?php echo $this->Html->script('jquery.validate', true); ?>
<script>
 $(function(){            
            function validateEmail(email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if( !emailReg.test( email ) ) {
                    return false;
                } else {
                    return true;
                }
            }
            
            $("#myform").submit(function(){
                
                name = $("#email1").val();
                inputEmail = $("#email1").val();
                
                if(inputEmail == "" || inputEmail == null){                    
                    $("#email1").focus();
                    alert("Bạn hãy nhập vào Email");
                    return false;
                }  
                if(validateEmail(inputEmail)==false){
                    $("#email1").focus();
                    alert("Email nhập không đúng");
                    return false;
                }
                
            });

        })
</script>

<div class="boxmain">
<div id="title-body-content"><h2>
		<a title="Trang chủ" href="<?php echo DOMAIN?>">Home</a> / <span>Đăng ký Email để nhận thông tin</span></h2>
	</div>
  <div class='new-equipment'>
    <div id="nhanmail" style="padding-top: 3px;">
      <form method="post" action="<?php echo DOMAIN?>home/addemail"  id="myform" name="image" enctype="multipart/form-data">
        <input placeholder=" Nhập email của bạn....."  style="width: 179px;
padding: 2px;" id="email1" class="text-input-register" name="email" type="text" />
        <input style="padding: 2px;border: none;font-size: 12px;" title="Gửi mail" class="button" id="btn_send" type="submit" value="Đăng ký nhận tin" />
        <div id="validate-emai-register"><span id="error"></span></div>
      </form>
    </div>
  </div>
</div>

<!-- End content_center--> 


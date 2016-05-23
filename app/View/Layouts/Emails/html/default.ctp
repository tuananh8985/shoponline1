    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
    <html>
    <body>
		<h3>Thông tin được gửi từ website Đệm Kim ĐAN</h3><br />
		Họ tên : <?php echo $name; ?><br />
		<?php if(isset($address)) {?>
		Địa chỉ : <?php echo $address; ?><br /><?php }?>
		Email :  <?php echo $email; ?><br />
		Điện thoại : <?php echo $mobile; ?><br />
		Tiêu đề : <?php echo $title; ?><br />
		Nội dung : <?php echo $content1; ?><br />
    </body>
    </html>

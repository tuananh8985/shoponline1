<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php echo $this->element('plugin/plugin-seo');?>

<link href="<?php echo DOMAIN ?>images/logo.png" type="images/png" rel="icon">
<script src="<?php echo DOMAIN;?>js/jquery.min.js"></script>

<?php echo $html->css(array('style','validationEngine.jquery','slideshow','main')); ?>
<?php echo $javascript->link('s3Slider'); ?>

<script type="text/javascript">

    $(document).ready(function() {

        $('#slider').s3Slider({

            timeOut: 3000

        });

    });

</script>

<?php echo $html->css('skin'); ?>
<?php echo $javascript->link('jquery.jcarousel.min'); ?>
<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
    	wrap: 'circular'
    });
});

</script>

</head>

<body>
<div id="wrapper">
  <div id="header">
       <div class="logo">
          <img src="<?php echo DOMAIN;?>>images/logo.png" />
       </div>
       <div class="cart">
            <!-- ========== SHOPPING CART ========== -->
                <p class="cart1"><a style="color:#000;" href="<?php echo DOMAIN;?>hien-gio-hang-cua-mat-hang">Có (<?php  if(isset($_SESSION['shopingcart']))
					{ $shopingcart=$_SESSION['shopingcart'];
					  echo count($shopingcart);					
					}
					else
					echo '0';					
					?> ) sản phẩm trong giỏ hàng </a></p>
            <!-- =================================== -->
        </div>
        <div class="search">
            <!-- ========== SEARCH ========== -->
              <form method="get" action="" name="quick_find_header">								
                <input type="text" onfocus="if(this.value =='Search' ) this.value=''" onblur="if(this.value=='') this.value='Search'" class="input1" value="Search" name="keyword">							                <input type="image" class="input2" title=" Search " alt="Search" src="<?php echo DOMAIN;?>images/search.gif">		
            </form>
            <!-- ============================ -->
        </div>
  </div>
  <?php echo $this->element('menu');?>
  <div id="body">
      <?php echo $content_for_layout; ?>
  </div>
   <div id="footer">
       <div id="menu-footer">
          <ul>
      <li><a href="<?php echo DOMAIN;?>">Trang chủ</a></li>
      <li><a href="<?php echo DOMAIN;?>gioi-thieu">GIỚI THIỆU</a></li>
      <li><a href="<?php echo DOMAIN;?>tin-tuc">TIN TỨC</a></li>
      <li><a href="<?php echo DOMAIN;?>san-pham">SẢN PHẨM</a></li>
      <li><a href="<?php echo DOMAIN;?>tuyen-dung">TUYỂN DỤNG</a></li>
      <li style="background:none;"><a href="<?php echo DOMAIN;?>lien-he">LIÊN HỆ</a></li>
    </ul>
       </div>
       <div style="overflow:hidden;">
           <?php echo $this->element('plugin/plugin-footer');?>
       </div>
   </div>
</div>
</body>

</html>


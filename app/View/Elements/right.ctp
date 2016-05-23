
<div id="sidebar-right">
	<div id="row-search">
				<form action="<?php echo DOMAIN ?>tim-kiem.html" method="POST" style="height: 26px;">
					<input type="text" placeholder="Nhập từ khóa tìm kiếm" name="txtsearch" id="txtdangky" value="" onclick="this.value=''" onblur="if (this.value == '')  {this.value = '';}"/>
					<input id="row-img" type="image" src="<?php echo DOMAIN; ?>images/icon_search.png"  border="0"/>
				</form>  
			</div>
			<div>
<div id="r-dk">

	
   <?php 
          $user = $this->Session->read('user');
          if(isset($user) && !empty($user)){ ?>
	<p style="padding-top: 5px;">Xin chào :<span style="font-weight: bold;">
	<?php echo $user['name']; ?></span>
	<a style="color:red;" href="<?php echo DOMAIN; ?>logout"> ( Thoát ) 
	
	
	 <?php } else { ?>
	 <a href="<?php echo DOMAIN?>dang-ky-thanh-vien">Đăng ký &nbsp;&nbsp;&nbsp;| </a>
<a href="<?php echo DOMAIN; ?>dang-nhap">Đăng nhập</a>
	 <?php } ?>
</div>			
			</div>
  <div class="category">
    <ul>
      <li><a title="Học bổng" href="<?php echo DOMAIN?>hoc-bong">HỌC BỔNG</a></li>
      <!--li><a title="Forum" href="#">FORUM</a></li>-->
	    <li><a title="Thư viện" href="<?php echo DOMAIN?>thu-vien-anh">THƯ VIỆN ẢNH</a></li>
      <li><a title="Thư viện" href="<?php echo DOMAIN?>thu-vien">THƯ VIỆN</a></li>

      <li><a title="Q & A" href="<?php echo DOMAIN?>q-a">Q & A</a></li>
      <li><a title="Đăng ký nhận tin hàng ngày" href="<?php echo DOMAIN?>dang-ky-nhan-tin">ĐĂNG KÝ NHẬN TIN HÀNG NGÀY</a></li>
      <li><a title="Liên hệ & Access" href="<?php echo DOMAIN?>lien-he">LIÊN HỆ & ACCESS</a></li>
    </ul>
  </div>
  	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/406nguyentrai" data-width="206" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>			
			
 
  <p style="padding-top:15px;">
    <?php
					$settings = $this->requestAction('comment/setting');
				?>
    <?php echo $settings['Setting']["youtube"]; ?> </p>
	<h2 class="title-right-truong"><a style="color:#FFF;" href="http://gotojapan.vn/tin/268/cac-truong-tai-nhat">Các trường tại Nhật</a></h2>
	<div id="doi-tac">
	<div id="conten_main_right-jcarousellite">
        <ul>
		   <?php
 		   $get_news_right = $this->requestAction('comment/get_news_right');
		   foreach($get_news_right as $rows){
		   ?>
		   <li>
		     <a title="<?php echo $rows['Duhoc']["name"]; ?>" href="<?php echo DOMAIN; ?>ct-tin/<?php echo $rows['Duhoc']['id']; ?>/<?php echo $rows['Duhoc']['alias']?>">
               <img alt="<?php echo $rows['Duhoc']["name"]; ?>" width="200" height="150" src="<?php echo DOMAINAD?><?php echo $rows['Duhoc']['images']?>">
             </a>
	        </li>
		   <?php }?>
        </ul>
  </div>
  </div>
</div>

<div id="sidebar-left">   
    <div class="menu">
	   <p class="title">CHƯƠNG TRÌNH ĐÀO TẠO</p>
	   <ul>
	     <?php
            $support = $this->requestAction('comment/menu_left2');
            foreach ($support as $row) {
                ?>
		<li><a href="<?php echo DOMAIN?>tin-tuc/<?php echo $row['Catalogue']['id']; ?>/<?php echo $row['Catalogue']['alias']; ?>" title="<?php echo $row['Catalogue']['name']; ?>"><?php echo $row['Catalogue']['name']; ?></a></li>
		<?php } ?>
	   </ul>
    </div>
				
				 <div class="online-support" style="margin-top:5px;">
    <p class="title"><img title="HỖ TRỢ TRỰC TUYẾN" alt="HỖ TRỢ TRỰC TUYẾN"  align="left" src="<?php echo DOMAIN?>images/icon_yahoo.png" />HỖ TRỢ TRỰC TUYẾN</p>
    <?php
            $support = $this->requestAction('comment/support');
            foreach ($support as $row) {
                ?>
    <div class="livechat">
      <p><span><?php echo $row['Support']['name']; ?> </span>: <?php echo $row['Support']['telephone']; ?></p>
     <?php if($row['Support']['skype']){?>
	 <a href="skype:<?php echo $row['Support']['skype']; ?>?chat">
         <img src="http://mystatus.skype.com/balloon/<?php echo $row['Support']['skype']; ?>" style="width:83px;"align="absmiddle" style="margin-right:10px;">
      </a>
	  <?php } ?>
	   <?php if($row['Support']['yahoo']){?>
      <a href="ymsgr:sendim?<?php echo $row['Support']['yahoo']; ?>"> 
          <img src="http://opi.yahoo.com/online?u=<?php echo $row['Support']['yahoo']; ?>&amp;m=g&amp;t=1&amp;l=us" border="0" align="absmiddle">
       </a>
               <?php } ?>           
      </div>
    <?php } ?>
<?php
$settings = $this->requestAction('comment/setting');
?>
    <div id="row-hotline">
      <p id="r-hot"><img alt="Hotline" title="Hotline" src="<?php echo DOMAIN?>images/icon_call.jpg"><?php echo $settings['Setting']['hotline'] ?></p>
      <p><img alt="Email" title="Email" src="<?php echo DOMAIN?>images/email.png"><?php echo $settings['Setting']['email'] ?></p>
    </div>
  </div>
     
	    
	 <div class="menu">
	   <p class="title">FACEBOOK</p>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/tuyensinhhot?ref=ts&fref=ts" data-width="219" data-height="250" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
        </div>
 <div class="menu">
	   <p class="title">ĐĂNG KÝ ONLINE</p>
	<a href="<?php echo DOMAIN?>lien-he.html" title="Đăng ký học online">   
	<img style="  padding: 10px 5px;" src="<?php echo DOMAIN?>images/reg.png" alt="Đăng ký online" title="Đăng ký online">
	   </a></div>
	   
	 
	 <div class="menu">
		  <?php
               $adv_left = $this->requestAction('comment/adv_left');
     foreach ($adv_left as $adv) {   ?>
                     <a target="_blank" title="<?php echo $adv['Slideshow']['name']?>" href="<?php echo $adv['Slideshow']['link']?>"> <img id="row-lk" title="<?php echo $adv['Slideshow']['name']?>" alt="<?php echo $adv['Slideshow']['name']?>"src="<?php echo DOMAINAD . $adv['Slideshow']['images'] ?>" /></a>
					  <?php } ?>
    </div>  <div class="menu">  <p class="title">THỐNG KÊ TRUY CẬP</p>
	
<DIV style="padding:10px 40px;">
	<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="web log free" ><script  type="text/javascript" >
try {Histats.start(1,3015452,4,3021,130,80,"00011111");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?3015452&101" alt="web log free" border="0"></a></noscript>
<!-- Histats.com  END  -->
	   </DIV>   </DIV>
		</div>

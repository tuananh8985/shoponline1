<div id="header">
              	   <?php
            $banner = $this->requestAction('comment/banner');
            foreach ($banner as $banner) {
                ?>
				
				   <a href="<?php echo DOMAIN?>"> 
			
				<?php 
				if (substr($banner['Banner']['images'], -3) == "swf") {
                ?>
                <embed src="<?php echo IMAGEAD; ?>banner/<?php echo $banner['Banner']['images']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="1000" height="110" scale="ExactFit"> </embed>
                <?php } else { ?>
				<img style="float:left;height: 140px;" src="<?php echo IMAGEAD; ?>banner/<?php echo $banner['Banner']['images']; ?>" alt="Kymdan" border="0" />
                    <?php
                }
    ?>  
          </a>
		  <?php } ?>	
		  <div id="show-hot">
			<div id="row-search">
				<form action="<?php echo DOMAIN ?>tim-kiem.html" method="POST" style="height: 26px;">
					<input type="text" placeholder="Nhập từ khóa tìm kiếm" name="txtsearch" id="txtdangky" value="" onclick="this.value=''" onblur="if (this.value == '')  {this.value = '';}"/>
					<input id="row-img" type="image" src="<?php echo DOMAIN; ?>images/icon_search.png"  border="0"/>
				</form>  
			</div>
			<?php
$settings = $this->requestAction('comment/setting');
?>
<div> <?php echo $settings['Setting']['contactinfo_eg']; ?></div>
		  </div>
</div>
	   
	   


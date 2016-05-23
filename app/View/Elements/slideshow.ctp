<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN?>engine1/style.css" />
<!--<script type="text/javascript" src="<?php echo DOMAIN?>engine1/jquery.js"></script>-->
<div id="slide">
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
	<?php
               $slide = $this->requestAction('comment/slideshow');
     foreach ($slide as $row) {   ?>
<li><img src="<?php echo DOMAINAD . $row['Slideshow']['images'] ?>" alt="<?php echo $row['Slideshow']['name'] ?>"  title=""  id="wows1_0"/></li>
<?php } ?> 

</ul></div>
<div class="ws_bullets"><div>
	<?php
               $slide = $this->requestAction('comment/slideshow');
     foreach ($slide as $row) {   ?>
<a href="#" title="<?php echo $row['Slideshow']['name'] ?>"><img  title="<?php echo $row['Slideshow']['name'] ?>" src="<?php echo DOMAINAD . $row['Slideshow']['images'] ?>" alt="<?php echo $row['Slideshow']['name'] ?>"/></a>
<?php } ?> 

</div></div>
	<div class="ws_shadow"></div>
	</div>
	<div id="img-adv">
	 <?php
		  $adv = $this->requestAction('comment/get_adv');
            foreach ($adv as $row) { 
                ?>
				<a href="<?php echo $row['Slideshow']['link'] ?>" title="<?php echo $row['Slideshow']['name'] ?>">
				<img style="  border: 3px solid #fff;border-right:0px;" width="278" height="119"title="<?php echo $row['Slideshow']['name'] ?>" src="<?php echo DOMAINAD . $row['Slideshow']['images'] ?>" alt="<?php echo $row['Slideshow']['name'] ?>"/></a>
				<?php } ?></div>
</div>
	
	
	<script type="text/javascript" src="<?php echo DOMAIN?>engine1/wowslider.js"></script>
	<script type="text/javascript" src="<?php echo DOMAIN?>engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->

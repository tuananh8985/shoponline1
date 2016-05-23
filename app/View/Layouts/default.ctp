<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta content="noodp,noydir" name="robots">
				<?php
        if (isset($keywords_for_layout)) {
            echo "<meta name='keywords' content='" . $keywords_for_layout . "' /> ";
        }
        if (isset($description_for_layout)) {
            echo "<meta name='description' content='" . $description_for_layout . "' />";
        }
        ?>
        <title>
            <?php
            if (isset($title_for_layout)) {
                echo $title_for_layout;
            }
            ?>
		</title>
		<link href="<?php echo DOMAIN?>images/logo.png" type="images/gif" rel="icon">
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<link href="<?php echo DOMAIN ?>css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN?>engine1/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN ?>css/menukhung.css" />
		<script type="text/javascript" src="<?php echo DOMAIN?>js/jquery.min.js"></script>
</head>
                             
<body>
   <div id="wrapper-banner">
   <?php echo $this->element('header') ?>
    <?php echo $this->element('menu_top') ?>
       <div id="banner"><p><?php echo $this->element('slideshow') ?></p></div>
	  
   </div>
   <div id="wrapper-content">
       <div id="body">

           <div id="body-content">
             <!----sidebar left---->
             <?php echo $this->element('left') ?>
              <!------content--------->
              <div id="content">
				<?php echo $content_for_layout; ?>
              </div>
              <!----------sidebar right------------>
              
           </div>
         	<?php echo $this->element('partner') ?>
       </div>
	     <div id="footer">
               <?php echo $this->element('footer') ?>
           </div>								
<?php 
	$quangcao_left=$this->requestAction('comment/quangcao_trai');
	$quangcao_right=$this->requestAction('comment/quangcao_phai');

?>


	<div id="divAdRight" style="DISPLAY: none; POSITION: absolute;">
		<?php foreach($quangcao_right as $row) {
		if(isset($row['Advertisement'])) {
		?>
	
		<div style="margin-bottom:5px;margin-left: 5px;  margin-top: 153px;">
			<a target="_blank"  href="<?php echo $row['Advertisement']['link']?>" rel="nofollow">
			 <img style="width: 140px;"src="<?php echo IMAGEAD ?>logo/<?php echo $row['Advertisement']['images'] ?>" style="border:0px;" />
          </a>
		</div>
		<?php } } ?>
		
    </div>	
    <div id="divAdLeft" style="DISPLAY: none; POSITION: absolute;">
	<?php foreach($quangcao_left as $row) {
		if(isset($row['Advertisement'])) {
		?>
		<div style="margin-bottom:5px;  margin-top: 153px;">
			<a target="_blank"  href="<?php echo $row['Advertisement']['link']?>" rel="nofollow">
			         <img style="width: 140px;"src="<?php echo IMAGEAD ?>logo/<?php echo $row['Advertisement']['images'] ?>" style="border:0px;" />
                          
			</a>
		</div>
		<?php } 
		
		} ?>
    </div>
	
  <script src="<?php echo DOMAIN?>js/banner.js" type="text/javascript"></script>
    <script>
    document.write("<script type='text/javascript' language='javascript'>MainContentW = 1000;LeftBannerW = 140;RightBannerW = 125;LeftAdjust = 5;RightAdjust = 5;TopAdjust = 10;ShowAdDiv();window.onresize=ShowAdDiv;;<\/script>");
	
    </script>
   </div>
</body>
                                </html>
								

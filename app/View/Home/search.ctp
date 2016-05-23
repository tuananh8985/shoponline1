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
<?php echo $this->Html->css(array('content', 'phantrang')); ?>
<div id="bor-content">
<div id="rw-title">
	<h2 id="title-top">
KẾT QUẢ TÌM KIẾM CHO TỪ KHÓA " <?php echo $keyword ?>" ( <?php echo $count?>)		
	</h2>
	</div>
	<div id="rw-cont">
	<div class="news-content">
		  <?php
            foreach ($listNews as $row1) {
          
                ?>
			
<div class="prod2">  	
<a  title="<?php echo $row1['News']["name"]; ?>" alt="<?php echo $row1['News']["name"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-tin-tuc/<?php echo $row1['News']['id'] ?>/<?php echo $row1['News']['alias'].'.html' ?>">
 
  <div class="rows-img">
<?php if($row1['News']['images']){?>
	<img alt="<?php echo $row1['News']["name"]; ?>" title="<?php echo $row1['News']["name"]; ?>"  class="anh" src="<?php echo IMAGEAD ?>news/
<?php echo $row1['News']['images'] ?>"  />
<?php } else {?>
<img alt="<?php echo $row1['News']["name"]; ?>" title="<?php echo $row1['News']["name"]; ?>"  class="anh" src="<?php echo DOMAIN ?>images/no-image.jpg"  />

<?php } ?>

</div></a>
<div id="r-right">
<a  title="<?php echo $row1['News']["name"]; ?>" alt="<?php echo $row1['News']["name"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-tin-tuc/<?php echo $row1['News']['id'] ?>/<?php echo $row1['News']['alias'].'.html' ?>">
 
<h2 style="height: 35px;"><?php echo $row1['News']["name"]; ?></h2></a>
	<span id="ngaytao"><?php echo $row1['News']["created"]; ?></span>
	<div style="  padding-top: 10px;"><?php echo $this->Help->shortDesc($row1['News']['shortdes'], 120);?></div>
</div>
</div>

				<?php } ?>
	</div>
</div></div>
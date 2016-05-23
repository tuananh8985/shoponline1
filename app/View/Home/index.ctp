
<div id="bor-content">
<div id="rw-title">
	<h2 id="title-top">
		Tin tuyển sinh	<span><a href="" title="" id="xemtat">Xem thêm »</a></span>
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
<!--end dự án--->
<div id="bor-content">

	<div id="rw-cont">

	<ul style="background:#f5efef;  height: 400px">
	<div id="rw-title">
	<h2 id="title-top" style="margin-bottom:10px;">
		Liên thông đại học
	</h2>
	</div>
		  <?php
		  $a=0;
		   $listNews2 = $this->requestAction('comment/getlienthong');
            foreach ($listNews2 as $row1) { 
			$a++;
                ?>
<div id="row-sale">  
	<a  title="<?php echo $row1['News']["name"]; ?>" alt="<?php echo $row1['News']["name"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-tin-tuc/<?php echo $row1['News']['id'] ?>/<?php echo $row1['News']['alias'].'.html' ?>">
  
<div id="rows-img-sale1">
<?php if($row1['News']['images']){?>
	<img alt="<?php echo $row1['News']["name"]; ?>" title="<?php echo $row1['News']["name"]; ?>"  class="anh" src="<?php echo IMAGEAD ?>news/<?php echo $row1['News']['images'] ?>"  />
<?php } else {?>
	<img alt="<?php echo $row1['News']["name"]; ?>" title="<?php echo $row1['News']["name"]; ?>"  class="anh" src="<?php echo DOMAIN ?>images/no-image.jpg"  />
<?php } ?>
</div>
<h2><?php echo $row1['News']["name"]; ?></h2></a>
<p><?php echo $this->Help->shortDesc($row1['News']['shortdes'], 70);?></p>

</div>


				<?php } ?>
				<p><span><a href="" title="" id="xemtat">Xem thêm »</a></span></p>
				</ul>
				<ul style="background:#f5efef;  height: 400px"><div id="rw-title">
	<h2 id="title-top" style="margin-bottom:10px;">
		Bản tin giáo dục
	</h2>
	</div>
	  <?php
		  $a=0;
		   $listNews2 = $this->requestAction('comment/get_newsale');
            foreach ($listNews2 as $row1) { 
			$a++;
                ?>			
				<?php if($a==1){?>
				<div id="row-sale">  
	<a  title="<?php echo $row1['News']["name"]; ?>" alt="<?php echo $row1['News']["name"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-tin-tuc/<?php echo $row1['News']['id'] ?>/<?php echo $row1['News']['alias'].'.html' ?>">
  
<div id="rows-img-sale1">
<?php if($row1['News']['images']){?>
	<img alt="<?php echo $row1['News']["name"]; ?>" title="<?php echo $row1['News']["name"]; ?>"  class="anh" src="<?php echo IMAGEAD ?>news/<?php echo $row1['News']['images'] ?>"  />
<?php } else {?>
	<img alt="<?php echo $row1['News']["name"]; ?>" title="<?php echo $row1['News']["name"]; ?>"  class="anh" src="<?php echo DOMAIN ?>images/no-image.jpg"  />
<?php } ?>
</div>
<h2><?php echo $row1['News']["name"]; ?></h2></a>
<p><?php echo $this->Help->shortDesc($row1['News']['shortdes'], 70);?></p>

</div>
				<?php } else{ ?>
<div id="row-sale2">  
	<a  title="<?php echo $row1['News']["name"]; ?>" alt="<?php echo $row1['News']["name"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-tin-tuc/<?php echo $row1['News']['id'] ?>/<?php echo $row1['News']['alias'].'.html' ?>">
<h2><?php echo $row1['News']["name"]; ?></h2></a>

</div>

	<?php } ?><?php } ?><p><span><a href="" title="" id="xemtat" style="  padding-top: 10px;">Xem thêm »</a></span></p>
					</ul>

</div>

<div id="rw-cont">

	<ul>
	
	<h2 id="title-top1" style="margin-bottom:10px;">
		Học viên ưu tú
	</h2>

		  <?php
		  $a=0;
		   $listNews2 = $this->requestAction('comment/phanhoi');
            foreach ($listNews2 as $row1) { 
			$a++;
                ?>
<div id="row-sale02">  
	<a  title="<?php echo $row1['Tintuc']["name"]; ?>" alt="<?php echo $row1['Tintuc']["name"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-tin/<?php echo $row1['Tintuc']['id'] ?>/<?php echo $row1['Tintuc']['alias'].'.html' ?>">
  
<div id="rows-img-sale2">
<?php if($row1['Tintuc']['images']){?>
	<img alt="<?php echo $row1['Tintuc']["name"]; ?>" title="<?php echo $row1['Tintuc']["name"]; ?>"  class="anh1" src="<?php echo IMAGEAD ?>tintuc/<?php echo $row1['Tintuc']['images'] ?>"  />
<?php } else {?>
	<img alt="<?php echo $row1['Tintuc']["name"]; ?>" title="<?php echo $row1['Tintuc']["name"]; ?>"  class="anh1" src="<?php echo DOMAIN ?>images/no-image.jpg"  />
<?php } ?>
</div>
<h2><?php echo $row1['Tintuc']["name"]; ?></h2></a>
<p><?php echo $this->Help->shortDesc($row1['Tintuc']['shortdes'], 70);?></p>

</div>


				<?php } ?>
				</ul>
				<ul>
	<h2 id="title-top1" style="margin-bottom:10px;">
	Video
	</h2>

			
				<div id="row-sale"> 
				    <?php $row1 = $this->requestAction('comment/setting');
            ?>
	 <?php echo $row1['Setting']['youtube'] ?>

</div>

	
					</ul>

</div>



</div>

			
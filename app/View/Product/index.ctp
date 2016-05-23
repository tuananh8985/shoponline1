 <?php 
//echo $this->Session->read('language'); die;
if($this->Session->read('language')=='vie') 
{  
  include('../Vendor/lang_vn.php');
  $duoi=null; 
} 
else { $duoi="_eg"; include('../Vendor/lang_eng.php');
 }?>
<div class="boxmain">
<div id="intro">
<h3><?php echo $typeName['Catproduct']["name"]; ?></h3>
<div class="rows-product">
   <?php
            $i = 0;
            foreach ($listProduct as $row1) {
                $i++;
 
              
                ?>	
			<div class="prod">  	<a  title="<?php echo $row1['Product']["name$duoi"]; ?>" alt="<?php echo $row1['Product']["name$duoi"]; ?>" href="<?php echo DOMAIN ?>ct-sp/<?php echo $row1['Product']['id'] ?>/<?php echo $row1['Product']['alias'].'.html' ?>">
<div class="prod-con">  
<div class="rows-img">
<?php if($row1['Product']['images']){?>
	<img alt="<?php echo $row1['Product']["name"]; ?>" title="<?php echo $row1['Product']["name$duoi"]; ?>"  class="anh" src="<?php echo DOMAINAD ?>
<?php echo $row1['Product']['images'] ?>"  />
<?php } else {?>
<img alt="<?php echo $row1['Product']["name"]; ?>" title="<?php echo $row1['Product']["name$duoi"]; ?>"  class="anh" src="<?php echo DOMAIN ?>images/no-image.jpg"  />

<?php } ?>

</div>
<h2><?php echo $row1['Product']["name"]; ?></h2>
<p class="gia">Giá :  <?php echo number_format($row1['Product']['price']);?>&nbsp; VNĐ</p>

</div></a></div>
            <?php } ?>
           
        <div class="pt">
            <div class="pt-pagi">
<?php echo $this->Paginator->numbers(); ?>
            </div><!-- End pt-pagi-->
        </div><!-- End pt-->	
		</div>
		</div>
</div>




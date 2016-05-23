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
<div id='intro1'>


                            <h2> KẾT QUẢ TÌM KIẾM CHO TỪ KHÓA " <?php echo $keyword ?>" ( <?php echo $count ?>)</h2>
                     
     
        <table width="1000" cellpadding="5" cellspacing="10">
            <?php
      
            foreach ($listProduct as $row1) {
         
                ?>	<a  title="<?php echo $row1['Product']["name$duoi"]; ?>" alt="<?php echo $row1['Product']["name$duoi"]; ?>" href="<?php echo DOMAIN ?>ct-sp/<?php echo $row1['Product']['id'] ?>/<?php echo $row1['Product']['alias'].'.html' ?>">
<div class="prod">  
<h2><?php echo $row1['Product']["name"]; ?></h2>
<div class="rows-img">
<?php if($row1['Product']['images']){?>
	<img alt="<?php echo $row1['Product']["name"]; ?>" title="<?php echo $row1['Product']["name$duoi"]; ?>"  class="anh" src="<?php echo DOMAINAD ?>
<?php echo $row1['Product']['images'] ?>"  />
<?php } else {?>
<img alt="<?php echo $row1['Product']["name"]; ?>" title="<?php echo $row1['Product']["name$duoi"]; ?>"  class="anh" src="<?php echo DOMAIN ?>images/no-image.jpg"  />

<?php } ?>

</div>

<p id="row-ct">
<a href="<?php echo DOMAIN?>them-vao-gio/<?php echo $row1['Product']['id']?>" ><span id="btn_datmua">Đặt mua</span></a>
<a  title="<?php echo $row1['Product']["name$duoi"]; ?>" alt="<?php echo $row1['Product']["name$duoi"]; ?>" href="<?php echo DOMAIN ?>ct-sp/<?php echo $row1['Product']['id'] ?>/<?php echo $row1['Product']['alias'].'.html' ?>">
<span id="btn_chitiet">Chi tiết »</span></a></p>
</div>
</a>
                 <?php }?>
</table>
        <div class="pt">
            <div class="pt-pagi">
                <?php echo $this->Paginator->numbers(); ?>
            </div><!-- End pt-pagi-->
        </div><!-- End pt-->	

</div>

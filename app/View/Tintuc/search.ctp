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
<div class="boxmain">

    <div class="div_content">
 <div class="main">
                        <div class="title_top_news_detail" style="margin-top:7px;margin-bottom:7px;margin-left:5px;">
       <p>  Kết quả tìm thấy cho từ khóa  " <?php echo $keyword ?>" ( <?php echo $count ?>)</p>
   </div></div>


     
      <table class="bg_dichvu"  border="0" cellspacing="0" cellpadding="0">
           <?php foreach ($listProduct as $rows) { ?>
                        <div style="width:624px;overflow:hidden;margin-top:10px;">
                      
								 <img style="float:left;border: 1px solid #d2d1d1;padding:2px;"width="120" height="90"src="<?php echo IMAGEAD?>tintuc/<?php echo $rows['Tintuc']['images']?>">
								 <div align="justify" style="overflow:hidden;width: 477px;padding-left: 10px;">
                                    <a id="tenbaiviet1" href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['Tintuc']['id']; ?>/<?php echo $rows['Tintuc']['alias'].'.html'; ?>"><?php echo $rows['Tintuc']["name$duoi"]; ?></a>
                                    <div class="content" style="overflow: hidden;font-size:12px"> <?php echo $rows['Tintuc']["shortdes$duoi"]; ?></div>
                                    <div align="right" class="detail"><a style="padding-right: 9px;"href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['Tintuc']['id']; ?>/<?php echo $rows['Tintuc']['alias'].'.html'; ?>"><?php echo $chitiet; ?></a></div>
                           </div>     
						      </div> 
                      
                    <?php } ?>

        </table>

        <div class="pt">
            <div class="pt-pagi">
                <?php echo $this->Paginator->numbers(); ?>
            </div><!-- End pt-pagi-->
        </div><!-- End pt-->	

    </div>

</div>



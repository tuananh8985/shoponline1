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
<div id='center'>


                        <div class="title_top_news_detail">
          DANH SÁCH SẢN PHẨM
              
   </div><form action='' method='post' >
  	<select id="jumpMenu" style="width: 170px;margin-right:17px;float:left;margin-bottom:10px;">
				<script>
					$(function(){
						$("#jumpMenu").change(function(){
						 window.open($(this).val(),'');
						});
					});
				
				</script>			
			<option>Lọc thương hiệu </option>
				<?php $hang=$this->requestAction('comment/get_hang');

				foreach($hang as $row) {

				?><option value="<?php echo DOMAIN?>danh-sach-sp/<?php echo $row['Hang']['id'];?>/<?php echo $row['Hang']["slug"];?>"><?php echo $row['Hang']["name"];?></option>
				<?php } ?>
	</select></form>
	<form action='' method='post' >
  	<select id="jumpMenu1" style="width: 170px;margin-right:17px;float:left;margin-bottom:10px;">
				<script>
					$(function(){
						$("#jumpMenu1").change(function(){
						 window.open($(this).val(),'');
						});
					});
				
				</script>
				<option value="">Hiển thị 18 sản phẩm</option>
				<option value="">Hiển thị 24 sản phẩm</option>
				<option value="">Hiển thị 30 sản phẩm</option>
				<option value="">Hiển thị 36 sản phẩm</option>
				<option value="">Xem hết</option>
	</select></form>
	<form action='' method='post' >
	<script>
					$(function(){
						$("#jumpMenu2").change(function(){
						 window.open($(this).val(),'');
						});
					});
				</script>
	<select id="jumpMenu2" style="width: 170px;float:right;margin-right:10px;margin-bottom:10px;">
				<option value="">Sắp xếp từ A->Z</option>
				<option value="">Sắp xếp từ Z->A</option>
				<option value="">Mới nhất</option>
				<option value="">Cũ nhất</option>
	</select>
	</form>

 <?php
				$i=0;$mang=array();  
                foreach ($listProduct as $row1) {
				$images=explode('|',$row1['Product']['images']);
				$i++;$mang[$i]=$row1;
                    ?>

             <div class="tour">
			<figure class="fig1">
					<a  title="<?php echo $row1['Product']["name$duoi"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-san-pham/<?php echo $row1['Product']['id'] ?>/<?php echo $row1['Product']['alias'].'.html' ?>">
                               <div class="prod">  
							   <div class="nhapnhay"><img src="<?php echo DOMAIN?>images/km1.gif"></div>
                     <img title="<?php echo $row1['Product']["name$duoi"]; ?>" alt="image" class="anh" src="<?php echo DOMAINAD ?><?php echo $row1['Product']['images'] ?>"  /><!--data-tooltip="sticky<?php echo $i?>"-->
					  </div>
					  </a>
				</figure>
				<a  title="<?php echo $row1['Product']["name$duoi"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-san-pham/<?php echo $row1['Product']['id'] ?>/<?php echo $row1['Product']['alias'].'.html' ?>">	<p class="tieude_tour"><?php echo $row1['Product']['name'] ?></p></a>
				
				<p style="text-align:center;"><s><p class="gia1">Giá cũ :&nbsp; 
					<?php if($row1['Product']['priceold']){ ?>
					<?php echo number_format($row1['Product']['priceold']);?>&nbsp; VNĐ
					<?php } else {?>
					Liên hệ
					<?php }?>
					</p></s></p>
					<p class="gia">Giá KM : &nbsp;
					<?php if($row1['Product']['price']){ ?>
					<?php echo number_format($row1['Product']['price']);?>&nbsp; VNĐ
					<?php } else {?>
					Liên hệ
					<?php }?>
					</p>
					<p class="row-km"><?php echo $row1['Product']["quatang"]; ?></p>
				<!--	<a href="<?php echo DOMAIN?>them-vao-gio/<?php echo $row1['Product']['id']?>"><div class="btn_dattour">Đặt mua</div></a>-->
				</div>
			   <?php }  ?>
        

			
			  
       <!--end .new-equipment-->  <div class="pagination">
                        <?php
                         echo $this->Paginator->first('« Đầu ', null, null, array('class' => 'disabled'));     
                        echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); 
                        echo $this->Paginator->numbers() . " ";
                         echo $this->Paginator->next(' Tiếp »', null, null, array('class' => 'disabled')); 
                         echo $this->Paginator->last('« Cuối ', null, null, array('class' => 'disabled')); 
                        ?>
                    </div>
    </div>
	<div id="mystickytooltip" class="stickytooltip">
 
 	 <?php foreach($mang as $key=>$row1){
                    ?>
<div>
<div id="sticky<?php echo $key; ?>" class="atip">
	
	<p class="tieude_tour" style="margin-top:0px;height:30px;background:#c70003;color:white;line-height:30px;"><?php echo $row1['Product']['name'] ?></p>
<div class="stic_hover">	<p style="text-align:center;"><p class="gia1" style="text-align:left;">Giá cũ :&nbsp; 
					<?php if($row1['Product']['priceold']){ ?>
				<s>	<?php echo number_format($row1['Product']['priceold']);?>&nbsp; VNĐ</s>
					<?php } else {?>
					Liên hệ
					<?php }?>
					</p></p>
					<p class="gia" style="text-align:left;">Giá mới : &nbsp;
					<?php if($row1['Product']['price']){ ?>
					<?php echo number_format($row1['Product']['price']);?>&nbsp; VNĐ
					<?php } else {?>
					Liên hệ
					<?php }?>
					</p>
					<p>Quà tặng : <?php echo $row1['Product']["quatang"]; ?></p>
					</div>
</div>
</div>
 <?php } ?>
</div>
<div class="boxmain">
<div id="intro">
<h3><?php echo $typeName['Catproduct']["name"]; ?></h3>
 <div class="tb_chitiet">
<a><img id="detail-img" src="<?php echo DOMAINAD?><?php echo $detailNews['Product']['images'] ?>" alt="New York"></a>
			 <br/>	
 <div id="r-2">
			<p style="font-weight:bold;">Tên sản phẩm:&nbsp;<?php echo $detailNews['Product']['name']?></p>
			 <p style="font-weight:bold;">Mã sản phẩm :&nbsp;<?php echo $detailNews['Product']['code']?></p>

	<p class="gia1" style="text-align:left;font-weight:bold;color:red;">Giá :&nbsp;<?php echo number_format($detailNews['Product']['price']);?>&nbsp; VNĐ </p>
</div>
<div id="r-3">
	<p><img src="<?php echo DOMAIN?>images/icon-truck2.png"><span>Giao hàng toàn quốc</span></p>
	<p><img src="<?php echo DOMAIN?>images/icon-bill.png"><span>Thanh toán khi nhận hàng</span></p>
	<p><img src="<?php echo DOMAIN?>images/icon-phone2.png"><span>Điện thoại hỗ trợ</span></p>
	<div id="row-hot-line">
		<?php
				$settings = $this->requestAction('comment/setting');
				?>
			<p id="r-001"><?php echo $settings['Setting']['telephone']; ?></p>
			<p id="r-001"><?php echo $settings['Setting']['hotline']; ?></p>
			<div id="r-002">
			<p>Từ 8:00 đến 20:00 thứ 2-6, 8:00 đến 18:00 </p>
			<p>thứ 7 và 8:00 đến 17:00 Chủ Nhật</p>
			</div>
	</div>
</div>	 

      
	
		
<div class="noidung">
		
				<div> <?php echo $detailNews['Product']["content"];?></div>
			</div>

    </div>
</div>
<div id="intro">
<h3>Sản phẩm liên quan</h3>
	<div class="rows-product" >
	<div>
   <?php
            $i = 0;
            foreach ($listProduct as $row1) {
                $i++;
 
              
                ?>	
				<div class="prod">  	<a  title="<?php echo $row1['Product']["name"]; ?>" alt="<?php echo $row1['Product']["name"]; ?>" href="<?php echo DOMAIN ?>ct-sp/<?php echo $row1['Product']['id'] ?>/<?php echo $row1['Product']['alias'].'.html' ?>">
  
<div class="rows-img">
<?php if($row1['Product']['images']){?>
	<img alt="<?php echo $row1['Product']["name"]; ?>" title="<?php echo $row1['Product']["name"]; ?>"  class="anh" src="<?php echo DOMAINAD ?>
<?php echo $row1['Product']['images'] ?>"  />
<?php } else {?>
<img alt="<?php echo $row1['Product']["name"]; ?>" title="<?php echo $row1['Product']["name"]; ?>"  class="anh" src="<?php echo DOMAIN ?>images/no-image.jpg"  />

<?php } ?>

</div>
<h2><?php echo $row1['Product']["name"]; ?></h2></a>
<p class="gia">Giá :  <?php echo number_format($row1['Product']['price']);?>&nbsp; VNĐ</p>

</div>
            <?php } ?>
           
        <div class="pt">
            <div class="pt-pagi">
<?php echo $this->Paginator->numbers(); ?>
            </div><!-- End pt-pagi-->
        </div><!-- End pt-->	
		</div></div>
		</div>

</div>
  
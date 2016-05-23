<div class="boxmain">
<div id="title_content">
             <h2>Thư viện ảnh</h2>		
   </div>
    <div class="div_content" >
         <?php
    $product = $this->requestAction('comment/catrecruitment');
    //pr($product); die;
    foreach ($product as $row) {
        ?>
        <div id="row-image">
                <div class="main">
				 <a href="<?php echo DOMAIN ?>danh-sach-anh/<?php echo $row['Listimage']['id'] ?>">
                    <div class="row-img1"> 
			      <img src="<?php echo DOMAINAD?>/timthumb.php?src=img/listimage/<?php echo $row['Listimage']['images']?>&amp;h=189&amp;w=280&amp;zc=1"/>
</div>
</a>     
	<p style="text-align: center;padding-top:10px;width: 154px;"><?php echo $row['Listimage']["name"]; ?></p>            
                </div>
                <div class="clear"></div>
            </div>	    <?php } ?>
			  
        </div>
    </div>
	
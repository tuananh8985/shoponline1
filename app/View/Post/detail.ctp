<div class="boxmain">
	<div id="title_content">
		<h2><?php echo $detailNews['Post']["name"]; ?></h2>
   </div>
      <div class='new-equipment'>
		<?php echo $detailNews['Post']["content"]; ?>
		</div>   
<br/>
	
	<div id="title_content">
		<h3>Các tin liên quan</h3>
   </div>
        <table width="100%" cellpadding="5" cellspacing="10">
            <?php
            foreach ($listNews as $row) {       
                ?>
					  <div class="div_sp">
              
						<p><a href="<?php echo DOMAIN ?>chi-tiet-tin/<?php echo $row['Post']['id'] ?>/<?php echo $row['Post']['slug']?>">-&nbsp;&nbsp;<span id="created">  ( Ngày đăng : <?php echo $row['Post']["created"]; ?> )</span> <?php echo $row['Post']["name"] ?> </div>
                            </a>
                    </p>
            
            <?php } ?>
            
        </table>
		 </div>
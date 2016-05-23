<div class="boxmain">
	<div id="title_content">
		<h2><?php echo $detailNews['Tintuc']["name"]; ?></h2>
   </div>
      <div class='new-equipment'>
		<?php echo $detailNews['Tintuc']["content"]; ?>
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
              
						<p><a href="<?php echo DOMAIN ?>ct/<?php echo $row['Tintuc']['id'] ?>/<?php echo $row['Tintuc']['slug']?>">-&nbsp;&nbsp;<?php echo $row['Tintuc']["name"] ?></div>
                            </a>
                    </p>
            
            <?php } ?>
            
        </table>
		 </div>
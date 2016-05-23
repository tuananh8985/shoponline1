<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN?>css/ddsmoothmenu.css" />

	<script type="text/javascript" src="<?php echo DOMAIN?>js/ddsmoothmenu.js"></script>

<script type="text/javascript">
    ddsmoothmenu.init({
        mainmenuid: "smoothmenu3",
        orientation: 'h',
        classname: 'ddsmoothmenu3',
        contentsource: "markup"
    })
</script>

<div class="navbar">
    <div id="smoothmenu3" class="ddsmoothmenu3">
        <ul>
       <li>
             <a alt="Trang chủ" title="Trang chủ"  href="<?php echo DOMAIN ?>" class="sf-with-ul" ><h2>Trang chủ</h2></a>
            </li>

		  
			<?php  
				$product = $this->requestAction('comment/menu_top');
				$i=1;
                foreach ($product as $row) {
				$i++;
				?>

                    <li>
						<a alt="<?php echo $row['Catalogue']["name"] ?>" title="<?php echo $row['Catalogue']["name"] ?>" href="<?php echo DOMAIN ?>tin-tuc/<?php echo $row['Catalogue']['id']?>/<?php echo $row['Catalogue']['alias']?>" class="sf-with-ul">
						<h2><?php echo $row['Catalogue']["name"] ?></h2></a>
  <ul >
                <?php $menu2 = $this->requestAction('comment/menu_top/' . $row['Catalogue']['id']);

                foreach ($menu2 as $row1) {
                    ?>

                    <li><a href="<?php echo DOMAIN ?>tin-tuc/<?php echo $row1['Catalogue']['id'] ?>/<?php echo $row1['Catalogue']['alias'] ?>" class="sf-with-ul"><?php echo $row1['Catalogue']["name"] ?></a>
					
					</li>
            <?php } ?>
            </ul>					
					
					</li>

                    <?php
                }
                ?>
           <li>
                <a title="Liên hệ" alt="Liên hệ" href="<?php echo DOMAIN; ?>lien-he.html"  class="sf-with-ul"><h2>Liên hệ</h2></a>
		   </li>
        </ul>
    </div>


</div>
 <?php
$settings = $this->requestAction('comment/setting');
?>
 <div id="text-footer">
 <div id="r-foot" style="text-align:center;">
	<h1><?php echo $settings['Setting']['name']; ?></h1>
Email: <?php echo $settings['Setting']['email']; ?>| Hotline: 
<?php echo $settings['Setting']['hotline']; ?> - <?php echo $settings['Setting']['telephone']; ?>
	</div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
	
         <tr>
        
            <td>
			<h2>Địa chỉ</h2>
             <?php echo $settings['Setting']['contactinfo']; ?>
            </td>
			 <td>
			 <h2>Hello, Teachers</h2>
           	  <?php
		  $a=0;
		   $listNews2 = $this->requestAction('comment/phanhoi1');
            foreach ($listNews2 as $row1) { 
			$a++;
                ?>
			<li>
	<a  title="<?php echo $row1['Tintuc']["name"]; ?>" alt="<?php echo $row1['Tintuc']["name"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-tin/<?php echo $row1['Tintuc']['id'] ?>/<?php echo $row1['Tintuc']['alias'].'.html' ?>">

<?php echo $row1['Tintuc']["name"]; ?></a></li>



				<?php } ?>
            </td>
			 <td>
			 <h2>Học Tiếng Anh</h2>
             <?php
		  $a=0;
		   $listNews2 = $this->requestAction('comment/phanhoi2');
            foreach ($listNews2 as $row1) { 
			$a++;
                ?>
			<li>
	<a  title="<?php echo $row1['Tintuc']["name"]; ?>" alt="<?php echo $row1['Tintuc']["name"]; ?>" href="<?php echo DOMAIN ?>chi-tiet-tin/<?php echo $row1['Tintuc']['id'] ?>/<?php echo $row1['Tintuc']['alias'].'.html' ?>">

<?php echo $row1['Tintuc']["name"]; ?></a></li>



				<?php } ?>
            </td>
				<td>
				 <h2>THỐNG KÊ TRUY CẬP</h2>
				  <p style="  text-align: center;"><a style="color: #535050;" href="http://it.vtmgroup.com.vn/">
 Thiết kế bởi VTM-IT</a></p>
			</td>
         </tr>
    </table>
    
</div>
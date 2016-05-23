<script type='text/javascript' src='<?php echo DOMAIN?>js/PanCarousel.js' ></script>
<style type="text/css">
    .V {position: relative;
overflow: hidden;
height: 90px;
padding-top: 10px;}
</style>
<table class="mainabc">
<tr>
	<td style="">
<p class="doitac">ĐỐI TÁC</p>
	</td>
</tr>
<tr>
	<td style="">
	<div class="V">
			
            <div id="V1">
                <?php
                $doitac = $this->requestAction('comment/adv_doitac');
                foreach ($doitac as $row) {
               
                        ?>
                            <div class="thumbnail adv" style="">
                               	<a href="<?php echo $row['Slideshow']['link'] ?>" title="<?php echo $row['Slideshow']['name'] ?>">
								<img height="75" title="<?php echo $row['Slideshow']['name'] ?>" src="<?php echo DOMAINAD . $row['Slideshow']['images'] ?>" alt="<?php echo $row['Slideshow']['name'] ?>"/></a>
                            </div>
                    <?php
                    
                }
                ?>  </div></div> 
	</td>
</tr>
</table>
<script type="text/javascript">
    var S = new zxcPanCarousel({
        mode: 'H',        // the mode, H = horizontal, V = vertical.                  (string, default = H)
        id: 'V1',         // the unique id name of the div to scroll.                 (string)
        defaultspeed: 1,  // (optional) the default speed to pan, 1 = slow, 5 = fast. (digits, default = 1)
        separation: 9,    // (optional) the separation between the div elements.      (digits, default = 0)
        direction: -1,    // (optional) the initial direction, 1 or -1.               (digits, default = 1)
        start: true,      // (optional) start automatically.                          (boolean, default = false = no autostart)
        panends: {
            distance: 4,     // (optional) the distance from the ends to pan.            (digits, default = parent node width/4)
            maxspeed: 10,     // (optional) the maximum speed to pan.                     (digits, default = 5)
            mouseout: true,   // (optional) restart default pan onmouseout.               (boolean, default = false = no restart)
            reverse: true     // (optional) reverse the pan direction of the ends.        (boolean, default = false = no reverse)
        }
    });
</script> 
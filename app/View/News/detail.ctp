<div class="detail-news">
	<div id="title_content">
		<h2><?php echo $detailNews['News']["name"]; ?></h2>
   </div>
      <div class='new-equipment'>
		<?php echo $detailNews['News']["content"]; ?>
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="<?php echo DOMAIN?>chi-tiet-tin-tuc/<?php echo $detailNews['News']["id"]; ?>/<?php echo $detailNews['News']["alias"]; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="<?php echo DOMAIN?>chi-tiet-tin-tuc/<?php echo $detailNews['News']["id"]; ?>/<?php echo $detailNews['News']["alias"]; ?>" data-width="760px" data-numposts="5" data-colorscheme="light"></div>
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
              
						<p><a href="<?php echo DOMAIN ?>chi-tiet-tin-tuc/<?php echo $row['News']['id'] ?>/<?php echo $row['News']['alias']?>">-&nbsp;&nbsp;<?php echo $row['News']["name"] ?></div>
                            </a>
                    </p>
            
            <?php } ?>
            
        </table>
		 </div>
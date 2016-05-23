<?php
$setActive = $this->request->url;
$setActive = explode("/", $setActive);
$setActive = $setActive[0];
$tabindex = "";
?>
<script type="text/javascript">
    ddaccordion.init({
        headerclass: "submenuheader",
        contentclass: "submenu",
        revealtype: "click",
        mouseoverdelay: 200,
        collapseprev: true,
        defaultexpanded: [<?php echo $tabindex; ?>],
        onemustopen: false,
        animatedefault: false,
        persiststate: false,
        toggleclass: ["", ""],
        animatespeed: "fast",
        oninit:function(headers, expandedindices){
            //do nothing
        },
        onopenclose:function(header, index, state, isuseractivated){
            //do nothing
        }
    })
</script>

<div id="sidebar">
    <div id="sidebar-wrapper">
        <h1 id="sidebar-title"><a href="#"></a></h1>
        <a href="#"><img id="logo" src="<?php echo DOMAINAD ?>images/logo.png" alt="Design by Quảng cáo vip" /></a>
        <div id="profile-links"> Xin chào, <a href="#" title="Edit your profile"><?php echo $this->Session->read('name'); ?></a><br />
            <br />
            <a href="<?php echo DOMAIN; ?>" title="View the Site" target="_blank">Xem trang chủ</a> | <a href="<?php echo DOMAINAD ?>login/logout" title="Sign Out">Thoát</a> </div>
        <div id="list">
            <ul id="main-nav">
                <li id="arrayorder_1"> <a href="<?php echo DOMAINAD ?>home" class="nav-top-item no-submenu"> Trang chủ </a> </li>
             	 <li id="arrayorder_3"> <a href="#" class="nav-top-item submenuheader">Quản lý tin tức</a>
                    <div class="submenu">
                        <ul>
                        <li><a href="<?php echo DOMAINAD ?>catalogues" <?php
                               
?>>Danh mục tin tức</a></li>
                            <li><a href="<?php echo DOMAINAD ?>news" <?php
                                 
?>>Danh sách tin tức</a></li>
                        </ul>
                    </div>
                </li>
	
				
  		         	  <li id="arrayorder_4"> <a href="<?php echo DOMAINAD ?>tintucs" class="nav-top-item">Tin khác</a> </li>
				
                <li id="arrayorder_4"> <a href="<?php echo DOMAINAD ?>settings" class="nav-top-item">Cấu hình</a> </li>
		
  <li id="arrayorder_7"> <a href="<?php echo DOMAINAD ?>Advertisements" class="nav-top-item">Quảng cáo 2 bên</a> </li> 
	   
				  <li id="arrayorder_7"> <a href="<?php echo DOMAINAD ?>banners" class="nav-top-item">Quản lý Banner</a> </li>    

		<li id="arrayorder_7"> <a href="<?php echo DOMAINAD ?>supports" class="nav-top-item">Quản lý hỗ trợ trực tuyến</a> </li>    	
 

 <li id="arrayorder_8"> <a href="<?php echo DOMAINAD ?>slideshows" class="nav-top-item">Quản lý slideshow</a> </li>
 
 <li id="arrayorder_7"> <a href="<?php echo DOMAINAD ?>administrators" class="nav-top-item">Quản lý tài khoản</a> </li>

              
            </ul>
        </div>
    </div>
</div>

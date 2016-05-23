<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN ?>css/ddlevelsmenu-base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN ?>css/ddlevelsmenu-topbar.css" />
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN ?>css/ddlevelsmenu-sidebar.css" />
<script type="text/javascript" src="<?php echo DOMAIN ?>js/ddlevelsmenu.js"> </script>

<div id="ddsidemenubar" class="markermenu" style="margin-bottom: 6px;">

    <ul>
       <?php
        $menu = $this->requestAction('comment/menu_left');
        $i = 0;
        foreach ($menu as $row) {
            $i++;
            ?>
             <li class="home">

			 <a alt="<?php echo $row['Danhmucduhoc']['name'] ?>" title="<?php echo $row['Danhmucduhoc']['name'] ?>" href="<?php echo DOMAIN ?>tin/<?php echo $row['Danhmucduhoc']['id']?>/<?php echo $row['Danhmucduhoc']['alias']?>" rel="ddsubmenuside<?php echo $i; ?>">
						  <?php echo $row['Danhmucduhoc']['name'] ?>
						  </a></li>
			<?php
        }
        ?>
     
    </ul>
</div>
<script type="text/javascript">
    ddlevelsmenu.setup("ddsidemenubar", "sidebar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
</script>
<?php
$i = 0;
foreach ($menu as $row) {
    $i++;
    ?>
    <ul id="ddsubmenuside<?php echo $i ?>" class="ddsubmenustyle blackwhite">

    <?php $menu1 = $this->requestAction('comment/menu_left/' . $row['Danhmucduhoc']['id']);
    
        foreach($menu1 as $row1){ ?>
   
        <li><a href="<?php echo DOMAIN ?>tin/<?php echo $row1['Danhmucduhoc']['id']?>/<?php echo $row1['Danhmucduhoc']['alias']?>" rel="ddsubmenuside<?php echo $i; ?>"><?php echo $row1['Danhmucduhoc']['name']?></a>
		</li>
      <?php } ?>
    </ul>
<?php } ?>
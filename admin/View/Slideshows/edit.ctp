<?php echo $this->Form->create(null, array( 'url' => DOMAINAD . 'slideshows/edit','type' => 'post','enctype'=>'multipart/form-data','name'=>'image')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>slideshows" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật slide show</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3>&nbsp;</h3>
        <!--<ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Nội dung tiếng Việt</a></li>
            <li><a href="#tab2">Nội dung tiếng Anh</a></li>
        </ul>-->
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
			               <tr>
                	<td class="label">Tiêu đề</td>
                	<td><?php echo $this->Form->input('Slideshow.name', array('label' => '', 'class' => 'text-input medium-input', 'id' => '')); ?></td>
               	</tr>
                <tr>
                    <td class="label">&nbsp;</td>
                    <td>
                        <?php if (substr($edit['Slideshow']['images'], -3) == "swf") { ?>
                            <embed src="<?php echo DOMAIN.$edit['Slideshow']['images']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="400" height="150" scale="ExactFit"> </embed>
                        <?php } else { ?>
                            <img src="<?php echo DOMAINAD.$edit['Slideshow']['images']; ?>" height="150">
                        <?php } ?>
                        <input name="oldimg" type="hidden" id="oldimg" value="<?php echo $edit['Slideshow']['images']; ?>">
                        <input name="data[Slideshow][id]" type="hidden" id="oldimg" value="<?php echo $edit['Slideshow']['id']; ?>">
                    </td>
                </tr>
                 <tr>
                  	<td class="label"> Ảnh sản phẩm:</td>
                    <td>
                     <input type="text" size="50" style="height:25px;"  name="userfile" value="<?php echo $edit['Slideshow']['images']?>"readonly="true"> &nbsp;<a href="javascript:window.open('<?php echo DOMAINAD; ?>upload_noresize.php','userfile','width=1008,height=508');window.history.go(1)" ><input type="button" value="Chọn ảnh" class="button" /></a>
                    	
                    </td>
                </tr>
				 <tr>
                	<td class="label">Xuất hiện</td>
                	<td>
                		<select name="data[Slideshow][display]" id="data[][]">
                			<option <?php if($edit['Slideshow']['display']==1) echo 'selected="selected"';?> value="1">Slideshow</option>
                			<option <?php if($edit['Slideshow']['display']==2) echo 'selected="selected"';?> value="2">Quảng cáo trái</option>
                			<option <?php if($edit['Slideshow']['display']==3) echo 'selected="selected"';?> value="3">Quảng cáo cạnh slide</option>
<option <?php if($edit['Slideshow']['display']==4) echo 'selected="selected"';?> value="4">Đối tác</option>							
               			</select>
                	</td>
               	</tr>
				
                <tr>
                	<td class="label">Link</td>
                	<td><?php echo $this->Form->input('Slideshow.link', array('label' => '', 'class' => 'text-input medium-input', 'id' => '')); ?></td>
               	</tr>
            </table>
            <div class="clear"></div>
        </div>
        <div class="tab-content" id="tab2">
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>slideshows" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
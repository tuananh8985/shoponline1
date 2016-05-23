<?php echo $this->Form->create(null, array( 'url' => DOMAINAD . 'slideshows/add','type' => 'post','enctype'=>'multipart/form-data','name'=>'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>slideshows" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Thêm mới slide show</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3></h3>
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
                	<td><?php echo $this->Form->input('Slideshow.name',array('label' => '', 'class'=>'text-input medium-input', 'id' => ''));?></td>
               	</tr>
                <tr>
                  	<td class="label"> Ảnh slide:</td>
                    <td>
                     <input type="text" size="50" style="height:25px;"  name="userfile" readonly="true"> &nbsp;<a href="javascript:window.open('<?php echo DOMAINAD; ?>upload_noresize.php','userfile','width=1008,height=508');window.history.go(1)" ><input type="button" value="Chọn ảnh" class="button" /></a>
                    	
                    </td>
                </tr>
			<tr>
                	<td class="label">Xuất hiện</td>
                	<td>
                		<select name="data[Slideshow][display]" id="data[][]">
                			<option value="1">Slideshow</option>
                			<option value="2">Quảng cáo trái</option>
                			<option value="3">Quảng cáo cạnh slide</option>
							<option value="4">Đối tác</option>
               			</select>
                	</td>
               	</tr>
			
			<!--	<tr>
                    <td class="label">Nội dung</td>
                     <td><?php
                            $CKEditor = new CKEditor();
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            CKFinder::SetupCKEditor( $CKEditor ) ;
                            
                            $initialValue = '';
                            echo $CKEditor->editor("data[Slideshow][content]", $initialValue, "");
                        ?></td>
                </tr>
<tr>
                    <td class="label">Nội dung (Tiếng Anh)</td>
                     <td><?php
                            $CKEditor = new CKEditor();
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            CKFinder::SetupCKEditor( $CKEditor ) ;
                            
                            $initialValue = '';
                            echo $CKEditor->editor("data[Slideshow][content_eg]", $initialValue, "");
                        ?></td>
                </tr>-->
                <tr>
                	<td class="label">Link</td>
                	<td><?php echo $this->Form->input('Slideshow.link',array('label' => '', 'class'=>'text-input medium-input', 'id' => ''));?></td>
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD?>slideshows" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
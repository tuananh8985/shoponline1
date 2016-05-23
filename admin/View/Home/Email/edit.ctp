
 <?php echo $form->create(null, array( 'url' => DOMAINAD.'testlinks/edit','type' => 'post','enctype'=>'multipart/form-data','name'=>'image')); ?>       
<br />  
<?php
	//echo $this->Html->script(array('ckeditor/ckeditor','ckfinder/ckfinder'));
?>
<style>
input{width:300px;}
</style>
<div id="khung">
	<div id="main">
		<div class="toolbar-list" id="toolbar">
			<ul>
				<li id="toolbar-new">
					<a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar">
                        <span class="icon-32-save"></span>
                        Lưu
					</a>
                </li>
                <li id="toolbar-refresh">
                    <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();">
                    <span class="icon-32-refresh">
                    </span>
                    Reset
                    </a>
                </li>
                <li class="divider"></li>
                <li id="toolbar-help">
                    <a href="#messages" rel="modal" class="toolbar">
                        <span class="icon-32-help"></span>
                        Trợ giúp
                    </a>
                </li>
                <li id="toolbar-unpublish">
                    <a href="<?php echo DOMAINAD?>news" class="toolbar">
                        <span class="icon-32-cancel"></span>
                        Hủy
                    </a>
                </li>
            </ul>
            <div class="clr"></div>
        </div>
		<div class="pagetitle icon-48-category-add"><h2>Thêm mới danh mục</h2></div>
		<div class="clr"></div>
	</div>
</div>
<div class="content-box"><!-- Start Content Box -->
    <div class="content-box-header">
        <h3>Thêm mới sản phẩm</h3>
        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Thêm mới</a></li> <!-- href must be unique and match the id of target div -->
            <li><a href="#tab2">Thêm mới</a></li>
        </ul>
        <div class="clear"></div>
    </div> <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
        	<table class="input">
               	<tr>
                   	<td width="120" class="label">Tiêu đề text link:</td>
                    <td>
                  <?php echo $this->Form->input('Testlink.name',array('class'=>'textfield1','maxlength' => '100','onchange' => 'get_alias()','label'=>''));?>  
                    </td>
                </tr>
                <tr>
                  	<td class="label">Địa chỉ link vào tiêu đề</td>
                    <td>
                   <?php echo $this->Form->input('Testlink.address',array('class'=>'textfield1','maxlength' => '250','onchange' => 'get_alias()','label'=>''));?>
                    </td>
                </tr>
                <tr>
                  	<td class="label">Nội dung text link</td>
                    <td>      <?php echo $this->Form->textarea('Testlink.contents',array('class'=>'textarea_short','maxlength' => '100','label'=>''));?></td>
                </tr>
				 <tr>
                        <td nowrap="" align="left">&nbsp;</td>
                        <td nowrap="" align="right"><span class="tlink_notice"><font color="#999999">(Nội dung không quá <font color="#027F09"><b>100</b></font> ký tự)</font></span></td>
                      </tr>
					  
			<tr>
                        <td align="left" class="label1">Địa chỉ website</td>
                        <td nowrap="">
                        
                        <?php echo $this->Form->input('Testlink.link',array('class'=>'textfield1','maxlength' => '250','onchange' => 'get_alias()','label'=>''));?>
                        </td>
                      </tr>
                      <tr>
                        <td nowrap="" align="left" class="tlink_title">&nbsp;</td>
                        <td nowrap=""><span class="tlink_notice"><font color="#999999">Địa chỉ web chỉ được phép nhập vào tên miền chính<br> Ví dụ: www.shoptaigia.vn</font></span></td>
                      </tr>
                      <tr>
                        <td nowrap="" align="left" class="label1">Nick yahoo</td>
                        <td nowrap="">
                        
                        
                        <?php echo $this->Form->input('Testlink.yahoo',array('class'=>'textfield1','maxlength' => '250','onchange' => 'get_alias()','label'=>''));?>
                        </td>
                      </tr>
                      <tr>
                        <td nowrap="" align="left" class="label1">Số điện thoại</td>
                        <td nowrap="">
                           <?php echo $this->Form->input('Testlink.phone',array('class'=>'textfield1','maxlength' => '250','onchange' => 'get_alias()','label'=>''));?>
                        </td>
                      </tr>
                                           
                      <tr>
                        <td nowrap="">&nbsp;</td>
                        <td nowrap="" >
						<?php echo $form->input('Testlink.id',array('label'=>'','type'=>'hidden'));?>
                       <td>
                      </tr>
                      <tr>
                        <td nowrap="">&nbsp;</td>
                        <td nowrap="" align="center">
                       </td>
                      </tr>
                      <tr>
                        <td nowrap="" height="100" colspan="2"></td>
                      </tr>
            </table>
			<div class="clear"></div>
        </div> <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
			<div class="clear"></div><!-- End .clear -->
        </div> <!-- End #tab2 -->        
    </div> <!-- End .content-box-content -->
 </div>
 
<div id="khung">
	<div id="main">
		<div class="toolbar-list" id="toolbar">
			<ul>
				<li id="toolbar-new">
					<a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar">
                        <span class="icon-32-save"></span>
                        Lưu
					</a>
                </li>
                <li id="toolbar-refresh">
                    <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();">
                    <span class="icon-32-refresh">
                    </span>
                    Reset
                    </a>
                </li>
                <li class="divider"></li>
                <li id="toolbar-help">
                    <a href="#messages" rel="modal" class="toolbar">
                        <span class="icon-32-help"></span>
                        Trợ giúp
                    </a>
                </li>
                <li id="toolbar-unpublish">
                    <a href="<?php echo DOMAINAD?>news" class="toolbar">
                        <span class="icon-32-cancel"></span>
                        Hủy
                    </a>
                </li>
            </ul>
            <div class="clr"></div>
        </div>
		<div class="pagetitle icon-48-category-add"><h2>Thêm mới danh mục</h2></div>
		<div class="clr"></div>
	</div>
</div>
<?php echo $form->end(); ?>
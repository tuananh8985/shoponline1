<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'supports/edit', 'type' => 'post', 'name' => 'image', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>supports" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật hỗ trợ trực tuyến</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header"><!-- <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Nội dung tiếng Việt</a></li>
            <li><a href="#tab2">Nội dung tiếng Anh</a></li>
        </ul> -->
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
                <tr>
                    <td width="149" class="label">Tiêu đề</td>
                    <td><?php echo $this->Form->input('Support.name', array('class' => 'text-input medium-input', 'maxlength' => '250', 'onchange' => 'get_alias()', 'id' => 'idtitle')); ?>
                    	<input type="hidden" name="data[Support][id]" id="data[][]" value="<?php echo $edit['Support']['id']; ?>">
                    </td>
                </tr>
				
				 <tr>
                    <td width="149" class="label">Số điện thoại</td>
                    <td><?php echo $this->Form->input('Support.telephone',array('class'=>'text-input medium-input','maxlength' => '250','onchange' => 'get_alias()','id' => 'idtitle'));?></td>
                </tr>
				
                <tr>
                    <td width="149" class="label">Yahoo</td>
                    <td><?php echo $this->Form->input('Support.yahoo', array('class' => 'text-input medium-input', 'id' => 'idtitle')); ?></td>
                </tr>
                <tr>
                    <td width="149" class="label">Skype</td>
                    <td><?php echo $this->Form->input('Support.skype', array('class' => 'text-input medium-input', 'id' => 'idtitle')); ?></td>
                </tr>
                <tr>
                    <td class="label">Trang thái:</td>
                    <td><input type="radio" value="0" id="SupportStatus0" name="data[Support][status]">
                        Chưa Active 
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" checked="checked" value="1" id="SupportStatus1" name="data[Support][status]">
                        Đã Active </td>
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>supports" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>

</div>
<?php echo $this->Form->end(); ?>
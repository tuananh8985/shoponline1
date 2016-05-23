<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'catalogues/edit', 'type' => 'post', 'name' => 'frm',  'enctype'=>'multipart/form-data', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
<?php echo $this->Form->input('catId', array('type' => 'hidden', 'value' =>  $edit_vie['Catalogue']['parent_id'])); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.frm.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.frm.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>catalogues" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Quản lý danh mục nhóm tin</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3>Sửa danh mục</h3>
        <!--<ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Nội dung tiếng Việt</a></li>
            <li><a href="#tab2">Nội dung tiếng Anh</a></li>
        </ul>-->
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table class="input">
                <tr>
                    <td width="120" class="label">Tên Danh mục:</td>
                    <td><?php echo $this->Form->input('Catalogue.name', array('value' => $edit_vie['Catalogue']['name'], 'class'=>'text-input medium-input', 'maxlength' => '250', 'id' => 'idtitle')); ?></td>
                </tr>
				
               <tr>
                    <td class="label">Liên kết tĩnh:</td>
                    <td><?php echo $this->Form->input('Catalogue.alias', array('label' => '', 'class' => 'text-input alias-input', 'maxlength' => '250', 'id' => 'idalias')); ?> <img width="16" height="16" alt="" onclick="get_alias();" style="cursor: pointer; vertical-align: middle;" src="<?php echo DOMAINAD; ?>images/refresh.png"></td>
                </tr>
                <tr>
                    <td class="label">Nhóm danh mục</td>
                    <td><select name="data[Catalogue][parent_id]" id="jumpMenu">
                        <option value="">--- Danh mục cha ---</option>
                        <?php foreach ($list_cat as $k => $v) { 
                            if($edit_vie['Catalogue']['id'] != $k) {
                        ?>
                        <option value="<?php echo $k; ?>" <?php if($edit_vie['Catalogue']['parent_id'] == $k) {echo 'selected="selected"';} ?>><?php echo $v; ?></option>
                        <?php }} ?>
                    </select></td>
                </tr>
                <tr>
                    <td width="120" class="label">Tiêu đề SEO:</td>
                    <td><?php echo $this->Form->input('Catalogue.title_seo',array('class'=>'text-input medium-input', 'id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Meta Keyword:</td>
                    <td><?php echo $this->Form->input('Catalogue.meta_key',array('class'=>'text-input medium-input', 'id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Meta Description:</td>
                    <td><?php echo $this->Form->input('Catalogue.meta_des',array('class'=>'text-input medium-input', 'id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td class="label">Trang thái:</td>
                    <td><input type="radio" value="0" id="CatalogueStatus0" name="data[Catalogue][status]" <?php if ($this->data['Catalogue']['status'] == 0) {
                            echo 'checked="checked"';
                        } ?>>
                        Chưa Active 
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" <?php if ($this->data['Catalogue']['status'] == 1) {
                            echo 'checked="checked"';
                        } ?> value="1" id="CatalogueStatus1" name="data[Catalogue][status]">
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
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.frm.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.frm.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>catalogues" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
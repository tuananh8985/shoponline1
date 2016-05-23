<script type="text/javascript">

    $(function() {

        var i = $('input').size() + 1;

        $('a.add').click(function() {

            $('<p style="padding-left: 9px;" id="anh'+i+'"><input name="userfileplus[]" id="userfile" type="file"  size="50"></p>').animate({ opacity: "show" }, "slow").appendTo('#themanh');
            i++;
        });

        $('a.remove').click(function() {
	
            if(i > 2) {
                $('#anh'+i+':last').animate({opacity:"hide"}, "slow").remove();
                i--;
            }

        });
	
    });

</script>
<?php echo $this->Form->create(null, array( 'url' => DOMAINAD.'products/edit','type' => 'post','enctype'=>'multipart/form-data','name'=>'adminForm')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.adminForm.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.adminForm.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD?>products" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật sản phẩm</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box"><!-- Start Content Box -->
    <div class="content-box-header">
        <h3>Cập nhật sản phẩm</h3>
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table class="input">
                <tr>
                    <td width="120" class="label">Tên sản phẩm:</td>
                    <td><?php echo $this->Form->input('Product.name',array('label'=>'','class'=>'text-input medium-input','maxlength' => '60','onchange' => 'get_alias()','id' => 'idtitle'));?>
					
					<?php echo $this->Form->input('Product.id',array('type'=>'hidden'));?></td>
                </tr>
            
				<tr>
                    <td class="label">Liên kết tĩnh:</td>
                    <td><?php echo $this->Form->input('Product.alias', array('label' => '', 'class' => 'text-input alias-input', 'maxlength' => '250', 'id' => 'idalias')); ?> <img width="16" height="16" alt="" onclick="get_alias();" style="cursor: pointer; vertical-align: middle;" src="<?php echo DOMAINAD; ?>images/refresh.png"></td>
                </tr>
              <tr>
                    <td width="120" class="label">Mã sản phẩm:</td>
                    <td><?php echo $this->Form->input('Product.code',array('label'=>'','class'=>'text-input medium-input','maxlength' => '45','id' => 'idtitle'));?></td>
                </tr>
				   <tr>
                    <td class="label">Thuộc danh mục:</td>
                    <td>
                        <select name="data[Product][cat_id]" id="jumpMenu">
                            <?php foreach ($list_cat as $k => $v) { ?>
                            <option value="<?php echo $k; ?>" <?php if ($edit['Product']['cat_id'] == $k) {echo 'selected="selected"';} ?>><?php echo $v; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
				<!-- <tr>
                    <td class="label">Thuộc danh mục 2:</td>
                    <td>
                        <select name="data[Product][cat_id2]" id="jumpMenu">
                            <?php foreach ($list_cat as $k => $v) { ?>
                            <option value="<?php echo $k; ?>" <?php if ($edit['Product']['cat_id2'] == $k) {echo 'selected="selected"';} ?>><?php echo $v; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
				 <tr>
                    <td class="label">Thuộc danh mục 3:</td>
                    <td>
                        <select name="data[Product][cat_id3]" id="jumpMenu">
                            <?php foreach ($list_cat as $k => $v) { ?>
                            <option value="<?php echo $k; ?>" <?php if ($edit['Product']['cat_id3'] == $k) {echo 'selected="selected"';} ?>><?php echo $v; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td class="label">Chọn hãng:</td>
                    <td>
                        <select name="data[Product][hang_id]" id="jumpMenu">
                            <?php foreach ($list_hang as $k => $v) { ?>
                                <option <?php if($edit['Product']['hang_id']==$k) echo 'selected="selected"';?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
							<?php } ?>
                        </select>
                    </td>
                </tr>-->
                <tr>
                    <td width="120" class="label">Giá :</td>
                    <td><?php echo $this->Form->input('Product.price',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','style' => 'width:200px !important'));?></td>
                </tr>
			<!--	
			<tr>
                  <td class="label">SP mới:</td>
                    <td><input type="radio" <?php if($edit['Product']['setoff']==0) echo 'checked="checked"';?> value="0" id="setoff" name="data[Product][setoff]">
                        Không
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" <?php if($edit['Product']['setoff']) echo 'checked="checked"';?>  value="1" id="setoff1" name="data[Product][setoff]">
                        Có </td>
                </tr>
				<tr>
                  <td class="label">SP khuyến mại:</td>
                    <td><input type="radio" <?php if($edit['Product']['new']==0) echo 'checked="checked"';?> value="0" id="new" name="data[Product][new]">
                        Không
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" <?php if($edit['Product']['new']) echo 'checked="checked"';?>  value="1" id="new1" name="data[Product][new]">
                        Có </td>
                </tr>
				 <tr>
                    <td class="label">SP sinh viên:</td>
                    <td><input type="radio" <?php if($edit['Product']['spnb']==0) echo 'checked="checked"';?> value="0" id="spnb" name="data[Product][spnb]">
                        Không
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" <?php if($edit['Product']['spnb']) echo 'checked="checked"';?>  value="1" id="spnb1" name="data[Product][spnb]">
                        Có </td>
                </tr>-->
				<tr>
                    <td class="label">Tình trạng:</td>
                    <td><input type="radio" value="0" id="ProductStatus10" name="data[Product][tinhtrang]">
                        Hết hàng
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" checked="checked" value="1" id="ProductStatus11" name="data[Product][tinhtrang]">
                         Còn hàng</td>
                </tr>
				
				 <tr>
                    <td width="120" class="label"><a name="anh"></a>Vị trí :</td>
                    <td><?php echo $this->Form->input('Product.pos', array('label' => '', 'class' => 'text-input medium-input', 'maxlength' => '5', 'style' => 'width:200px !important')); ?></td>
                </tr>
				
			
                <tr>
                    <td class="label">Trang thái:</td>
                    <td><input type="radio" <?php if($edit['Product']['status']==0) echo 'checked="checked"';?> value="0" id="ProductStatus0" name="data[Product][status]">
                        Chưa Active a
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" <?php if($edit['Product']['status']) echo 'checked="checked"';?>  value="1" id="ProductStatus1" name="data[Product][status]">
                        Đã Active </td>
                </tr>
               
               	
               <tr>
                  	<td class="label"> Ảnh sản phẩm 1:</td>
                    <td>
                     <input type="text" size="50" style="height:25px;" value="<?php echo $edit['Product']['images']?>"  name="userfile1"> &nbsp;<a href="javascript:window.open('<?php echo DOMAINAD; ?>upload_multi_noresize.php?stt=1','userfile1','width=500,height=300');window.history.go(1)" ><input type="button" value="Chọn ảnh" class="button" /></a>
                    	
                    </td>
                </tr>
				
			   <tr>
                  	<td class="label"> Ảnh sản phẩm 2:</td>
                    <td>
                     <input type="text" size="50" value="<?php echo $edit['Product']['images2']?>" style="height:25px;"  name="userfile2" > &nbsp;<a href="javascript:window.open('<?php echo DOMAINAD; ?>upload_multi_noresize.php?stt=2','userfile2','width=500,height=300');window.history.go(1)" ><input type="button" value="Chọn ảnh" class="button" /></a>
                    	
                    </td>
                </tr>
				  <tr>
                  	<td class="label"> Ảnh sản phẩm 3:</td>
                    <td>
                     <input type="text" size="50" value="<?php echo $edit['Product']['images3']?>" style="height:25px;"  name="userfile3" > &nbsp;<a href="javascript:window.open('<?php echo DOMAINAD; ?>upload_multi_noresize.php?stt=3','userfile3','width=500,height=300');window.history.go(1)" ><input type="button" value="Chọn ảnh" class="button" /></a>
                    	
                    </td>
                </tr>
               
			    <tr>
                    <td class="label">Nội dung sản phẩm :</td>
                    <td><?php
                            $CKEditor = new CKEditor();
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            CKFinder::SetupCKEditor( $CKEditor ) ;
                            
                            $initialValue = $edit['Product']['content'];
                            echo $CKEditor->editor("data[Product][content]", $initialValue, "");
                        ?></td>
                </tr>
				
                <tr>
                    <td class="label">Title Seo</td>
                    <td><?php echo $this->Form->input('Product.title_seo',array('label'=>'','class'=>'text-input medium-input','maxlength' => '250','id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td class="label">Meta keyword</td>
                    <td><?php echo $this->Form->input('Product.meta_key',array('label'=>'','class'=>'text-input medium-input'));?></td>
                </tr>
                <tr>
                    <td class="label">Meta description</td>
                    <td><?php echo $this->Form->input('Product.meta_des',array('label'=>'','class'=>'text-input medium-input'));?></td>
                </tr>
            </table>
            <div class="clear"></div>
        </div>
        <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
            <div class="clear"></div>
            <!-- End .clear --> 
        </div>
        <!-- End #tab2 --> 
    </div>
    <!-- End .content-box-content --> 
</div>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.adminForm.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.adminForm.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD?>products" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật sản phẩm</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
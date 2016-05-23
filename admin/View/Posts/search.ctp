<script type="text/javascript">
    function changepos() {
        document.frm1.action = "<?php echo DOMAINAD; ?>news/changepos";
        document.frm1.submit();
    }
    function process() {
        document.frm1.action = "<?php echo DOMAINAD; ?>news/process";
        document.frm1.submit();
    }
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if (restore) selObj.selectedIndex=0;
    }
</script>
<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'news/search', 'type' => 'post', 'name' => 'frm1')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="<?php echo DOMAINAD; ?>news/add" class="toolbar"> <span class="icon-32-new"></span> Thêm mới </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>home" class="toolbar"> <span class="icon-32-unpublish"></span> Đóng </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h2>Tin tức</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <table class="timkiem">
            <tr>
                <td valign="top">Tìm kiếm</td>
                <td><input type="text" id="field2c" name="keyword" class="text-input" value="<?php echo $this->Session->read('keyword'); ?>"></td>
                <td><select name="listCat" id="jumpMenu">
                        <option value="">--- Tất cả các danh mục ---</option>
                        <?php foreach ($list_cat as $k => $v) { ?>
                        <option value="<?php echo $k; ?>" <?php if ($this->Session->read('catId') == $k) {echo 'selected="selected"'; } ?>><?php echo $v; ?></option>
                        <?php } ?>
                    </select></td>
                <td><input type="submit" name="" value="Tìm kiếm" class="button" /></td>
            </tr>
        </table>
        <!--<ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Danh sách tin</a></li>
            <li><a href="#tab2"></a></li>
        </ul>-->
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%">
                    <thead>
                        <tr>
                            <th width="2%"><input type="checkbox" name="all" id="checkall" /></th>
                            <th width="4%">STT</th>
                            <th width="12%" style="text-align:center;">Ảnh</th>
                            <th width="30%" style="text-align:center;">Tiêu đề tin</th>
                            <th width="14%" style="text-align:center;"><a href="#" onclick="changepos()">Vị trí</a>
                                <input name="sortId" type="hidden" value="<?php echo $this->Session->read('catId'); ?>" />
                            </th>
                            <th width="12%" nowrap><a href="#" onclick="changepos()">Tin hot</a></th>
                            <th width="11%">Cập nhật</th>
                            <th width="12%">Xử lý</th>
                            <th width="3%">ID</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="9"><div class="bulk-actions align-left">
                                    <select name="process">
                                        <option value="0">Lựa chọn</option>
                                        <option value="1">Active</option>
                                        <option value="2">Hủy Active</option>
                                        <option value="3">Delete</option>
                                    </select>
                                    <a class="button" href="#" onclick="process()">Thực hiện</a> </div>
                                <div class="pagination">
                                    <?php
                                        echo $this->Paginator->first('« Đầu ', null, null, array('class' => 'disabled'));     
                                        echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); 
                                        echo $this->Paginator->numbers()." ";
                                        echo $this->Paginator->next(' Tiếp »', null, null, array('class' => 'disabled')); 
                                        echo $this->Paginator->last('« Cuối ', null, null, array('class' => 'disabled')); 
                                        echo " Page ".$this->Paginator->counter();
                                    ?>
                                </div>
                                <div class="clear"></div></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($product as $key => $value) { ?>
                        <tr>
                            <td><input type="checkbox" name="chon[<?php echo $value['News']['id']; ?>]" value="1" /></td>
                            <td><?php echo $key + $startPage;?></td>
                            <td style="text-align:center;"><img src="<?php echo IMAGEAD; ?>news/<?php echo $value['News']['images']; ?>" height="100"></td>
                            <td><a href="<?php echo DOMAINAD ?>news/edit/<?php echo $value['News']['id']; ?>" title="Edit"><?php echo $value['News']['name']; ?></a> <?php if(date('Y-m-d', strtotime($value['News']['modified'])) == date('Y-m-d')) { ?><img src="<?php echo DOMAINAD ?>images/icons/iconnew.gif" alt="New" /><?php } ?></td>
                            <td style="text-align:center;"><input class="text-input medium-input" style="text-align:center; width:30% !important;" type="text" value="<?php echo $value['News']['pos']; ?>" name="order[<?php echo $value['News']['id']; ?>]" /></td>
                            <td>
                                <label><input type="radio" name="sphot[<?php echo $value['News']['id']; ?>]" value="1" id="sphot_0" <?php if($value['News']['hot'] == 1) {echo 'checked';} ?>> Có</label>
                                <label><input name="sphot[<?php echo $value['News']['id']; ?>]" type="radio" id="sphot_1" value="0" <?php if($value['News']['hot'] == 0) {echo 'checked';} ?>>  Không</label></td>
                            <td><?php echo date('d-m-Y', strtotime($value['News']['modified'])); ?></td>
                            <td><a href="<?php echo DOMAINAD ?>news/edit/<?php echo $value['News']['id']; ?>" title="Edit"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Edit" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>news/delete/<?php echo $value['News']['id']; ?>')" title="Delete"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Delete" /></a>
                                <?php
                                    if ($value['News']['status'] == 0) {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>news/active/<?php echo $value['News']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                <?php
                                    } else {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>news/close/<?php echo $value['News']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                <?php
                                    }
                                    ?></td>
                            <td align="right"><?php echo $value['News']['id']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
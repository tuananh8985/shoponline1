<script type="text/javascript">
    function changepos() {
        document.frm1.action = "<?php echo DOMAINAD; ?>posts/changepos";
        document.frm1.submit();
    }
    function process() {
        document.frm1.action = "<?php echo DOMAINAD; ?>posts/process";
        document.frm1.submit();
    }
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if (restore) selObj.selectedIndex=0;
    }
</script>
<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'posts/search', 'type' => 'post', 'name' => 'frm1')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="<?php echo DOMAINAD; ?>posts/add" class="toolbar"> <span class="icon-32-new"></span> Thêm mới </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>home" class="toolbar"> <span class="icon-32-unpublish"></span> Đóng </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h2>Danh sách tin</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header"><!--<ul class="content-box-tabs">
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
                            <th width="33%">Tiêu đề tin</th>
                           <th width="11%">Hình ảnh</th>
                            <th style="text-align:center;"><a href="#" onclick="changepos()">Vị trí</a>
                                <input name="sortId" type="hidden" value="" />
                            </th>
                            <th width="11%">Cập nhật</th>
                            <th width="12%">Xử lý</th>
                            <th width="3%">ID</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="8"><div class="bulk-actions align-left">
                                    <select name="process">
                                        <option value="0">Lựa chọn</option>
                                        <option value="1">Active</option>
                                        <option value="2">Hủy Active</option>
                                        <option value="3">Delete</option>
                                    </select>
                                    <a class="button" href="#" onclick="process()">Thực hiện</a> </div>
                                <div class="clear"></div></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($listPosts as $key => $value) { ?>
                        <tr>
                            <td><input type="checkbox" name="chon[<?php echo $value['Post']['id']; ?>]" value="1" /></td>
                            <td><?php echo $key + 1; ?></td>
						
                            <td><a href="<?php echo DOMAINAD ?>posts/edit/<?php echo $value['Post']['id']; ?>" title="Edit"><?php echo $value['Post']['name']; ?></a>  <?php if(date('Y-m-d', strtotime($value['Post']['modified'])) == date('Y-m-d')) { ?><img src="<?php echo DOMAINAD ?>images/icons/iconnew.gif" alt="Post" /><?php } ?></td>
                           	   <td style="text-align:center;"><img src="<?php echo IMAGEAD; ?>post/<?php echo $value['Post']['images']; ?>" height="100"></td>
                         
                            <td style="text-align:center;"><input class="text-input medium-input" style="text-align:center; width:30% !important;" type="text" value="<?php echo $value['Post']['pos']; ?>" name="order[<?php echo $value['Post']['id']; ?>]" /></td>
                            <td><?php echo date('d-m-Y', strtotime($value['Post']['modified'])); ?></td>
                            
                            <td><a href="<?php echo DOMAINAD ?>posts/edit/<?php echo $value['Post']['id']; ?>" title="Edit"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Edit" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>posts/delete/<?php echo $value['Post']['id']; ?>')" title="Delete"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Delete" /></a>
                                <?php
                                    if ($value['Post']['status'] == 0) {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>posts/active/<?php echo $value['Post']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                <?php
                                    } else {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>posts/close/<?php echo $value['Post']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                <?php
                                    }
                                    ?></td>
                            <td align="right"><?php echo $value['Post']['id']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
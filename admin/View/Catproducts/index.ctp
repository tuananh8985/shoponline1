<script type="text/javascript">
    function changepos() {
        document.frm1.action = "<?php echo DOMAINAD; ?>catproducts/changepos";
        document.frm1.submit();
    }

    function MM_jumpMenu(targ,selObj,restore){ //v3.0
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if (restore) selObj.selectedIndex=0;
    }
</script>
<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'catproducts/search', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'frm1')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>home" class="toolbar"> <span class="icon-32-unpublish"></span> Đóng </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h2>Danh mục sản phẩm</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <table class="timkiem">
            <tr>
                <td valign="top">Tìm kiếm</td>
                <td><select name="listCat" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
                        <option value="<?php echo DOMAINAD; ?>catproducts/index">--- Tất cả các danh mục ---</option>
                        <?php foreach ($list_cat as $k => $v) { ?>
                        <option value="<?php echo DOMAINAD; ?>catproducts/index/<?php echo $k; ?>" <?php if ($catId == $k) {
                            echo 'selected="selected"';
                        } ?>><?php echo $v; ?></option>
                        <?php } ?>
                    </select></td>
                <td><input type="button" name="" value="Thêm mới" class="button" onclick="javascript:location.href='<?php echo DOMAINAD; ?>catproducts/add/<?php echo $catId; ?>'" /></td>
            </tr>
        </table>
        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Danh sách tin</a></li>
            <!-- href must be unique and match the id of target div -->
            <li><a href="#tab2"></a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1"> 
            <!-- This is the target div. id must match the href of this div's tab -->
            <table>
                <thead>
                    <tr>
                        <th width="7%">STT</th>
                        <th width="7%"></th>
                        <th>Tên danh mục</th>
                        <th style="text-align:center;"><a href="#" onclick="changepos()">Vị trí</a>
                            <input name="sortId" type="hidden" value="<?php echo $catId; ?>" />
                        </th>
                        <th>Cập nhật</th>
                             <th width="12%">Xử lý</th>
                        <th>Hiển thị</th>
                        <th width="3%">ID</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="8"></td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1;
                    foreach ($Catproduct as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><img src="<?php echo IMAGEAD; ?>catproduct/<?php echo $value['Catproduct']['images']; ?>" height="100"></td>
                        <td><?php echo $value['Catproduct']['name']; ?> </a></td>
                        <td style="text-align:center;"><input class="text-input medium-input" style="text-align:center; width:30% !important;" type="text" value="<?php echo $value['Catproduct']['pos']; ?>" name="order[<?php echo $value['Catproduct']['id'] ?>]" /></td>
                        <td><?php echo date('d-m-Y h:i:s', strtotime($value['Catproduct']['modified'])); ?></td>
                             <td><a href="<?php echo DOMAINAD ?>catproducts/edit/<?php echo $value['Catproduct']['id']; ?>" title="Edit"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Edit" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>catproducts/delete/<?php echo $value['Catproduct']['id']; ?>')" title="Delete"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Delete" /></a>
                                                         
						 <td><?php
                                    if ($value['Catproduct']['status'] == 0) {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>catproducts/active/<?php echo $value['Catproduct']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                <?php
                                    } else {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>catproducts/close/<?php echo $value['Catproduct']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                <?php
                                    }
                                    ?></td>
									
                        <td align="right"><?php echo $value['Catproduct']['id']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- End #tab1 --> 
        
        <!-- End #tab2 --> 
        
    </div>
    <!-- End .content-box-content --> 
</div>
<?php echo $this->Form->end(); ?> 
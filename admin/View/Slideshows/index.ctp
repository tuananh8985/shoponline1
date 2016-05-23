<script type="text/javascript">
    function changepos() {
        document.frm1.action = "<?php echo DOMAINAD; ?>slideshows/changepos";
        document.frm1.submit();
    }
</script>
<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'slideshows/changepos', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'frm1')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="<?php echo DOMAINAD; ?>slideshows/add" class="toolbar"> <span class="icon-32-new"></span> Thêm mới </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>home" class="toolbar"> <span class="icon-32-unpublish"></span> Đóng </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h2>Quản lý slide show</h2>
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
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1"> 
            <!-- This is the target div. id must match the href of this div's tab -->
            <table width="100%">
                <thead>
                    <tr>
                        <th width="6%">STT</th>
                        <th width="40%">Ảnh</th>
						<th width="14%" style="text-align:center;">Xuất hiện</th>
                        <th width="11%" style="text-align:center;"><a href="#" onclick="changepos()">Vị trí</a></th>
                        <th width="12%">Cập nhật</th>
                        <th width="11%">Xử lý</th>
                        <th width="6%">ID</th>
                    </tr>
                </thead>
   
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($advs as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td>
                                <img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $value['Slideshow']['images'];?>&amp;h=50&amp;w=80&amp;zc=1">
                            </td>
							 <td style="text-align:center;">
                                <?php
                                    if($value['Slideshow']['display'] == 1) {
                                        echo "Slideshow";
                                    } elseif($value['Slideshow']['display'] == 2) {
                                        echo "Quảng cáo trái"; }
									elseif($value['Slideshow']['display'] == 3) {
                                        echo "Quảng cáo cạnh slide"; }
									elseif($value['Slideshow']['display'] == 4) {
                                        echo "Đối tác"; }
                                ?>
                            </td>
                            <td style="text-align:center;"><input class="text-input medium-input" style="text-align:center; width:30% !important;" type="text" value="<?php echo $value['Slideshow']['pos']; ?>" name="order[<?php echo $value['Slideshow']['id']; ?>]" /></td>
                            <td><?php echo date('d-m-Y', strtotime($value['Slideshow']['modified'])); ?></td>
                            <td><!-- Icons --> 
                                <a href="<?php echo DOMAINAD ?>slideshows/edit/<?php echo $value['Slideshow']['id'] ?>" title="Sửa mục này"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Sửa" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>slideshows/delete/<?php echo $value['Slideshow']['id'] ?>')" title="Xóa mục này"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Xóa" /></a>
                             <?php
                                    if ($value['Slideshow']['status'] == 0) {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>slideshows/active/<?php echo $value['Slideshow']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                <?php
                                    } else {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>slideshows/close/<?php echo $value['Slideshow']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                <?php
                                    }
                                    ?>
                            </td>
                            <td align="right"><?php echo $value['Slideshow']['id']; ?></td>
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
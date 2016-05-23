<?php echo $this->Form->create(null, array( 'url' => DOMAINAD . 'banners/edit','type' => 'post','enctype'=>'multipart/form-data','name'=>'image')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>banners" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật banner</h2>
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
                    <td class="label">&nbsp;</td>
                    <td>
                        <?php if (substr($edit['Banner']['images'], -3) == "swf") { ?>
                            <embed src="<?php echo IMAGEAD; ?>banner/<?php echo $edit['Banner']['images']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="400" height="150" scale="ExactFit"> </embed>
                        <?php } else { ?>
                            <img src="<?php echo IMAGEAD; ?>banner/<?php echo $edit['Banner']['images']; ?>" width="400">
                        <?php } ?>
                        <input name="oldimg" type="hidden" id="oldimg" value="<?php echo $edit['Banner']['images']; ?>">
                        <input name="data[Banner][id]" type="hidden" id="oldimg" value="<?php echo $edit['Banner']['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td width="150" class="label">Chọn file</td>
                    <td>
                        <input name="userfile" type="file" id="userfile" size="50">
                        (Ảnh hoặc Flash) </td>
                </tr>
                 <tr>
                    <td class="label">Title:</td>
                    <td>
                        <?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            CKFinder::SetupCKEditor( $CKEditor ) ;

                            $initialValue = $edit['Banner']['name'];
                            echo $CKEditor->editor("data[Banner][name]", $initialValue, "");
                        ?>
                    </td>
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>banners" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
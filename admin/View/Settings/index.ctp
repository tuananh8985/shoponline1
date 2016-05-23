<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'settings/index', 'type' => 'post', 'name' => 'adminForm', 'inputDefaults' => array('label' => false, 'div' => false))); ?> <br />
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.adminForm.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.adminForm.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>settings" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cấu hình website</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box"><!-- Start Content Box -->
    <div class="content-box-header">
        <h3>Cấu hình</h3>
        <!-- <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Tiếng việt</a></li>
            <li><a href="#tab2">Tiếng anh</a></li>
        </ul> -->
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
                <tr>
                    <td width="120" class="label">Tên công ty:</td>
                    <td> <?php echo $this->Form->input('Setting.name', array('label' => '', 'class' => 'text-input medium-input')); ?> 
                    	<input name="data[Setting][id]" type="hidden" id="data[Setting][id]" value="1">
                    </td>
                </tr>
                <tr>
                	<td class="label">Tiêu đề website:</td>
                	<td> <?php echo $this->Form->input('Setting.title', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
                <tr>
                    <td class="label">Nội dung mục liên hệ</td>
                    <td>
                        <?php
                            $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            CKFinder::SetupCKEditor( $CKEditor ) ;

                            $initialValue = $edit['Setting']['address'];
                            echo $CKEditor->editor("data[Setting][address]", $initialValue, "");
                        ?>
                    </td>
                </tr>
				<tr>
                    <td class="label">Điện thoại:</td>
                    <td> <?php echo $this->Form->input('Setting.telephone', array('label' => '', 'class' => 'text-input medium-input')); ?> </td>
                </tr>
               <tr>
                    <td class="label">Hotline:</td>
                    <td> <?php echo $this->Form->input('Setting.hotline', array('label' => '', 'class' => 'text-input medium-input')); ?> </td>
                </tr>
              
            
				
				<tr>
                    <td class="label">Email :</td>
                    <td> <?php echo $this->Form->input('Setting.email', array('label' => '', 'class' => 'text-input medium-input')); ?> </td>
                </tr>
		
       <tr>
                	<td class="label">Thông tin liên hệ</td>
                	<td>
                        <?php
                        $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            CKFinder::SetupCKEditor( $CKEditor ) ;

                            $initialValue = $edit['Setting']['contactinfo'];
                            echo $CKEditor->editor("data[Setting][contactinfo]", $initialValue, "");
                        ?>
                    </td>
               	</tr>
                <tr>
                	<td class="label">Thông tin liên hệ mục header</td>
                	<td>
                        <?php
                         $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            CKFinder::SetupCKEditor( $CKEditor ) ;

                            $initialValue = $edit['Setting']['contactinfo_eg'];
                            echo $CKEditor->editor("data[Setting][contactinfo_eg]", $initialValue, "");
                        ?>
                    </td>
               	</tr>
				   <tr>
                	<td class="label">Video</td>
                	<td>
                        <?php
                        $CKEditor = new CKEditor();
                            $CKEditor->returnOutput = true;
                            $CKEditor->config['width'] = '98%';
                            $CKEditor->config['height'] = '300';
                            CKFinder::SetupCKEditor( $CKEditor ) ;

                            $initialValue = $edit['Setting']['youtube'];
                            echo $CKEditor->editor("data[Setting][youtube]", $initialValue, "");
                        ?>
                    </td>
               	</tr>
                <tr>
                    <td class="label">Từ khóa (SEO):</td>
                    <td>
                        <?php echo $this->Form->input('Setting.meta_key', array('type' => 'textarea', 'rows' => '4')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Mô tả (SEO):</td>
                    <td>
                        <?php echo $this->Form->input('Setting.meta_des', array('type' => 'textarea', 'rows' => '4')); ?>
                    </td>
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>settings" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cấu hình website</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
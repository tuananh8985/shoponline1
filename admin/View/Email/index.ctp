<script>
function confirmDelete(delUrl)
{
if (confirm("Bạn có muốn xóa danh mục này không!"))
{
	document.location = delUrl;
}
}
</script><div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new">      
	
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>home" class="toolbar"> <span class="icon-32-unpublish"></span> Đóng </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h2>Quản lý Email nhận thông tin</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box"><!-- Start Content Box -->
    <div class="content-box-header">
        
        <h3>Danh sách email nhận thông tin</h3>
        
        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Danh sách </a></li> <!-- href must be unique and match the id of target div -->
            <li><a href="#tab2"></a></li>
        </ul>
        
        <div class="clear"></div>
        
    </div> <!-- End .content-box-header -->
    <div class="content-box-content">
        
        <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
            <table>
                 <form action="<?php echo DOMAINAD; ?>emails/processing" name="form1" method="post">
                <thead>
                    <tr>
                       <th><input class="check-all" name="checkall" type="checkbox" /></th>
                       <th>STT</th>
                       <th>Email</th>
                      
                       <th>Cập nhật</th>
                       <th>Xử lý</th>
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
                    <?php $i=1; foreach ($Email as $key =>$value){?>
                    <tr>
                        <td><input type="checkbox" name="<?php echo $value['Email']['id'] ?>" /></td>
                        <td>
						<?php echo count($value['Email']['status']);?>
						<?php $j=$key+1; echo $j;?></td>
                        <td><?php echo $value['Email']['email'];?></td>
                         <td><?php echo date('d-m-Y', strtotime($value['Email']['created'])); ?></td>
                        <td>
                             <?php if($value['Email']['status']==0){?>
                              
                                 <a href="javascript:confirmDelete('<?php echo DOMAINAD?>email/delete/<?php echo $value['Email']['id'] ?>')" title="Delete"><img src="<?php echo DOMAINAD?>images/icons/cross.png" alt="Delete" /></a> 
                              <?php } else {?>
                              
                                 <a href="javascript:confirmDelete('<?php echo DOMAINAD?>email/delete/<?php echo $value['Email']['id'] ?>')" title="Delete"><img src="<?php echo DOMAINAD?>images/icons/cross.png" alt="Delete" /></a> 
                             
                            <?php }?>
                        </td>
                    </tr>
                   <?php }?>
                </tbody>
             <?php echo $this->Form->end(); ?>
				<a class="button" href="<?php echo DOMAINAD?>email/excel">Download file excel</a>
            </table>
            
        </div> <!-- End #tab1 -->
        
         <!-- End #tab2 -->        
        
    </div> <!-- End .content-box-content -->
 </div>
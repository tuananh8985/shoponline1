
<div id="khung">
	<div id="main">
		<div class="toolbar-list" id="toolbar">
                    <ul>
                       
                        <li class="divider"></li>
                        <li id="toolbar-help">
                            <a href="#messages" rel="modal" class="toolbar">
                                <span class="icon-32-help"></span>
                                Trợ giúp
                            </a>
                        </li>
                        <li id="toolbar-unpublish">
                            <a href="<?php echo DOMAINAD?>home" class="toolbar">
                                <span class="icon-32-unpublish"></span>
                                Đóng
                            </a>
                        </li>
                    </ul>
                    <div class="clr"></div>
                </div>
        <div class="pagetitle icon-48-nhomtin"><h2>Danh sách học viên đăng ký học Online</h2></div>
		<div class="clr"></div>
	</div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <table class="timkiem">
        	<tr>
			<form action="<?php echo DOMAINAD?>Contacts/search" method="post">
            	<td valign="top">Tìm kiếm</td>
            	<td><input type="text" id="field2c" name="name" class="text-input"></td>
                
                <td><input type="submit" name="" value="Tìm kiếm" class="button" /></td>
				</form>
            </tr>
        </table>
        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab"></a></li> 
            <li><a href="#tab2"></a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1"> 
            <table>
             <form action="<?php echo DOMAINAD; ?>Contacts/processing" name="form1" method="post">
            	<thead>
				
                    <tr>
                      <th width="2%"><input type="checkbox" name="all" id="checkall" /></th>
                       <th width="7%">STT</th>
					    <th>Ngày gửi</th>
						
                       <th>Tên người gửi</th>
                       <th>Email</th>
	
                       <th>Điện thoại</th>
					    
                       <th>Xử lý</th>
                       <th width="3%">ID</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="bulk-actions align-left">
                                <select name="dropdown">
                                    <option value="option1">Lựa chọn</option>
                                    <option value="active">Active</option>
                                    <option value="notactive">Hủy Active</option>
                                    <option value="delete">Delete</option>
                                </select>
                                <a class="button" href="#" onclick="document.form1.submit();">Thực hiện</a>
                            </div>
                             <div class="pagination">
                               
							     <?php 
								  echo $this->Paginator->numbers()." ";
                                
                                ?>
                              </div>
                            </div> 
                            <div class="clear"></div>
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                   <?php  foreach ($Contact as $key =>$value){?>
                    <tr>
                        <td><input type="checkbox" name="<?php echo $value['Contact']['id']; ?>" /></td>
                        <td><?php $j=$key+1; echo $j;?></td>
						 <td><?php echo date('d-m-Y', strtotime($value['Contact']['created'])); ?></td>
						
                        <td><a href="<?php echo DOMAINAD?>contacts/view/<?php echo $value['Contact']['id']?>"><?php echo $value['Contact']['name']; ?></a></td>
                        <td><?php  echo $value['Contact']['email'];?></td>
			
						 <td><?php  echo $value['Contact']['mobile'];?></td>
                       
					
                        <td>
                             
                             <a href="javascript:confirmDelete('<?php echo DOMAINAD?>Contacts/delete/<?php echo $value['Contact']['id'] ?>')" title="Delete"><img src="<?php echo DOMAINAD?>images/icons/cross.png" alt="Delete" /></a>
                     
                        </td>
                        <td align="right"><?php echo $value['Contact']['id'];?></td>
                    </tr>
                   <?php }?>
                </tbody>
				</form>
            </table>
        </div> <!-- End #tab1 -->
        <!-- End #tab2 -->        
    </div> <!-- End .content-box-content -->
 </div>

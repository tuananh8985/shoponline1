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
        <div class="pagetitle icon-48-nhomtin"><h2>Quản lý câu hỏi</h2></div>
		<div class="clr"></div>
	</div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <table class="timkiem">
        	<tr>
			<form action="<?php echo DOMAINAD?>Email/search" method="post">
            	<td valign="top">Tìm kiếm</td>
            	<td><input type="text" id="field2c" name="name" class="text-input"></td>
                
                <td><input type="submit" name="" value="Tìm kiếm" class="button" /></td>
				</form>
            </tr>
        </table>
        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Danh sách câu hỏi</a></li> 
            <li><a href="#tab2"></a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1"> 
            <table>
             <form action="<?php echo DOMAINAD; ?>Email/processing" name="form1" method="post">
            	<thead>
				
                    <tr>
                       <th width="1%"><input class="check-all" type="checkbox" /></th>
                       <th width="7%">STT</th>
					    <th>Ngày gửi</th>
						<th>Tên người gửi</th>
					   <th>Email</th>
					    <th>Địa chỉ</th>
						<th>Điện thoại</th>
					   <th>Câu hỏi</th>
                      <th>Câu trả lời</th>
					  <th>Trả lời</th>
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
                   <?php  foreach ($Email as $key =>$value){?>
                    <tr>
                        <td><input type="checkbox" name="<?php echo $value['Email']['id']; ?>" /></td>
                        <td><?php $j=$key+1; echo $j;?></td>
						 <td><?php echo date('d-m-Y', strtotime($value['Email']['created'])); ?></td>
						<td><?php  echo $value['Email']['name'];?></td>
                        <td><?php  echo $value['Email']['email'];?></td>
						<td><?php  echo $value['Email']['address'];?></td>
                        <td><?php  echo $value['Email']['phone'];?></td>
						 <td><?php  echo $value['Email']['content'];?></td>
						 <td><?php  echo $value['Email']['order'];?></td>
						<td align="center">
							<a href="<?php echo DOMAINAD ?>Emaildk/edit/<?php echo $value['Email']['id']; ?>" title="Edit"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Edit" /></a>
						</td>
                        <td>
                              <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>Emaildk/delete/<?php echo $value['Email']['id']; ?>')" title="Delete"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Delete" /></a>
                                <?php
                                    if ($value['Email']['status'] == 0) {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>Emaildk/active/<?php echo $value['Email']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                <?php
                                    } else {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>Emaildk/close/<?php echo $value['Email']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                <?php
                                    }
                                    ?>
                     
                        </td>
                        <td align="right"><?php echo $value['Email']['id'];?></td>
                    </tr>
                   <?php }?>
                </tbody>
				</form>
            </table>
        </div> <!-- End #tab1 -->
        <!-- End #tab2 -->        
    </div> <!-- End .content-box-content -->
 </div>

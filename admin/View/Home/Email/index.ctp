
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
        <div class="pagetitle icon-48-nhomtin"><h2>Email đăng ký nhận tin</h2></div>
		<div class="clr"></div>
	</div>
</div>
<div class="content-box">
 
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1"> 
            <table>
             <form action="<?php echo DOMAINAD; ?>Email/processing" name="form1" method="post">
            	<thead>
				
                    <tr>
                       <th width="1%"><input class="check-all" type="checkbox" /></th>
                       <th width="7%">STT</th>
					    <th>Ngày đăng ký</th>
				
                       <th>Email</th>
					  
					    
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
						 <td><?php  echo $value['Email']['email'];?></td>
                    <!--    <td><a href="<?php echo DOMAINAD?>email/view/<?php echo $value['Email']['id']?>"><?php echo $value['Email']['name']; ?></a></td>
                        <td><?php  echo $value['Email']['email'];?></td>
						 <td><?php  echo $value['Email']['address'];?></td>
						 <td><?php  echo $value['Email']['phone'];?></td>-->
                       
					
                        <td>
                             
                             <a href="javascript:confirmDelete('<?php echo DOMAINAD?>Email/delete/<?php echo $value['Email']['id'] ?>')" title="Delete"><img src="<?php echo DOMAINAD?>images/icons/cross.png" alt="Delete" /></a>
                     
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

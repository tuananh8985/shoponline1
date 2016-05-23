 <style>
 table{
	 text-align:left !important;
	 border:1px solid #999 !important;
	 }
 table td{
	 border:1px solid #999 !important;
	 padding-left:20px;
	 }
</style>
 <div id="news">
  <div id="title-news"><p>Chi tiết đăng ký học online</p></div>
     <div class="list-news">
    
        <?php
            echo $this->Html->script(array('ckeditor/ckeditor','ckfinder/ckfinder'));
        ?>
             
            <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
			  
			  <tr>
                <td width="250">Họ tên:</td>
                <td><?php echo $views['Contact']['name']?></td>
              </tr>      
			  
      
              <tr >
                <td>Trình độ hiện tại: </td>
                <td>                      
                    <?php echo $views['Contact']['address']; ?>
                    
                </td>
              </tr>
             
            
			     <tr class="alternate-row">
                <td>Khóa học đăng ký:  </td>
                <td>
               <?php echo $views['Contact']['title']; ?>
                </td>
              </tr>
              <tr>
                <td>Thời gian muốn học tiếng Nhật : </td>
                <td>
				  <?php echo $views['Contact']['thoigian']; ?>
                </td>
              </tr>
               <tr  class="alternate-row">
                <td>Thời điểm muốn đi du học :</td>
                <td>                      
                     <?php echo $views['Contact']['thoidiem'];?>
                </td>
              </tr>
			    <tr>
                <td>Điện thoại:</td>
                <td>
                  <?php echo $views['Contact']['mobile'];?>
                </td>
              </tr>
			    <tr>
                <td>Email: </td>
                <td>
                  <?php echo $views['Contact']['email'];?>
                </td>
              </tr>
			    <tr>
                <td>Facebook:  </td>
                <td>
                  <?php echo $views['Contact']['facebook'];?>
                </td>
              </tr>
			    <tr>
                <td>Skype :</td>
                <td>
                  <?php echo $views['Contact']['skype'];?>
                </td>
              </tr>
               <tr>
                <td>Yahoo :</td>
                <td>
                  <?php echo $views['Contact']['yahoo'];?>
                </td>
              </tr>
			 
                <tr>
                <td>
			Mong muốn tham gia chương trình</td>
                <td>
                  <?php echo $views['Contact']['subject'];?>
                </td>
              </tr>
			   <tr>
                <td>
			Ghi chú:  </td>
                <td>
                  <?php echo $views['Contact']['content'];?>
                </td>
              </tr>
			   <tr>
                <td>
			File đính kèm:  </td>
                <td>
                  <a href="<?php echo DOMAINAD?><?php echo $views['Contact']['userfile'];?>">Download</a>
                </td>
              </tr>
             <tr>                 
                 <td colspan="2">
				 <input class="submit" type="button" name = "" value="Quay lại" onclick ="javascript: window.history.go(-1);" /></td>
                
            </tr>
            </table>
            <!--  end product-table................................... -->
         
  </div>
</div>       
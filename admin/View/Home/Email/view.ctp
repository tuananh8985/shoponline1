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
  <div id="title-news"><p>Chi tiết đơn hàng</p></div>
     <div class="list-news">
    
        <?php
            echo $this->Html->script(array('ckeditor/ckeditor','ckfinder/ckfinder'));
        ?>
             
            <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
              <tr>
                <td width="250">Ngày gửi</td>
                <td>                      
                     <?php echo $views['Email']['created']?>
                </td>
              </tr>
              
              
            
              <tr >
                <td>Người gửi </td>
                <td>                      
                    <?php echo $views['Email']['name']; ?>
                  
                    
                </td>
              </tr>
             
              <tr class="alternate-row">
                <td>Email</td>
                <td>
               <?php echo $views['Email']['email']; ?>
                </td>
              </tr>
               <tr>
                <td>Địa chỉ</td>
                <td>
				  <?php echo $views['Email']['address']; ?>
                </td>
              </tr>
               <tr  class="alternate-row">
                <td>Điện thoại</td>
                <td>                      
                     <?php echo $views['Email']['phone'];?>
                </td>
              </tr>
              
               <tr>
                <td>Nội dung đơn hàng</td>
                <td>
                  <?php echo $views['Email']['order'];?>
                </td>
              </tr>
             <tr>                 
                 <td colspan="2"><input class="submit" type="button" name = "" value="Quay lại" onclick ="javascript: window.history.go(-1);" /></td>
                
            </tr>
            </table>
            <!--  end product-table................................... -->
         
  </div>
</div>       
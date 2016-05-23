<div class="boxmain">
<div id="title_content">

         
             <h2>Tin tức</h2>
				
   </div>
 
     <table border="0" cellspacing="0" cellpadding="0">
                    <?php foreach ($listNews as $rows) { ?>
                        <div id="row_news">
                      <?php if($rows['Tintuc']['images']){?>
								 <img alt="<?php echo $rows['Tintuc']["name"]; ?>" width="120" height="90"src="<?php echo IMAGEAD?>tintuc/<?php echo $rows['Tintuc']['images']?>">
								 <?php } else {?>
								<img alt="<?php echo $rows['Tintuc']["name"]; ?>" width="120" height="90"src="<?php echo DOMAIN?>images/no-images.jpg">
								 <?php }?>
								 <div class="row-content">
                                   <h3> <a alt="<?php echo $rows['Tintuc']["name"]; ?>" title="<?php echo $rows['Tintuc']["name"]; ?>"id="tenbaiviet1" href="<?php echo DOMAIN; ?>ct/<?php echo $rows['Tintuc']['id']; ?>/<?php echo $rows['Tintuc']['slug']?>">
									<?php echo $rows['Tintuc']["name"]; ?></a></h3>
                                    <div class="content_Tintuc"> 
									   <?php 
										 echo $this->Text->truncate($rows['Tintuc']['content'], 150,array(  'ending' => '...', 'exact' => false,'html' => true ));
										 ?>
                                    </div>
                               
                           </div>     
						      </div> 
                      
                    <?php } ?>  
        </tr>   
                </table><tr>
                <td>
                 <div class="pagination">
    <?php
        echo $this->Paginator->first('« Đầu ', null, null, array('class' => 'disabled'));     
        echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled')); 
        echo $this->Paginator->numbers()." ";
        echo $this->Paginator->next(' Tiếp »', null, null, array('class' => 'disabled')); 
        echo $this->Paginator->last('« Cuối ', null, null, array('class' => 'disabled')); 
    ?>
</div>
            </td>
            </tr>	
</div>
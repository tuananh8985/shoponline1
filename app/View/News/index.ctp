<div class="boxmain">
<div id="title_content">

         
             <h2><?php echo $typeName['Catalogue']["name"] ?></h2>
				
   </div>
 
     <table border="0" cellspacing="0" cellpadding="0">
                    <?php foreach ($listNews as $rows) { ?>
                        <div id="row_news">
                      <?php if($rows['News']['images']){?>
								 <img alt="<?php echo $rows['News']["name"]; ?>" width="120" height="90"src="<?php echo IMAGEAD?>news/<?php echo $rows['News']['images']?>">
								 <?php } else {?>
								 <img alt="<?php echo $rows['News']["name"]; ?>" width="120" height="90"src="<?php echo DOMAIN?>images/no-images.jpg">
								 <?php }?>
								 <div class="row-content">
                                   <h3> <a alt="<?php echo $rows['News']["name"]; ?>" title="<?php echo $rows['News']["name"]; ?>"id="tenbaiviet1" href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['alias']?>">
									<?php echo $rows['News']["name"]; ?></a></h3>
                                    <div class="content_news"> <?php echo $rows['News']["shortdes"]; ?></div>
                               
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
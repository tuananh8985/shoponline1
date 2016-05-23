<div id="login-inner">
 <?php echo $this->Form->create(null, array( 'url' => DOMAINAD.'login/login','type' => 'post')); ?>	
				
    <div class="notification information png_bg">
		<?php echo $this->Session->flash(); ?>
    </div>
    
    <p>
        <label>Username</label>
        <?php echo $this->Form->input('Administrator.name',array( 'label' => '','class'=>'text-input'));?>
    </p>
    <div class="clear"></div>
    <p>
        <label>Password</label>
       <?php echo $this->Form->input('Administrator.password',array( 'label' => '','type'=>'password','class'=>'text-input'));?>
    </p>
    <div class="clear"></div>
    <p id="remember-password">
       <!-- <input type="checkbox" />Remember me-->
    </p>
    <div class="clear"></div>
    <p>
        <input class="button" type="submit" value="Sign In" />
    </p>
    
 <?php echo $this->Form->end(); ?>	
 </div>
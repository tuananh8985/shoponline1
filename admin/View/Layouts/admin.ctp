<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Administractor</title>
    <?php echo $this->Html->css(array("reset", 'style')); ?>
    <?php echo $this->Html->script(array('jquery.min', 'ddaccordion', 'function')); ?>
    <?php echo $this->Html->script('ckeditor/ckeditor'); ?>
    <?php echo $this->Html->script('ckfinder/ckfinder'); ?>
</head>

<body>
    <div id="body-wrapper"> 
        <?php echo $this->element('sidebar'); ?>
        <div id="main-content"> 
            <noscript> 
                <div class="notification error png_bg">
                    <div>

                    </div>
                </div>
            </noscript>

            <?php echo $this->element('menu'); ?>

            <div class="clear"></div>
            <?php echo $content_for_layout; ?>

            <div id="footer">
                <small>
                    <?php echo $this->element('footer'); ?>
                </small>
            </div>

        </div> 
    </div>
    <?php echo $this->element('hotro'); ?>
</body>
</html>

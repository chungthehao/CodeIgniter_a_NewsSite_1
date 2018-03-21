<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link href="<?php echo base_url();?>public/<?php echo $module;?>/css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>public/<?php echo $module;?>/js/jquery-3.3.1.min.js"></script>

<title><?php echo $title;?></title>
</head>
<body>
	<?php
        $this->load->view("$module/top");
    ?>
    <div id="main">
    	<?php
            $this->load->view("$module/left");
        ?>
        <div id="info">
            <?php $this->load->view($whatView);?>                    
        </div> <!-- hết div info -->
    </div>
    <?php
        $this->load->view("$module/bottom");
    ?>

<script>
        $("#left ul:first").attr("id","verticalmenu");
</script>
<script src="<?php echo base_url();?>public/<?php echo $module;?>/js/menu.js"></script>
</body>
</html>

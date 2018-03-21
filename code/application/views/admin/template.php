<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link href="<?php echo base_url();?>public/<?php echo $module;?>/css/style2.css" rel="stylesheet" type="text/css" />
<title><?php echo $title;?></title>
<script>
    var baseUrl = "<?php echo base_url();?>";
</script>
<script src="<?php echo base_url();?>public/<?php echo $module;?>/js/myScript.js"></script>
<script src="<?php echo base_url();?>public/<?php echo $module;?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>public/<?php echo $module;?>/js/my_jquery.js"></script>
<script src="<?php echo base_url();?>public/<?php echo $module;?>/js/ckeditor/ckeditor.js"></script>
</head>
<body>
	<?php $this->load->view("$module/top");?>
    <?php 
        if($this->session->userdata('sess_username')){
            $this->load->view("$module/menu");
        }
    ?>
    <div id="main">
    	
        <div id="info">
        	<?php $this->load->view($whatView);?>
        </div> <!-- hết phần div info -->
    </div>
    <?php $this->load->view("$module/bottom");?>
</body>
</html>

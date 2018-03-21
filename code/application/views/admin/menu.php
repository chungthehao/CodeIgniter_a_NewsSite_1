<div id="menu">
	<ul>
    	<li><a href="<?php echo base_url()."admin/index";?>">Admin Page</a></li>
    	<li><a href="<?php echo base_url()."admin/user";?>">Account Manager</a></li>
    	<li><a href="<?php echo base_url()."admin/news";?>">News Manager</a></li>
    	<li><a href="<?php echo base_url()."admin/categorie";?>">Categorie Manager</a></li>
    	<li><a href="<?php echo base_url()."admin/verify/logout";?>">Logout (<?php echo $this->session->userdata('sess_username');?>)</a></li>
    </ul>
</div>
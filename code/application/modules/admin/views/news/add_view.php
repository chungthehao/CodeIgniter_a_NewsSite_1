<div class="formPanel big">
<?php
	echo validation_errors('<li>','</li>');
	if(isset($error)){// ít xảy ra, lỗi này là lỗi upload
		echo '<div class="error-mess">';
		echo '<ul>';
		echo '<li>'.$error.'</li>';
		echo '</ul>';
		echo '</div>';
	}
?>
    <fieldset>
    <legend>Add a News</legend>
    <form action="<?php echo base_url()."admin/news/add";?>" method="post" enctype="multipart/form-data">
        <label>Categorie</label>
        <select name="cate-list">
            <?php 
                callMenu($cateInfoArr);
            ?>
        </select><br />
        <label>News Title</label>
        <input type="text" name="txttitle" size="53" /><br />
        <label>News Author</label>
        <input type="text" name="txtauthor" size="53" /><br />
        <label>News Info</label>
        <textarea name="txtinfo" cols="50" rows="4"></textarea><br />
        <label>News Detail</label>
        <textarea name="txtdetail" cols="50" rows="15"></textarea><br />
        <script>
        	CKEDITOR.replace('txtdetail');
        </script>
        <label>News Image</label>
        <input type="file" name="img" /><br />
        <label>&nbsp;</label>
        <input class="button" type="submit" name="ok" value="Add" />
    </form>
    </fieldset>
</div>
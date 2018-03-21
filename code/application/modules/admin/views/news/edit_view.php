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
    <legend>Edit a News</legend>
    <form action="<?php echo base_url()."admin/news/edit/$newsInfo[news_id]";?>" method="post" enctype="multipart/form-data">
        <label>Categorie</label>
        <select name="cate-list">
            <?php 
                callMenu($cateInfoArr,0,'',$newsInfo['cate_id']);
            ?>
        </select><br />
        <label>News Title</label>
        <input type="text" name="txttitle" size="53" value="<?php echo $newsInfo['news_title'];?>" /><br />
        <label>News Author</label>
        <input type="text" name="txtauthor" size="53" value="<?php echo $newsInfo['news_author'];?>" /><br />
        <label>News Info</label>
        <textarea name="txtinfo" cols="50" rows="4"><?php echo $newsInfo['news_info'];?></textarea><br />
        <label>News Detail</label>
        <textarea name="txtdetail" cols="50" rows="15"><?php echo $newsInfo['news_full'];?></textarea><br />
        <script>
        	CKEDITOR.replace('txtdetail');
        </script>
        <label>News Image</label>
        <input type="file" name="img" /><br />
        <?php
        if($newsInfo['news_img'] != ''){
            echo "<label>Your Image</label>";
            echo "<img width='150px' src='".base_url()."uploads/main/$newsInfo[news_img]' /><br />";
        }
        ?>
        <label>&nbsp;</label>
        <input class="button" type="submit" name="ok" value="Save" />
    </form>
    </fieldset>
</div>
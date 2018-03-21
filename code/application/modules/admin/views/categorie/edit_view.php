
    <?php 
        if(isset($mess) && $mess != ''){
            echo '<div align="center">';
            echo "<div class='small error-mess'>";// Khi k nhập cate name
            echo '<ul>';
            echo "<li>$mess</li>";
            echo '</ul>';
            echo "</div>";
            echo '</div>';
        }
     ?>
    <div class="formPanel small">
        <div id="form-info">
            <!-- thông báo khi người ta không nhập thông tin ở đây! -->
        </div>
        <fieldset>
            <legend>Edit a Categorie</legend>
            <form action="<?php echo base_url()."admin/categorie/edit/$cateInfo[cate_id]";?>" method="post">
                <label>Categorie</label>
                <select name="cate-list">
                    <option value="0">New Root</option>
                    <?php 
                        callMenu($cateInfoArr,0,'',$cateInfo['cate_parent']);
                    ?>
                </select><br />
                <label>Categorie Name</label>
                <input type="text" name="txtcate" value="<?php echo $cateInfo['cate_title'];?>" /><br />
                <label>&nbsp;</label>
                <input class="button" type="submit" name="ok" value="Save" />
            </form>
        </fieldset>
    </div>

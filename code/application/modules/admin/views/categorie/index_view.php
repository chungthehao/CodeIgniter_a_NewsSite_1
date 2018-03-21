<div align='center'>

<?php 
	if(isset($mess) && $mess != ''){
		echo "<div class='success-mess'>";// Có thể là add/edit/login thành công
		echo '<ul>';
		echo "<li>$mess</li>";
		echo '</ul>';
		echo "</div>";
	}
 ?>

<div id="table-data">
    <table align="center" width="450">
        <tr>
            <td class="title">STT</td>
            <td class="title">Categorie</td>
            <td class="title">Edit</td>
            <td class="title">Del</td>
        </tr>
        <?php
        $stt = 0;
        foreach($cateInfoArr as $cateInfo){
            $stt++;
            echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td>$cateInfo[cate_title]</td>";
            echo "<td><a href='".base_url()."$module/categorie/edit/$cateInfo[cate_id]'>Edit</a></td>";
            echo "<td><a onclick='return xacNhanXoa(\"Are you sure you want to delete $cateInfo[cate_title] categorie?\")' href='".base_url()."$module/categorie/del/$cateInfo[cate_id]'>Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<table align="center" width="450">
    <tr>
        <td colspan="4"><strong><a href="javascript:void(69)" id="add-cate-link"><font color="#99CC33">Add A Categorie</font></a></strong></td>
    </tr>
</table>
<?php
	// echo $page_links;
?>
</div> <!-- hết div align center -->
<div id="add-cate-form" style="display:none;">
    <div class="formPanel small">
        <div id="form-info">
            <!-- thông báo khi người ta không nhập thông tin ở đây! -->
        </div>
        <fieldset>
            <legend>Add a Categorie</legend>
            <form action="" method="post">
                <label>Categorie</label>
                <select id="cate-list">
                    <option value="0">New Root</option>
                    <?php 
                        callMenu($cateInfoArr);
                    ?>
                </select><br />
                <label>Categorie Name</label>
                <input type="text" id="txtcate" /><br />
                <label>&nbsp;</label>
                <input class="button" type="submit" id="ok" value="Add" />
            </form>
        </fieldset>
    </div>
</div>
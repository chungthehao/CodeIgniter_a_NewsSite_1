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

<table align="center" width="700">
	<tr>
    	<td colspan="7"><strong><a href="<?php echo base_url()."$module/news/add";?>"><font color="#99CC33">Add A News</font></a></strong></td>
    </tr>
	<tr>
    	<td class="title">STT</td>
        <td class="title">News Title</td>
        <td class="title">News Author</td>
        <td class="title">Cate</td>
        <td class="title">User</td>
        <td class="title">Edit</td>
        <td class="title">Del</td>
    </tr>
    <?php
    $stt = 0;
    foreach($newsInfoArr as $newsInfo){
    	$stt++;
    	echo "<tr>";
    	echo "<td>$stt</td>";
    	echo "<td>$newsInfo[news_title]</td>";
    	echo "<td>$newsInfo[news_author]</td>";
    	echo "<td>$newsInfo[cate_title]</td>";
    	echo "<td>$newsInfo[username]</td>";
    	
    	echo "<td><a href='".base_url()."$module/news/edit/$newsInfo[news_id]'>Edit</a></td>";
    	echo "<td><a onclick='return xacNhanXoa(\"Are you sure you want to delete &apos;$newsInfo[news_title]&apos;?\")' href='".base_url()."$module/news/del/$newsInfo[news_id]'>Del</a></td>";
    	echo "</tr>";
    }
    ?>
</table>
<?php
	echo $page_links;
?>
</div>
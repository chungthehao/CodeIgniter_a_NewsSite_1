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

<table align="center" width="450">
	<tr>
    	<td colspan="6"><strong><a href="<?php echo base_url()."$module/user/add";?>"><font color="#99CC33">Add A User</font></a></strong></td>
    </tr>
	<tr>
    	<td class="title">STT</td>
        <td class="title">Username</td>
        <td class="title">Email</td>
        <td class="title">Level</td>
        <td class="title">Edit</td>
        <td class="title">Del</td>
    </tr>
    <?php
    $stt = 0;
    foreach($userInfoArr as $userInfo){
    	$stt++;
    	echo "<tr>";
    	echo "<td>$stt</td>";
    	echo "<td>$userInfo[username]</td>";
    	echo "<td>$userInfo[email]</td>";
    	if($userInfo['level'] == 1){
    		echo "<td>Member</td>";
    	}else{
    		echo "<td style='color:red;'>Admin</td>";
    	}
    	echo "<td><a href='".base_url()."$module/user/edit/$userInfo[id]'>Edit</a></td>";
    	echo "<td><a href='".base_url()."$module/user/del/$userInfo[id]'>Del</a></td>";
    	echo "</tr>";
    }
    ?>
</table>
<?php
	echo $page_links;
?>
</div>
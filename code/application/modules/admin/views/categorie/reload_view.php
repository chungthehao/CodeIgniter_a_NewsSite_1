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
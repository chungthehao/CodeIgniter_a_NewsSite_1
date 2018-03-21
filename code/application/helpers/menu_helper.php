<?php
function callMenu($data,$id_dang_echo=0,$thut_vo='',$select_id=-1){
	foreach($data as $k => $v){
		if($v['cate_parent'] == $id_dang_echo){
			if($select_id != -1 && $v['cate_id'] == $select_id){
				echo "<option value='$v[cate_id]' selected='selected'>$thut_vo$v[cate_title]</option>";
			}else{
				echo "<option value='$v[cate_id]'>$thut_vo$v[cate_title]</option>";
			}
			unset($data[$k]);
			callMenu($data,$v['cate_id'],$thut_vo.'---',$select_id);
		}
	}
}
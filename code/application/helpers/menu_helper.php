<?php
/*
 * Helper tự tạo:
 * - $data là 1 mảng các records
 * - Mỗi record là 1 mảng có 3 key (3 fields): cate_id, cate_title, cate_parent
 * - Việc của function này là tạo ra select box menu, có phân cấp chuyên mục đi theo cha
 */
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
$(document).ready(function(){
	$('#add-cate-link').click(function(){
		$('#add-cate-form').slideToggle();
		$('#add-cate-form #ok').click(function(){
			parent_id = $('#cate-list').val();
			cate_name = $('#txtcate').val();
			// Kiểm tra coi có nhập thông tin chưa
			if(cate_name == ''){
				$('#form-info').html('<ul><li>Please enter your categorie name!</li></ul>').addClass('error-mess');
			}else{
				$.ajax({
					'url':baseUrl+'admin/categorie/add',
					'type':'post',
					'data':'name='+cate_name+'&parent='+parent_id,
					'async':true,
					'success':function(kq){
						if(kq == 'success'){
							// Ẩn form đi
							$('#add-cate-form').fadeOut('slow');
							// Thông báo cho người dùng
							alert(kq);
							// Reset dữ liệu của form và xoá thông báo lỗi cũ (nếu có)
							$('#form-info').html('').removeClass('error-mess');
							clearForm();
							// Tải lại bảng cate
							reload();
						}else{
							$('#form-info').html('<ul><li>Fail to insert a new categorie!</li></ul>').addClass('error-mess');
						}
					}
				})
			}
			return false; 	// Để không kích hoạt submit form
							// --> Nếu submit form là load lại trang or load trang khác
							// --> Xử lý AJAX mà
		})
	})	
})
function clearForm(){
	$('#add-cate-form :input').not(':submit').val('');
	$('#cate-list').val(0);
}
function reload(){
	$('#table-data').load(baseUrl+'admin/categorie/reload');
}
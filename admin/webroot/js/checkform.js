function checkForm(frm) {
	var msg = "";
	if (frm.name.value == '') {
		msg += "+ Bạn vui lòng cho biết họ tên\n";
	}
	if (frm.diachi.value == '') {
		msg += "+ Bạn vui lòng nhập địa chỉ\n";
	}
	/*
	if(frm.dienthoai.value == ''){
		msg += "Bạn chưa nhập vào điện thoại\n";
	}
	*/
/*	if (!frm.dienthoai.value) {
		msg += "+ Điên thoại liên hệ không được bỏ trống\n";
	} else */
	
	if (isNaN(frm.dienthoai.value)) {
	//} else if (! (/(^\d+$)|(^\d+\.\d+$)/.test(frm.dienthoai.value))) {
		msg += "+ Điên thoại phải là kiểu số \n";
	}
	/*
	if(frm.email.value == ''){
		msg += "Địa chỉ email là bắt buộc phải điền\n";
	}
	*/
	if (!frm.email.value) {
		msg += "+ Email liên hệ không được bỏ trống \n";
	} else if (! (/^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/.test(frm.email.value))) {
		msg += "+ E-mail phải là kiểu xxxxx@xxxxx \n";
	}
	
	if (frm.tieude.value == '') {
		msg += "+ Bạn vui lòng nhập tiêu dề\n";
	}

	if (frm.noidung.value == '') {
		msg += "+ Bạn chưa nhập nội dung liên hệ\n";
	}
	if (msg != "") {
		alert("Các lỗi sau được tìm thấy:\n" + msg);
		return false;
	} else {
		return true;
	}
}
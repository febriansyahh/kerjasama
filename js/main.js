$(document).ready(function () {
	$('#example').DataTable();
});

function editableUnit(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(data);
	$("#editID").val(exp[0]);
	$("#editNm").val(exp[1]);
	$("#editIdTingkat").val(exp[2]);
}

function editableTingkatan(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(data);
	$("#editID").val(exp[0]);
	$("#editNm").val(exp[1]);
}

function editableUser(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(data);
	$("#editID").val(exp[0]);
	$("#editnmUser").val(exp[1]);
	$("#editUsername").val(exp[2]);
	$("#editPassword").val(exp[3]);
	$("#editnmUnit").val(exp[4]);
	$("#editidUnit").val(exp[5]);
	$("#editlevelUser").val(exp[6]);
	$("#editIsView").val(exp[7]);
	$("#editIsDownload").val(exp[8]);
}

function editableStatus(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(data);
	$("#editID").val(exp[0]);
	$("#editNm").val(exp[1]);
}

function editableMastermou(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(data);
	$("#editID").val(exp[0]);
	$("#editNm").val(exp[1]);
}

function editableFile(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	let type = exp[1].split(".");
	console.log(exp);
	console.log(type);
	console.log(type[1]);
	$("editID").val(exp[0]);
	$("editFile").val(exp[1]);
	console.log(base_url);
	if (type[1] != 'pdf') {
		$('#showFile').html(`<img id="blah" src="${base_url + '/upload/ajuan/' + exp[1]}" width="520px" height="350px" />`);
	} else {
		$('#showFile').html(`<iframe src="${base_url + '/upload/ajuan/' + exp[1]}" height="520px" width="470px"></iframe>`);
	}
}

function readURL(input, type) {
	const [file] = input.files
	let fileType = file['type'];
	let validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
	console.log('AAA');

	if (file) {
		// swal({
		//   title: "INFO !!",
		//   text: "Jika Sudah, Tekan Tombol Ajukan untuk Menyelesaikan Proses Pengajuan!",
		//   icon: "info",
		//   button: "Baik !",
		// })
		if (!validImageTypes.includes(fileType)) {
			$('#showFile').html(`<iframe src="${URL.createObjectURL(file) }" height="520px" width="470px"></iframe>`);
			document.getElementById(type).value = URL.createObjectURL(file);
		} else {
			$('#showFile').html(`<img id="blah" src="${URL.createObjectURL(file)}" width="520px" height="350px" />`);
			document.getElementById(type).value = URL.createObjectURL(file);
		}
	}
}

// function editableAjuan(param) {
// 	let data = $(param).data("id");
// 	let exp = data.split("~");
// 	console.log(exp);
// 	$("editID").val(exp[0]);
// 	$("editFile").val(exp[1]);
// 	console.log(base_url);
// }

function readURLEdit(input, type) {
	const [file] = input.files
	let fileType = file['type'];
	let validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
	
		if (file) {
			// swal({
			//   title: "INFO !!",
			//   text: "Jika Sudah, Tekan Tombol Ajukan untuk Menyelesaikan Proses Pengajuan!",
			//   icon: "info",
			//   button: "Baik !",
			// })
			if (!validImageTypes.includes(fileType)) {
				$('#showFile').html(`<iframe src="${URL.createObjectURL(file)}" height="240px" width="470px"></iframe>`);
				document.getElementById(type).value = URL.createObjectURL(file);
			} else {
				$('#showFile').html(`<img id="blah" src="${URL.createObjectURL(file)}" width="240px" height="350px" />`);
				document.getElementById(type).value = URL.createObjectURL(file);
			}
	}
}

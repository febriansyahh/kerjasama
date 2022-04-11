$(document).ready(function () {
	$('#example').DataTable();
});

$("#kerjasama").DataTable({
    columns: [
      { width: "5%" }, // No
      { width: "10%" }, // Unit
      { width: "20%" }, // Nama Kerjasama
      { width: "15%" }, // Ajuan
      { width: "15%" }, // Mitra
      { width: "20%" }, // Bentuk MOA
      { width: "15%" }, // Pilihan
    ],
  });

function kerjaFunc() {
	var selectBox = document.getElementById("kerjasama");
	console.log("AAA");
	var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	let exp = selectedValue.split("~"); // untuk exp[0] -> id_ajuan || u/ exp[1] -> id_mou
	var id_mou = exp[1];

	$.ajax({
      type: "POST",
      url: base_url + "admin/kerjasama/changeKerjasama",
      data: { id_mou },
      success: function (response) {
        $("#mouKerja").html(response);
      },
    });
}

function moaFunc() {
	var selectBox = document.getElementById("moa");
	var moa = selectBox.options[selectBox.selectedIndex].value;
	$.ajax({
      type: "POST",
      url: base_url + "admin/kerjasama/changeMoa",
      data: { moa },
      success: function (response) {
        $("#result").html(response);
      },
    });
}

function riksFunc() {
	var selectBox = document.getElementById("riks");
	var rks = selectBox.options[selectBox.selectedIndex].value;
	$.ajax({
      type: "POST",
      url: base_url + "admin/kerjasama/changeRiks",
      data: { rks },
      success: function (response) {
        $("#riks_kerjasama").html(response);
      },
    });
}

function editableUnit(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(data);
	$("#editID").val(exp[0]);
	$("#editNm").val(exp[1]);
	$("#editIdTingkat").val(exp[2]);
	$("#editParent").val(exp[3]);
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

function editableFileKerjasama(param) {
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
		$('#showFile').html(`<img id="blah" src="${base_url + '/upload/kerjasama/' + exp[1]}" width="520px" height="350px" />`);
	} else {
		$('#showFile').html(`<iframe src="${base_url + '/upload/kerjasama/' + exp[1]}" height="520px" width="470px"></iframe>`);
	}
}

function readURL(input, type) {
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


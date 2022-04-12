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

$("#ajuan").DataTable({
    columns: [
      { width: "5%" }, // No
      { width: "20%" }, // Nama Ajuan
      { width: "10%" }, // jenis
      { width: "10%" }, // unit
      { width: "10%" }, // Mitra
      { width: "13%" }, // tgl Mulai
      { width: "12%" }, // tgl selesai
      { width: "20%" }, // Pilihan
    ],
});
  
$("#history").DataTable({
    columns: [
      { width: "5%" }, // No
      { width: "15%" }, // Unit
      { width: "25%" }, // Nama Ajuan
      { width: "15%" }, // mitra
      { width: "10%" }, // bentuk moa
      { width: "10%" }, // tgl selesai
      { width: "20%" }, // Pilihan
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

function detailkerja(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	let type = exp[5].split(".");

	console.log(data);
	console.log(type[1]);

	$("#detID").val(exp[0]);
	$("#detNmAjuan").val(exp[1]);
	$("#detNmKerjasama").val(exp[2]);
	$("#detMitra").val(exp[3]);
	$("#detNmunit").val(exp[4]);
	$("#detFile").val(exp[5]);
	$("#detTglMulai").val(exp[6]);
	$("#detTglSelesai").val(exp[7]);
	$("#detKet").val(exp[8]);
	$("#detmou").val(exp[9]);

	if (type[1] != 'pdf') {
		$('#showFile').html(`<img id="blah" src="${base_url + '/upload/kerjasama/' + exp[5]}" width="520px" height="350px" />`);
	} else {
		$('#showFile').html(`<iframe src="${base_url + '/upload/kerjasama/' + exp[5]}" height="520px" width="100%"></iframe>`);
	}
}

function detailajuan(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	let type = exp[3].split(".");

	console.log(data);
	console.log(type[1]);

	$("#detAID").val(exp[0]);
	$("#detANmAjuan").val(exp[1]);
	$("#detAMitra").val(exp[2]);
	$("#detAFile").val(exp[3]);
	$("#detATglMulai").val(exp[4]);
	$("#detATglSelesai").val(exp[5]);
	$("#detAmou").val(exp[6]);
	$("#detANmunit").val(exp[7]);

	if (type[1] != 'pdf') {
		$('#showFiles').html(`<img id="images" src="${base_url + '/upload/Ajuan/' + exp[3]}" width="520px" height="350px" />`);
	} else {
		$('#showFiles').html(`<iframe src="${base_url + '/upload/Ajuan/' + exp[3]}" height="520px" width="100%"></iframe>`);
	}
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
	console.log(base_url + '/upload/ajuan/' + exp[1]);
	if (type[1] != 'pdf') {
		$('#showpreview').html(`<img id="imgs" src="${base_url + '/upload/ajuan/' + exp[1]}" width="520px" height="350px" />`);
	} else {
		$('#showpreview').html(`<iframe src="${base_url + '/upload/ajuan/' + exp[1]}" height="520px" width="470px"></iframe>`);
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


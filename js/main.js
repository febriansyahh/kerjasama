$(document).ready(function () {
	$('#example').DataTable();
	$('#example1').DataTable().ajax.reload();
	$('#data_table').DataTable();
	// $('#report').DataTable();
});

// $("#report").DataTable({
//     order: [[1, "desc"]],
// });
  
$("#kerjasama").DataTable({
    columns: [
      { width: "5%" }, // No
      { width: "10%" }, // Unit
      { width: "20%" }, // Nama Kerjasama
      { width: "15%" }, // Ajuan
      { width: "20%" }, // Mitra
      { width: "5%" }, // Bentuk MOA
      { width: "25%" }, // Pilihan
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
	var selectBox = document.getElementById("chkerjasama");
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

function groupmou(param) {
	let data = $(param).data("id");
	let exp = data.split("~");

	console.log(data);

	$("#detIDKer").val(exp[0]);
	$("#detIsGroup").val(exp[1]);
	
	let is_group = exp[1];

	console.log(is_group);

	$.ajax({
      type: "POST",
      url: base_url + "kerjasama/modal",
      data: { is_group },
      success: function (response) {
        $("#treeview").html(response);
      },
    });
}

function groupar(param) {
	let data = $(param).data("id");
	let exp = data.split("~");

	console.log(data);

	$("#arIDKer").val(exp[0]);
	$("#arIsGroup").val(exp[1]);
	
	let is_mou = exp[0];
	let is_group = exp[1];

	console.log(is_group);

	$.ajax({
      type: "POST",
      url: base_url + "kerjasama/modal_ar",
      data: { is_mou, is_group },
      success: function (response) {
        $("#ar_view").html(response);
      },
    });
}

// function groupar_panel(param) {
// 	let data = $(param).data("id");
// 	let exp = data.split("~");

// 	console.log(data);

// 	$("#arIDKer").val(exp[0]);
// 	$("#arIsGroup").val(exp[1]);
	
// 	let is_mou = exp[0];
// 	let is_group = exp[1];

// 	console.log(is_group);

// 	$.ajax({
//       type: "POST",
//       url: base_url + "admin/kerjasama/modal_ar",
//       data: { is_mou, is_group },
//       success: function (response) {
//         $("#ar_view").html(response);
//       },
//     });
// }

function detmoa(param) {
	let data = $(param).data("id");
	let exp = data.split("~");

	console.log(data);

	$("#IDKer").val(exp[0]);
	$("#IsGroup").val(exp[1]);
	
	let is_group = exp[1];

	console.log(is_group);
	console.log('AAA');
	

	$.ajax({
      type: "POST",
      url: base_url + "admin/kerjasama/modal",
      data: { is_group },
      success: function (response) {
        $("#treeview").html(response);
      },
    });
}

function detkernon(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	let type = exp[5].split(".");

	console.log(data);
	console.log(type[1]);

	$("#nonID").val(exp[0]);
	$("#nonNmAjuan").val(exp[1]);
	$("#nonNmKerjasama").val(exp[2]);
	$("#nonMitra").val(exp[3]);
	$("#nonNmunit").val(exp[4]);
	$("#nonFile").val(exp[5]);
	$("#nonTglMulai").val(exp[6]);
	$("#nonTglSelesai").val(exp[7]);
	$("#nonKet").val(exp[8]);
	$("#nonmou").val(exp[9]);
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


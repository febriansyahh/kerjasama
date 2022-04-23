$(document).ready(function () {
	$('#example').DataTable();
	$('#example1').DataTable().ajax.reload();
	$('#data_table').DataTable();
	 $('#data_tables').DataTable();
	// $('#report').DataTable();
});


// $("#report").DataTable({
//     order: [[1, "desc"]],
// });
  
$("#history_det").DataTable({
    columns: [
      { width: "5%" }, // No
      { width: "15%" }, // Unit
      { width: "15%" }, // Nama Kerjasama
      { width: "17%" }, // Mitra
      { width: "8%" }, // Bentuk
      { width: "8%" }, // Tgl Mulai
      { width: "8%" }, // Tgl Selesai
      { width: "16%" }, // status
      { width: "8%" }, // Tgl Selesai
    ],
  });
  
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
  
$("#kerjasama_result").DataTable({
    columns: [
      { width: "5%" }, // No
      { width: "20%" }, // Unit
      { width: "25%" }, // Nama Kerjasama
      { width: "15%" }, // Ajuan
      { width: "20%" }, // Mitra
      { width: "5%" }, // Bentuk MOA
      { width: "15%" }, // Pilihan
    ],
  });

$("#ajuan").DataTable({
    columns: [
      { width: "5%" }, // No
      { width: "17%" }, // Nama Ajuan
    //   { width: "5%" }, // jenis
      { width: "10%" }, // unit
      { width: "15%" }, // Mitra
      { width: "13%" }, // tgl Mulai
      { width: "12%" }, // tgl selesai
      { width: "10%" }, // Status
      { width: "18%" }, // Pilihan
    ],
});

$("#ajuan_non").DataTable({
    columns: [
      { width: "5%" }, // No
      { width: "17%" }, // Nama Ajuan
      { width: "10%" }, // unit
      { width: "15%" }, // Mitra
      { width: "13%" }, // tgl Mulai
      { width: "12%" }, // tgl selesai
      { width: "18%" }, // Status
      { width: "10%" }, // Pilihan
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

// function cekajuan() {
// 	var selectBox = document.getElementById("chkerjasama");
// 	var ajuan = selectBox.options[selectBox.selectedIndex].value;
// 	console.log("AAA");
// 	console.log(ajuan);

// 	$.ajax({
//       type: "POST",
//       url: base_url + "admin/kerjasama/changeKerjasama",
//       data: { ajuan },
//       success: function (response) {
//         $("#mouKerja").html(response);
//       },
//     });
// }


function kerjaFunc() {
	var is_ajuan = document.getElementById("chkerjasama");
	var selectBox = document.getElementById("chekkerja");
	var id_mou = selectBox.options[selectBox.selectedIndex].value;
	var id_ajuan = is_ajuan.options[is_ajuan.selectedIndex].value;
	console.log("AAA");
	console.log(is_ajuan);
	console.log(id_ajuan);
	console.log(id_mou);

	$.ajax({
      type: "POST",
      url: base_url + "admin/kerjasama/changeKerjasama",
      data: { id_mou, id_ajuan },
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

function moakerjasama(param) {
	var is_mou = param;

	$.ajax({
      type: "POST",
      url: base_url + "Kerjasama/changemoa",
      data: { is_mou },
      success: function (response) {
        $("#moa").html(response);
      },
    });
}

function groupmou(param) {
	let data = $(param).data("id");

	let is_group = data;
	
	

	$.ajax({
      type: "POST",
      url: base_url + "Kerjasama/modal",
      data: { is_group },
      success: function (response) {
        $("#treeview").html(response);
      },
    });
}

// function groupmou(params) {

// 	let is_group = params;
// 	console.log(is_group);

// 	$.ajax({
//       type: "POST",
//       url: base_url + "Kerjasama/modal",
//       data: { is_group },
//       success: function (response) {
//         $("#treeview").html(response);
//       },
//     });
// }

function is_mou(param) {
	let data = $(param).data("id");
	let exp = data.split("~");

	console.log(data);

	$("#isIDKer").val(exp[0]);
	$("#isIsGroup").val(exp[1]);
	
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


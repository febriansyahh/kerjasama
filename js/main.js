$(document).ready(function() {
    $('#example').DataTable();
} );

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

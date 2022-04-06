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
  }


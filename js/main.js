$(document).ready(function() {
    $('#example').DataTable();
} );

function editableUnit(param) {
    let data = $(param).data("id");
    let exp = data.split("~");
    console.log(data);
    // $("#editidSiswa").val(exp[0]);
    $("#editID").val(exp[0]); 
    $("#editNm").val(exp[1]); 
    $("#editIdTingkat").val(exp[2]);
  }


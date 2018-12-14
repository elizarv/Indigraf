  
  $(document).ready(function(){
    $("#eliminarArchivo").click(function(e){
       e.preventDefault();
    swal({
  title: "Esta seguro?",
  text: "se eliminara el archivo",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Archivo eliminado con exito!!", {
      icon: "success",
    });
  } 
});
    })
$('#aprobarArchivo').tooltip();
$('#eliminarArchivo').tooltip();
  });

function eliminarUsuario(){
    swal({
  title: "Esta seguro?",
  text: "se eliminara el usuario",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("Usuario eliminado con exito!!", {

      icon: "success",
    });
  } 
});
$('#actualizarUsuario').tooltip();
$('#eliminarUsuario').tooltip();
  }

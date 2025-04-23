<script>
  function ModalEditar(uuid) {
  	var user = uuid;
    var token = $("#token").val();
    	//hace referencia a la ruta , y le mandos los parametros
  		$.get('user-edit/'+ user , function(data){

      //AVATAR
      var urlImagen = "{{ url('/') }}";
      $("#avatar").attr('src', urlImagen+'/storage/user/'+data[0].imagen);

  		//me lo muesta en el input que tenga id mostrar
    	$("#uuid_user").val(data[0].uuid);

if(data[0].image != null){
  $("#image-edit").attr('src', data[0].image);
}else{
  $("#image-edit").attr('src', 'storage/users/avatar-default.svg');
}


// CKEDITOR.instances.contenidoedit.setData(data.contenido);
$("#email").val(data[0].email);

$("#name").val(data[0].name);
$("#lastname").val(data[0].lastname);

$("#sector option[value='"+data[0].sector+"']").attr("selected",true);




//-----------TODOS LOS ROLES AGREGAR----------//
var todos_los_roles = $("#todos_los_roles");
todos_los_roles.empty();
if(data[1] != [] ){
$(data[1]).each(function(key,value){
    todos_los_roles.append(`
    	<option value="`+data[1][key].id+`">`+data[1][key].name+`</option>  
    	`);
  });
}//end if



var asignar_rol = $("#asignar_rol");
asignar_rol.empty();
asignar_rol.append(`
<button type="button" class="btn btn-primary" onclick="asignarRol();" >
<i class="fa fa-check"></i> Asignar Roles 
</button>  
`);
//-----------TODOS LOS ROLES AGREGAR----------//


//-----------TODOS LOS ROLES QUITAR----------//
var todos_los_roles_quitar = $("#todos_los_roles_quitar");
todos_los_roles_quitar.empty();
if(data[1] != [] ){
$(data[1]).each(function(key,value){
    todos_los_roles_quitar.append(`
    	<option value="`+data[1][key].id+`">`+data[1][key].name+`</option>  
    	`);
  });
}//end if

var quitar_rol = $("#quitar_rol");
quitar_rol.empty();
quitar_rol.append(`
<button type="button" class="btn btn-primary" onclick="quitarRol();" >
<i class="fa fa-trash"></i> Quitar Roles </button>
`);
//-----------TODOS LOS ROLES QUITAR----------//



var etiqueta_roles = $("#etiqueta_roles_asignados");
etiqueta_roles.empty();
if(data[2] != [] ){
$(data[2]).each(function(key,value){
    etiqueta_roles.append(`
        <span class="badge badge-warning" >`+value.name+`</span> 
    `);
  });
}//end if


      // if(data.status == "on"){
      //   $('#status-edit').val(data.status).prop('checked', true).change();
      // }else{
      //   // $('#status').val(data.status).prop('checked', false).change();
      //   $('#status-edit').bootstrapToggle('off')
      // }
  

		});
  

   $('#edit-user').modal('show');
}









function ModalDelete(uuid) {
    var token = $("#token").val();
    $("#uuid_delete").val(uuid);
    $('#modal-delete').modal('show');
}




</script>
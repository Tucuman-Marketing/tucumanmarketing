<script>

document.getElementById("price_edit").addEventListener("change", function() {
    var priceValue = this.value.trim(); // Obtener el valor del campo de precio y eliminar espacios en blanco

    // Verificar si el valor es un número válido
    if (!/^\d+(?:[\.,]\d{1,2})?$/.test(priceValue)) {
        // Mostrar un mensaje de error
        alert("Por favor, ingrese un número válido para el precio.");
        this.value = ''; // Limpiar el campo
    }
});

  function ModalEditar(uuid) {
  	var service = uuid;
    var token = $("#token").val();
    	//hace referencia a la ruta , y le mandos los parametros
  		$.get('services/edit/'+ service , function(data){
      // //AVATAR
      // var urlImagen = "{{ url('/') }}";
      // $("#avatar").attr('src', urlImagen+'/storage/user/'+data[0].imagen);

  		//me lo muesta en el input que tenga id mostrar
    	$("#uuid_edit").val(data.uuid);

      // //Image
      // if(data[0].image != null){
      //   $("#image-edit").attr('src', data[0].image);
      // }else{
      //   $("#image-edit").attr('src', 'storage/users/avatar-default.svg');
      // }

      // CKEDITOR.instances.contenidoedit.setData(data.contenido);
      $("#name_edit_services").val(data.name);
      $("#description_edit_services").val(data.description);
      $("#price_edit_services").val(data.price);

      if(data.status == 1){
      const checkboxes = document.querySelector("#status_edit_services");
      checkboxes.checked = true;
      }else{
        const checkboxes = document.querySelector("#status_edit_services");
        checkboxes.checked = false;
      }

		});
  
   $('#edit').modal('show');
}

function ModalDelete(uuid) {
    var token = $("#token").val();
    $("#uuid_delete").val(uuid);
    $('#delete').modal('show');
}

</script>
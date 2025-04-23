columns: [

    //ID
   { data: null,targets:0, visible:false, orderable:false,  render: function ( data, type, row ) {
       return data.id
        }},
   
   //Patente
   { data: null ,name:'plate', visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
       return data.name
        }},

    //Marca
   { data: null ,name:'brand', visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
    return data.description
     }},
   
    //Modelo
   { data: null ,name:'model', visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
    return data.price
     }},
   
    //Color
   { data: null ,name:'color', visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
    if(data.status == 1){
        data.status = "Activo";
    }else{
        data.status = "Inactivo";
    }
    return data.status
     }},

     //Fecha
   { data: null ,name:'date', visible:true ,targets:0, orderable:true, render: function ( data, type, row ) {
    return moment(data.created_at).format('DD/MM/YYYY')
     }},
   
   { data: null, targets:0, orderable:false,  render: function ( data, type, row ) {
       return `
      
       
       <span data-placement="top" data-toggle="tooltip" title="EDITAR" >
           <button type="button" class="btn btn-dark" onclick="ModalEditar(`+"'"+data.uuid+"'"+`);"><i class="fas fa-edit" aria-hidden="true"></i></button>
       </span>
   
       <span data-placement="top" data-toggle="tooltip" title="ELIMINAR" >
           <button type="button" class="btn btn-danger" onclick="ModalDelete(`+"'"+data.uuid+"'"+`);"><i class="fas fa-trash" aria-hidden="true"></i></button>
       </span>
                     `}
       
               },
           ],
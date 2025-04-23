columns: [

    //recibo ID
   { data: null , name : 'id' , visible:true  ,targets:0, orderable:true,  render: function ( data, type, row ) {
       return data.id
        }},
   

    

    //usuarios
    { data: null,targets:0, orderable:true,  render: function ( data, type, row ) {
        if(data.user != null){
            return data.user.name+" "+data.user.lastname
        }else{
            return "Sin Cliente"
        }
        }},
    

    //total
    { data: null,targets:0, orderable:true,  render: function ( data, type, row ) {
        if(data.total != null){
            return data.total
        }else{
            return ""
        }
        }},
        

        //status
        { data: null,targets:0, orderable:true,  render: function ( data, type, row ) {
            if(data.status == 1){
                //span valid
                return '<span class="badge badge-success">Valido</span>'
            }else{
                //pay_pending
                    return '<span class="badge badge-warning">Pendiente</span>'
            }
            }
        },


      
   { data: null, targets:0, orderable:false,  render: function ( data, type, row ) {
       return `
      

        {{-- edit --}}
        @permission('recibos-edit')
        <span data-placement="top" data-toggle="tooltip" title="Editar" >
            <a class="btn btn-primary" href="receipts/edit/`+data.uuid+` ">
                <i class="fas fa-edit" ></i></a>
            </span>
        @endpermission

        {{-- print --}}
        <span data-placement="top" data-toggle="tooltip" title="Imprimir" >
            <a class="btn btn-primary" href="receipts/print/`+data.id+` ">
                <i class="fas fa-print" ></i></a>
            </span>

        {{-- pdf --}}
        <span data-placement="top" data-toggle="tooltip" title="PDF" >
            <a class="btn btn-primary" href="receipts/pdf/`+data.uuid+` ">
                <i class="fas fa-file-pdf" ></i></a>
            </span>
        
        {{-- delete modal--}}
        @permission('recibos-delete')
        <span data-placement="top" data-toggle="tooltip" title="ELIMINAR" >
            <button type="button" class="btn btn-danger" onclick="ModalDelete(`+"'"+data.uuid+"'"+`);"><i class="fas fa-trash" aria-hidden="true"></i></button>
        </span>
        @endpermission
        

       
                   `}  
               },
 
   
   
           ],
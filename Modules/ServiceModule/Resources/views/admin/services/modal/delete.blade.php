
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
          <h4 class="modal-title">Confirmar Eliminacion del Servicio</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
             <p>Esta seguro que desea eliminar el servicio ?</p>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>

              {!! Form::open(['method' => 'DELETE', 'route' => ['admin.services.destroy']]) !!}
                
              {{-- almacenamos el id del vehiculo --}}
              <input type="text" name="uuid_delete" id="uuid_delete" hidden="" >

             <button type="submit" class="btn btn-danger">Eliminar</button>
               {!! Form::close() !!}
         </div>
     </div>
   </div>
 </div>

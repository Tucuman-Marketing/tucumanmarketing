
<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
          <h4 class="modal-title">Confirmar Cancelacion</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
             <p>Esta seguro que desea cancelar la suscripcion?</p>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>

              {!! Form::open(['method' => 'GET', 'route' => ['client.pays.paused']]) !!}

              {{-- almacenamos el id del usuario --}}
              <input type="text" name="uuid" id="uuid_cancel" hidden="" >

             <button type="submit" class="btn btn-danger">Continuar</button>
               {!! Form::close() !!}
         </div>
     </div>
   </div>
 </div>

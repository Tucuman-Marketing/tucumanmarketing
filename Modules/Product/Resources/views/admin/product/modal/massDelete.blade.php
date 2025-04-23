<div class="modal fade" id="massDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
          <h4 class="modal-title">Confirmar eliminacion</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
             <p>Esta seguro que desea eliminar todas los registros seleccionados?</p>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>

             <form id="deleteFormMass" action="{{ route('admin.product.massDestroy')}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                {{-- almacenamos el id--}}
                <input type="text" name="uuids[]" id="uuids_delete" hidden="" >
                <button type="submit" class="btn btn-danger">Eliminar</button>
             </form>
         </div>
     </div>
   </div>
 </div>

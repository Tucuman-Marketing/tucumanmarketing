<div class="modal fade" id="massDelete" tabindex="-1" aria-labelledby="exampleModalXlLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog ">
           <div class="modal-content">
               <div class="modal-header">
                   <h6 class="modal-title" id="createLabel">Confirmar eliminacion de los registros</h6>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>

            <form id="deleteFormMass"  method="POST">
                @csrf
                @method('DELETE')

                {{-- almacenamos el id a eliminar --}}
                <input type="hidden" name="_method" value="DELETE">
                {{-- almacenamos los id--}}
                <input type="text" name="uuids[]" id="uuids_delete" hidden="" >

                <div class="modal-body">
                        <p>Esta seguro que desea eliminar todas los registros seleccionados?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary label-btn btn-wave label-end waves-effect waves-light" data-bs-dismiss="modal">
                        Cerrar<i class="bi bi-x label-btn-icon ms-2"></i>
                    </button>
                    <button type="submit" class="btn btn-primary label-btn btn-wave label-end waves-effect waves-light">
                        Eliminar<i class="bi bi-check2 label-btn-icon ms-2"></i>
                    </button>
                </div>
            </form>

           </div>
       </div>
   </div>

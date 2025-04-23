<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalXlLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
           <div class="modal-content">
               <div class="modal-header">
                   <h6 class="modal-title" id="createLabel">Editar</h6>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>

               <form action="{{ route('admin.blogs.category.update')}}" method="POST" enctype="multipart/form-data" id="edit-form">
                @csrf
                @method('PUT')

                   <div class="modal-body">
                        <div id="content-edit"></div>
                   </div>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary label-btn btn-wave label-end waves-effect waves-light" data-bs-dismiss="modal">
                        Cerrar<i class="bi bi-x label-btn-icon ms-2"></i>
                       </button>
                       <button type="submit" class="btn btn-primary label-btn btn-wave label-end waves-effect waves-light">
                        Editar<i class="bi bi-check2 label-btn-icon ms-2"></i>
                       </button>
                   </div>

               </form>

           </div>
       </div>
   </div>



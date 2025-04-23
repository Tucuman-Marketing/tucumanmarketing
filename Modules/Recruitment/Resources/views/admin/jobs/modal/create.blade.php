<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalXlLabel"  aria-hidden="true">
 <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="createLabel">Crear</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.recruitment.jobs.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf

                <div class="modal-body">
                    @include('recruitment::admin.jobs.forms.create')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary label-btn btn-wave label-end waves-effect waves-light" data-bs-dismiss="modal">
                        Cerrar<i class="bi bi-x label-btn-icon ms-2"></i>
                    </button>
                    <button type="submit" class="btn btn-primary label-btn btn-wave label-end waves-effect waves-light">
                        Crear<i class="bi bi-check2 label-btn-icon ms-2"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>





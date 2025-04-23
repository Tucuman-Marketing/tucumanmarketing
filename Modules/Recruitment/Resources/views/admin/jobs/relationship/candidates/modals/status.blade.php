<div class="modal fade" id="modal-status" tabindex="-1" aria-labelledby="confirmDelete" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Editar Status</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.recruitment.jobs.candidatesByJob.changeStatus') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="modalId" name="id">

                <div class="modal-body">

                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="row d-flex">
                                <div class="form-group">
                                    <div id="modalStatus" class="">
                                        {{-- recorremos $status --}}
                                        @foreach ($statuses as $item)
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="status{{ $item->id }}" name="status_id"
                                                class="custom-control-input" value="{{ $item->id }}">
                                            <label class="custom-control-label" style="color: {{ $item->color }}"
                                                for="status{{ $item->id }}">{{ $item->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right" id="buttonCrear">Editar</button>
                    <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </form>
        </div>
    </div>
</div>
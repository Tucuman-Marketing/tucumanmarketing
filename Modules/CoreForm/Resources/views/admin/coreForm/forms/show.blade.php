
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Post
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="row">


                        <div class="col-md-12 mb-2">
                            <label for="title" class="form-label">Titulo</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required
                                id="title" name="title" value="{{ isset($data->title) ? $data->title : '' }}">
                                <div class="invalid-feedback">
                                    Please choose a Name.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="content" class="form-label">Contenido</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required
                                id="content" name="content" value="{{ isset($data->content) ? $data->content : '' }}">
                                <div class="invalid-feedback">
                                    Please choose a Name.
                                </div>
                            </div>
                        </div>




                    </div>
                </form>
            </div>
        </div>
    </div>

</div>




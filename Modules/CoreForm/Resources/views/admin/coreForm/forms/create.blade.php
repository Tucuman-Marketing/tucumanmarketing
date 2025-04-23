<div id="input_hidden">

</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Core Form
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label">Nombre</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required
                            id="name" name="name">
                            <div class="invalid-feedback">
                                Please choose a Name.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 mb-2">
                        <!-- Image Single -->
                        <input type="file" class="filepond_single" name="image_single" id="image_single" data-form-type="create" />
                        <p class="help-block">{{ $errors->first('image_single.*') }}</p>
                    </div>
                </div>


                <div class="col-md-12 mb-2">
                    <label for="name" class="form-label">Create</label>
                    <div class="form-group">
                        <textarea class="form-control" name="create" rows="15"></textarea>
                    </div>
                </div>


                <div class="col-md-12 mb-2">
                    <label for="name" class="form-label">Edit</label>
                    <div class="form-group">
                        <textarea class="form-control" name="edit" rows="15"></textarea>
                    </div>
                </div>

                <div class="col-md-12 mb-2">
                    <label for="name" class="form-label">CSS</label>
                    <div class="form-group">
                        <textarea class="form-control" name="css" rows="15"></textarea>
                    </div>
                </div>

                <div class="col-md-12 mb-2">
                    <label for="name" class="form-label">JS</label>
                    <div class="form-group">
                        <textarea class="form-control" name="js" rows="15"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

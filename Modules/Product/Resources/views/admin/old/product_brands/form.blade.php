
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($productBrands)->description) }}" maxlength="255">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('filename') ? 'has-error' : '' }}">
    <label for="filename" class="col-md-2 control-label">Filename</label>
    <div class="col-md-10">
        <input class="form-control" name="filename" type="text" id="filename" value="{{ old('filename', optional($productBrands)->filename) }}" maxlength="255" placeholder="Enter filename here...">
        {!! $errors->first('filename', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">Image</label>
    <div class="col-md-10">
        <input class="form-control" name="image" type="text" id="image" value="{{ old('image', optional($productBrands)->image) }}" min="0" max="255" placeholder="Enter image here...">
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_predefined') ? 'has-error' : '' }}">
    <label for="is_predefined" class="col-md-2 control-label">Is Predefined</label>
    <div class="col-md-10">
        <input class="form-control" name="is_predefined" type="text" id="is_predefined" value="{{ old('is_predefined', optional($productBrands)->is_predefined) }}">
        {!! $errors->first('is_predefined', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : '' }}">
    <label for="sort_order" class="col-md-2 control-label">Sort Order</label>
    <div class="col-md-10">
        <input class="form-control" name="sort_order" type="number" id="sort_order" value="{{ old('sort_order', optional($productBrands)->sort_order) }}" min="-2147483648" max="2147483647" placeholder="Enter sort order here...">
        {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productBrands)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>


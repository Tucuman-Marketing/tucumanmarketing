
<div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
    <label for="banner" class="col-md-2 control-label">Banner</label>
    <div class="col-md-10">
        <input class="form-control" name="banner" type="text" id="banner" value="{{ old('banner', optional($productCategories)->banner) }}" maxlength="255" placeholder="Enter banner here...">
        {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('banner_filename') ? 'has-error' : '' }}">
    <label for="banner_filename" class="col-md-2 control-label">Banner Filename</label>
    <div class="col-md-10">
        <input class="form-control" name="banner_filename" type="text" id="banner_filename" value="{{ old('banner_filename', optional($productCategories)->banner_filename) }}" maxlength="255" placeholder="Enter banner filename here...">
        {!! $errors->first('banner_filename', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
    <label for="icon" class="col-md-2 control-label">Icon</label>
    <div class="col-md-10">
        <input class="form-control" name="icon" type="text" id="icon" value="{{ old('icon', optional($productCategories)->icon) }}" maxlength="255" placeholder="Enter icon here...">
        {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('icon_filename') ? 'has-error' : '' }}">
    <label for="icon_filename" class="col-md-2 control-label">Icon Filename</label>
    <div class="col-md-10">
        <input class="form-control" name="icon_filename" type="text" id="icon_filename" value="{{ old('icon_filename', optional($productCategories)->icon_filename) }}" maxlength="255" placeholder="Enter icon filename here...">
        {!! $errors->first('icon_filename', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_predefined') ? 'has-error' : '' }}">
    <label for="is_predefined" class="col-md-2 control-label">Is Predefined</label>
    <div class="col-md-10">
        <input class="form-control" name="is_predefined" type="text" id="is_predefined" value="{{ old('is_predefined', optional($productCategories)->is_predefined) }}">
        {!! $errors->first('is_predefined', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($productCategories)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-2 control-label">Slug</label>
    <div class="col-md-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($productCategories)->slug) }}" maxlength="255" placeholder="Enter slug here...">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : '' }}">
    <label for="sort_order" class="col-md-2 control-label">Sort Order</label>
    <div class="col-md-10">
        <input class="form-control" name="sort_order" type="number" id="sort_order" value="{{ old('sort_order', optional($productCategories)->sort_order) }}" min="-2147483648" max="2147483647" placeholder="Enter sort order here...">
        {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productCategories)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>


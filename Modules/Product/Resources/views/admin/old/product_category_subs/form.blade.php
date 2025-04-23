
<div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
    <label for="icon" class="col-md-2 control-label">Icon</label>
    <div class="col-md-10">
        <input class="form-control" name="icon" type="text" id="icon" value="{{ old('icon', optional($productCategorySubs)->icon) }}" maxlength="255" placeholder="Enter icon here...">
        {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_predefined') ? 'has-error' : '' }}">
    <label for="is_predefined" class="col-md-2 control-label">Is Predefined</label>
    <div class="col-md-10">
        <input class="form-control" name="is_predefined" type="text" id="is_predefined" value="{{ old('is_predefined', optional($productCategorySubs)->is_predefined) }}">
        {!! $errors->first('is_predefined', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($productCategorySubs)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_category_id') ? 'has-error' : '' }}">
    <label for="product_category_id" class="col-md-2 control-label">Product Category</label>
    <div class="col-md-10">
        <select class="form-control" id="product_category_id" name="product_category_id">
        	    <option value="" style="display: none;" {{ old('product_category_id', optional($productCategorySubs)->product_category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product category</option>
        	@foreach ($ProductCategories as $key => $ProductCategory)
			    <option value="{{ $key }}" {{ old('product_category_id', optional($productCategorySubs)->product_category_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductCategory }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-2 control-label">Slug</label>
    <div class="col-md-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($productCategorySubs)->slug) }}" maxlength="255" placeholder="Enter slug here...">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : '' }}">
    <label for="sort_order" class="col-md-2 control-label">Sort Order</label>
    <div class="col-md-10">
        <input class="form-control" name="sort_order" type="number" id="sort_order" value="{{ old('sort_order', optional($productCategorySubs)->sort_order) }}" min="-2147483648" max="2147483647" placeholder="Enter sort order here...">
        {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productCategorySubs)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>


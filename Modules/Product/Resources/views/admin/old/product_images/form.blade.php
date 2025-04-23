
<div class="form-group {{ $errors->has('is_predefined') ? 'has-error' : '' }}">
    <label for="is_predefined" class="col-md-2 control-label">Is Predefined</label>
    <div class="col-md-10">
        <input class="form-control" name="is_predefined" type="text" id="is_predefined" value="{{ old('is_predefined', optional($productImages)->is_predefined) }}">
        {!! $errors->first('is_predefined', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($productImages)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('path') ? 'has-error' : '' }}">
    <label for="path" class="col-md-2 control-label">Path</label>
    <div class="col-md-10">
        <input class="form-control" name="path" type="text" id="path" value="{{ old('path', optional($productImages)->path) }}" maxlength="255" placeholder="Enter path here...">
        {!! $errors->first('path', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productImages)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($Products as $key => $Product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productImages)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $Product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
    <label for="size" class="col-md-2 control-label">Size</label>
    <div class="col-md-10">
        <input class="form-control" name="size" type="text" id="size" value="{{ old('size', optional($productImages)->size) }}" maxlength="255" placeholder="Enter size here...">
        {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : '' }}">
    <label for="sort_order" class="col-md-2 control-label">Sort Order</label>
    <div class="col-md-10">
        <input class="form-control" name="sort_order" type="number" id="sort_order" value="{{ old('sort_order', optional($productImages)->sort_order) }}" min="-2147483648" max="2147483647" placeholder="Enter sort order here...">
        {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productImages)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>


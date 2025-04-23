
<div class="form-group {{ $errors->has('bonus1') ? 'has-error' : '' }}">
    <label for="bonus1" class="col-md-2 control-label">Bonus1</label>
    <div class="col-md-10">
        <input class="form-control" name="bonus1" type="number" id="bonus1" value="{{ old('bonus1', optional($productCombos)->bonus1) }}" min="-9" max="9" placeholder="Enter bonus1 here...">
        {!! $errors->first('bonus1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
    <label for="code" class="col-md-2 control-label">Code</label>
    <div class="col-md-10">
        <input class="form-control" name="code" type="text" id="code" value="{{ old('code', optional($productCombos)->code) }}" maxlength="255" placeholder="Enter code here...">
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($productCombos)->description) }}" maxlength="255">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('enabled') ? 'has-error' : '' }}">
    <label for="enabled" class="col-md-2 control-label">Enabled</label>
    <div class="col-md-10">
        <input class="form-control" name="enabled" type="text" id="enabled" value="{{ old('enabled', optional($productCombos)->enabled) }}" maxlength="255" placeholder="Enter enabled here...">
        {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('filename') ? 'has-error' : '' }}">
    <label for="filename" class="col-md-2 control-label">Filename</label>
    <div class="col-md-10">
        <input class="form-control" name="filename" type="text" id="filename" value="{{ old('filename', optional($productCombos)->filename) }}" maxlength="255" placeholder="Enter filename here...">
        {!! $errors->first('filename', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hot') ? 'has-error' : '' }}">
    <label for="hot" class="col-md-2 control-label">Hot</label>
    <div class="col-md-10">
        <input class="form-control" name="hot" type="text" id="hot" value="{{ old('hot', optional($productCombos)->hot) }}" maxlength="255" placeholder="Enter hot here...">
        {!! $errors->first('hot', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image1') ? 'has-error' : '' }}">
    <label for="image1" class="col-md-2 control-label">Image1</label>
    <div class="col-md-10">
        <input class="form-control" name="image1" type="text" id="image1" value="{{ old('image1', optional($productCombos)->image1) }}" min="0" max="255" placeholder="Enter image1 here...">
        {!! $errors->first('image1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('long_description') ? 'has-error' : '' }}">
    <label for="long_description" class="col-md-2 control-label">Long Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="long_description" cols="50" rows="10" id="long_description" placeholder="Enter long description here...">{{ old('long_description', optional($productCombos)->long_description) }}</textarea>
        {!! $errors->first('long_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('offer') ? 'has-error' : '' }}">
    <label for="offer" class="col-md-2 control-label">Offer</label>
    <div class="col-md-10">
        <input class="form-control" name="offer" type="text" id="offer" value="{{ old('offer', optional($productCombos)->offer) }}" maxlength="255" placeholder="Enter offer here...">
        {!! $errors->first('offer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('points') ? 'has-error' : '' }}">
    <label for="points" class="col-md-2 control-label">Points</label>
    <div class="col-md-10">
        <input class="form-control" name="points" type="number" id="points" value="{{ old('points', optional($productCombos)->points) }}" min="-2147483648" max="2147483647" placeholder="Enter points here...">
        {!! $errors->first('points', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_category_id') ? 'has-error' : '' }}">
    <label for="product_category_id" class="col-md-2 control-label">Product Category</label>
    <div class="col-md-10">
        <select class="form-control" id="product_category_id" name="product_category_id">
        	    <option value="" style="display: none;" {{ old('product_category_id', optional($productCombos)->product_category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product category</option>
        	@foreach ($ProductCategories as $key => $ProductCategory)
			    <option value="{{ $key }}" {{ old('product_category_id', optional($productCombos)->product_category_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductCategory }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_category_sub_id') ? 'has-error' : '' }}">
    <label for="product_category_sub_id" class="col-md-2 control-label">Product Category Sub</label>
    <div class="col-md-10">
        <select class="form-control" id="product_category_sub_id" name="product_category_sub_id">
        	    <option value="" style="display: none;" {{ old('product_category_sub_id', optional($productCombos)->product_category_sub_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product category sub</option>
        	@foreach ($ProductCategorySubs as $key => $ProductCategorySub)
			    <option value="{{ $key }}" {{ old('product_category_sub_id', optional($productCombos)->product_category_sub_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductCategorySub }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_category_sub_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rating_cache') ? 'has-error' : '' }}">
    <label for="rating_cache" class="col-md-2 control-label">Rating Cache</label>
    <div class="col-md-10">
        <input class="form-control" name="rating_cache" type="number" id="rating_cache" value="{{ old('rating_cache', optional($productCombos)->rating_cache) }}" min="-9" max="9" placeholder="Enter rating cache here...">
        {!! $errors->first('rating_cache', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rating_count') ? 'has-error' : '' }}">
    <label for="rating_count" class="col-md-2 control-label">Rating Count</label>
    <div class="col-md-10">
        <input class="form-control" name="rating_count" type="number" id="rating_count" value="{{ old('rating_count', optional($productCombos)->rating_count) }}" min="-2147483648" max="2147483647" placeholder="Enter rating count here...">
        {!! $errors->first('rating_count', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
    <label for="short_description" class="col-md-2 control-label">Short Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="short_description" cols="50" rows="10" id="short_description" placeholder="Enter short description here...">{{ old('short_description', optional($productCombos)->short_description) }}</textarea>
        {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-2 control-label">Slug</label>
    <div class="col-md-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($productCombos)->slug) }}" maxlength="255" placeholder="Enter slug here...">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
    <label for="total" class="col-md-2 control-label">Total</label>
    <div class="col-md-10">
        <input class="form-control" name="total" type="number" id="total" value="{{ old('total', optional($productCombos)->total) }}" min="-9" max="9" placeholder="Enter total here...">
        {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productCombos)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>


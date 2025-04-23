
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productProductTags)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($Products as $key => $Product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productProductTags)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $Product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_tag_id') ? 'has-error' : '' }}">
    <label for="product_tag_id" class="col-md-2 control-label">Product Tag</label>
    <div class="col-md-10">
        <select class="form-control" id="product_tag_id" name="product_tag_id">
        	    <option value="" style="display: none;" {{ old('product_tag_id', optional($productProductTags)->product_tag_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product tag</option>
        	@foreach ($ProductTags as $key => $ProductTag)
			    <option value="{{ $key }}" {{ old('product_tag_id', optional($productProductTags)->product_tag_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductTag }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_tag_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productProductTags)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>


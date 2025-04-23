
<div class="form-group {{ $errors->has('product_combo_id') ? 'has-error' : '' }}">
    <label for="product_combo_id" class="col-md-2 control-label">Product Combo</label>
    <div class="col-md-10">
        <select class="form-control" id="product_combo_id" name="product_combo_id">
        	    <option value="" style="display: none;" {{ old('product_combo_id', optional($productComboProducts)->product_combo_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product combo</option>
        	@foreach ($productCombos as $key => $productCombo)
			    <option value="{{ $key }}" {{ old('product_combo_id', optional($productComboProducts)->product_combo_id) == $key ? 'selected' : '' }}>
			    	{{ $productCombo }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_combo_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productComboProducts)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($Products as $key => $Product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productComboProducts)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $Product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productComboProducts)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('discount') ? 'has-error' : '' }}">
    <label for="discount" class="col-md-2 control-label">Discount</label>
    <div class="col-md-10">
        <input class="form-control" name="discount" type="number" id="discount" value="{{ old('discount', optional($productOffers)->discount) }}" min="-9" max="9" placeholder="Enter discount here...">
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
    <label for="end_date" class="col-md-2 control-label">End Date</label>
    <div class="col-md-10">
        <input class="form-control" name="end_date" type="text" id="end_date" value="{{ old('end_date', optional($productOffers)->end_date) }}" placeholder="Enter end date here...">
        {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_predefined') ? 'has-error' : '' }}">
    <label for="is_predefined" class="col-md-2 control-label">Is Predefined</label>
    <div class="col-md-10">
        <input class="form-control" name="is_predefined" type="text" id="is_predefined" value="{{ old('is_predefined', optional($productOffers)->is_predefined) }}">
        {!! $errors->first('is_predefined', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productOffers)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($Products as $key => $Product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productOffers)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $Product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : '' }}">
    <label for="sort_order" class="col-md-2 control-label">Sort Order</label>
    <div class="col-md-10">
        <input class="form-control" name="sort_order" type="number" id="sort_order" value="{{ old('sort_order', optional($productOffers)->sort_order) }}" min="-2147483648" max="2147483647" placeholder="Enter sort order here...">
        {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
    <label for="start_date" class="col-md-2 control-label">Start Date</label>
    <div class="col-md-10">
        <input class="form-control" name="start_date" type="text" id="start_date" value="{{ old('start_date', optional($productOffers)->start_date) }}" placeholder="Enter start date here...">
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productOffers)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>


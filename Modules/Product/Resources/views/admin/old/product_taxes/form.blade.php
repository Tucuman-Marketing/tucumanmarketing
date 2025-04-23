
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($productTaxes)->description) }}" maxlength="255">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_predefined') ? 'has-error' : '' }}">
    <label for="is_predefined" class="col-md-2 control-label">Is Predefined</label>
    <div class="col-md-10">
        <input class="form-control" name="is_predefined" type="text" id="is_predefined" value="{{ old('is_predefined', optional($productTaxes)->is_predefined) }}">
        {!! $errors->first('is_predefined', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : '' }}">
    <label for="sort_order" class="col-md-2 control-label">Sort Order</label>
    <div class="col-md-10">
        <input class="form-control" name="sort_order" type="number" id="sort_order" value="{{ old('sort_order', optional($productTaxes)->sort_order) }}" min="-2147483648" max="2147483647" placeholder="Enter sort order here...">
        {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productTaxes)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
    <label for="value" class="col-md-2 control-label">Value</label>
    <div class="col-md-10">
        <input class="form-control" name="value" type="text" id="value" value="{{ old('value', optional($productTaxes)->value) }}" maxlength="255" placeholder="Enter value here...">
        {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
    </div>
</div>


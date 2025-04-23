
<div class="form-group {{ $errors->has('currency') ? 'has-error' : '' }}">
    <label for="currency" class="col-md-2 control-label">Currency</label>
    <div class="col-md-10">
        <input class="form-control" name="currency" type="text" id="currency" value="{{ old('currency', optional($productSettings)->currency) }}" maxlength="255" placeholder="Enter currency here...">
        {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sales_percentage') ? 'has-error' : '' }}">
    <label for="sales_percentage" class="col-md-2 control-label">Sales Percentage</label>
    <div class="col-md-10">
        <input class="form-control" name="sales_percentage" type="number" id="sales_percentage" value="{{ old('sales_percentage', optional($productSettings)->sales_percentage) }}" min="-9" max="9" placeholder="Enter sales percentage here...">
        {!! $errors->first('sales_percentage', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productSettings)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('bank') ? 'has-error' : '' }}">
    <label for="bank" class="col-md-2 control-label">Bank</label>
    <div class="col-md-10">
        <input class="form-control" name="bank" type="text" id="bank" value="{{ old('bank', optional($productDollars)->bank) }}" maxlength="255" placeholder="Enter bank here...">
        {!! $errors->first('bank', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dollar') ? 'has-error' : '' }}">
    <label for="dollar" class="col-md-2 control-label">Dollar</label>
    <div class="col-md-10">
        <input class="form-control" name="dollar" type="number" id="dollar" value="{{ old('dollar', optional($productDollars)->dollar) }}" min="-9" max="9" placeholder="Enter dollar here...">
        {!! $errors->first('dollar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productDollars)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>


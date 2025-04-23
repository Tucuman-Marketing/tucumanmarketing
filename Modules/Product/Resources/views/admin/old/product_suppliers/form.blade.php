
<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($productSuppliers)->address) }}" maxlength="255" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('business_name') ? 'has-error' : '' }}">
    <label for="business_name" class="col-md-2 control-label">Business Name</label>
    <div class="col-md-10">
        <input class="form-control" name="business_name" type="text" id="business_name" value="{{ old('business_name', optional($productSuppliers)->business_name) }}" maxlength="255" placeholder="Enter business name here...">
        {!! $errors->first('business_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
    <label for="contact" class="col-md-2 control-label">Contact</label>
    <div class="col-md-10">
        <input class="form-control" name="contact" type="text" id="contact" value="{{ old('contact', optional($productSuppliers)->contact) }}" maxlength="255" placeholder="Enter contact here...">
        {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($productSuppliers)->email) }}" maxlength="255" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('filename') ? 'has-error' : '' }}">
    <label for="filename" class="col-md-2 control-label">Filename</label>
    <div class="col-md-10">
        <input class="form-control" name="filename" type="text" id="filename" value="{{ old('filename', optional($productSuppliers)->filename) }}" maxlength="255" placeholder="Enter filename here...">
        {!! $errors->first('filename', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">Image</label>
    <div class="col-md-10">
        <input class="form-control" name="image" type="text" id="image" value="{{ old('image', optional($productSuppliers)->image) }}" min="0" max="255" placeholder="Enter image here...">
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_predefined') ? 'has-error' : '' }}">
    <label for="is_predefined" class="col-md-2 control-label">Is Predefined</label>
    <div class="col-md-10">
        <input class="form-control" name="is_predefined" type="text" id="is_predefined" value="{{ old('is_predefined', optional($productSuppliers)->is_predefined) }}">
        {!! $errors->first('is_predefined', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('observation') ? 'has-error' : '' }}">
    <label for="observation" class="col-md-2 control-label">Observation</label>
    <div class="col-md-10">
        <input class="form-control" name="observation" type="text" id="observation" value="{{ old('observation', optional($productSuppliers)->observation) }}" maxlength="255" placeholder="Enter observation here...">
        {!! $errors->first('observation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($productSuppliers)->phone) }}" maxlength="255" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('skype') ? 'has-error' : '' }}">
    <label for="skype" class="col-md-2 control-label">Skype</label>
    <div class="col-md-10">
        <input class="form-control" name="skype" type="text" id="skype" value="{{ old('skype', optional($productSuppliers)->skype) }}" maxlength="255" placeholder="Enter skype here...">
        {!! $errors->first('skype', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : '' }}">
    <label for="sort_order" class="col-md-2 control-label">Sort Order</label>
    <div class="col-md-10">
        <input class="form-control" name="sort_order" type="number" id="sort_order" value="{{ old('sort_order', optional($productSuppliers)->sort_order) }}" min="-2147483648" max="2147483647" placeholder="Enter sort order here...">
        {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($productSuppliers)->status) }}" maxlength="255" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tax_id') ? 'has-error' : '' }}">
    <label for="tax_id" class="col-md-2 control-label">Tax</label>
    <div class="col-md-10">
        <select class="form-control" id="tax_id" name="tax_id">
        	    <option value="" style="display: none;" {{ old('tax_id', optional($productSuppliers)->tax_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select tax</option>
        	@foreach ($taxes as $key => $tax)
			    <option value="{{ $key }}" {{ old('tax_id', optional($productSuppliers)->tax_id) == $key ? 'selected' : '' }}>
			    	{{ $tax }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('tax_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productSuppliers)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('visit_day') ? 'has-error' : '' }}">
    <label for="visit_day" class="col-md-2 control-label">Visit Day</label>
    <div class="col-md-10">
        <input class="form-control" name="visit_day" type="text" id="visit_day" value="{{ old('visit_day', optional($productSuppliers)->visit_day) }}" maxlength="255" placeholder="Enter visit day here...">
        {!! $errors->first('visit_day', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('approved') ? 'has-error' : '' }}">
    <label for="approved" class="col-md-2 control-label">Approved</label>
    <div class="col-md-10">
        <input class="form-control" name="approved" type="text" id="approved" value="{{ old('approved', optional($productReviews)->approved) }}" maxlength="255" placeholder="Enter approved here...">
        {!! $errors->first('approved', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
    <label for="comment" class="col-md-2 control-label">Comment</label>
    <div class="col-md-10">
        <input class="form-control" name="comment" type="text" id="comment" value="{{ old('comment', optional($productReviews)->comment) }}" maxlength="255" placeholder="Enter comment here...">
        {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productReviews)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($Products as $key => $Product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productReviews)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $Product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rating') ? 'has-error' : '' }}">
    <label for="rating" class="col-md-2 control-label">Rating</label>
    <div class="col-md-10">
        <input class="form-control" name="rating" type="number" id="rating" value="{{ old('rating', optional($productReviews)->rating) }}" min="-2147483648" max="2147483647" placeholder="Enter rating here...">
        {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('spam') ? 'has-error' : '' }}">
    <label for="spam" class="col-md-2 control-label">Spam</label>
    <div class="col-md-10">
        <input class="form-control" name="spam" type="text" id="spam" value="{{ old('spam', optional($productReviews)->spam) }}" maxlength="255" placeholder="Enter spam here...">
        {!! $errors->first('spam', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($productReviews)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($productReviews)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($productReviews)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>


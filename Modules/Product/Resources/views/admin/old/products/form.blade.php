
<div class="form-group {{ $errors->has('alert') ? 'has-error' : '' }}">
    <label for="alert" class="col-md-2 control-label">Alert</label>
    <div class="col-md-10">
        <input class="form-control" name="alert" type="text" id="alert" value="{{ old('alert', optional($products)->alert) }}" maxlength="255" placeholder="Enter alert here...">
        {!! $errors->first('alert', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('alternate_code') ? 'has-error' : '' }}">
    <label for="alternate_code" class="col-md-2 control-label">Alternate Code</label>
    <div class="col-md-10">
        <input class="form-control" name="alternate_code" type="text" id="alternate_code" value="{{ old('alternate_code', optional($products)->alternate_code) }}" maxlength="255" placeholder="Enter alternate code here...">
        {!! $errors->first('alternate_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bulk_code') ? 'has-error' : '' }}">
    <label for="bulk_code" class="col-md-2 control-label">Bulk Code</label>
    <div class="col-md-10">
        <input class="form-control" name="bulk_code" type="text" id="bulk_code" value="{{ old('bulk_code', optional($products)->bulk_code) }}" maxlength="255" placeholder="Enter bulk code here...">
        {!! $errors->first('bulk_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bulk_quantity') ? 'has-error' : '' }}">
    <label for="bulk_quantity" class="col-md-2 control-label">Bulk Quantity</label>
    <div class="col-md-10">
        <input class="form-control" name="bulk_quantity" type="number" id="bulk_quantity" value="{{ old('bulk_quantity', optional($products)->bulk_quantity) }}" min="-9" max="9" placeholder="Enter bulk quantity here...">
        {!! $errors->first('bulk_quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
    <label for="code" class="col-md-2 control-label">Code</label>
    <div class="col-md-10">
        <input class="form-control" name="code" type="text" id="code" value="{{ old('code', optional($products)->code) }}" maxlength="255" placeholder="Enter code here...">
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cost_price_pesos_ex_tax') ? 'has-error' : '' }}">
    <label for="cost_price_pesos_ex_tax" class="col-md-2 control-label">Cost Price Pesos Ex Tax</label>
    <div class="col-md-10">
        <input class="form-control" name="cost_price_pesos_ex_tax" type="number" id="cost_price_pesos_ex_tax" value="{{ old('cost_price_pesos_ex_tax', optional($products)->cost_price_pesos_ex_tax) }}" min="-9" max="9" placeholder="Enter cost price pesos ex tax here...">
        {!! $errors->first('cost_price_pesos_ex_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cost_price_pesos_in_tax') ? 'has-error' : '' }}">
    <label for="cost_price_pesos_in_tax" class="col-md-2 control-label">Cost Price Pesos In Tax</label>
    <div class="col-md-10">
        <input class="form-control" name="cost_price_pesos_in_tax" type="number" id="cost_price_pesos_in_tax" value="{{ old('cost_price_pesos_in_tax', optional($products)->cost_price_pesos_in_tax) }}" min="-9" max="9" placeholder="Enter cost price pesos in tax here...">
        {!! $errors->first('cost_price_pesos_in_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cost_price_usd_ex_tax') ? 'has-error' : '' }}">
    <label for="cost_price_usd_ex_tax" class="col-md-2 control-label">Cost Price Usd Ex Tax</label>
    <div class="col-md-10">
        <input class="form-control" name="cost_price_usd_ex_tax" type="number" id="cost_price_usd_ex_tax" value="{{ old('cost_price_usd_ex_tax', optional($products)->cost_price_usd_ex_tax) }}" min="-9" max="9" placeholder="Enter cost price usd ex tax here...">
        {!! $errors->first('cost_price_usd_ex_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cost_price_usd_in_tax') ? 'has-error' : '' }}">
    <label for="cost_price_usd_in_tax" class="col-md-2 control-label">Cost Price Usd In Tax</label>
    <div class="col-md-10">
        <input class="form-control" name="cost_price_usd_in_tax" type="number" id="cost_price_usd_in_tax" value="{{ old('cost_price_usd_in_tax', optional($products)->cost_price_usd_in_tax) }}" min="-9" max="9" placeholder="Enter cost price usd in tax here...">
        {!! $errors->first('cost_price_usd_in_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('critical_stock') ? 'has-error' : '' }}">
    <label for="critical_stock" class="col-md-2 control-label">Critical Stock</label>
    <div class="col-md-10">
        <input class="form-control" name="critical_stock" type="number" id="critical_stock" value="{{ old('critical_stock', optional($products)->critical_stock) }}" min="-9" max="9" placeholder="Enter critical stock here...">
        {!! $errors->first('critical_stock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('crossed_out_price_pesos') ? 'has-error' : '' }}">
    <label for="crossed_out_price_pesos" class="col-md-2 control-label">Crossed Out Price Pesos</label>
    <div class="col-md-10">
        <input class="form-control" name="crossed_out_price_pesos" type="number" id="crossed_out_price_pesos" value="{{ old('crossed_out_price_pesos', optional($products)->crossed_out_price_pesos) }}" min="-9" max="9" placeholder="Enter crossed out price pesos here...">
        {!! $errors->first('crossed_out_price_pesos', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('crossed_out_price_usd') ? 'has-error' : '' }}">
    <label for="crossed_out_price_usd" class="col-md-2 control-label">Crossed Out Price Usd</label>
    <div class="col-md-10">
        <input class="form-control" name="crossed_out_price_usd" type="number" id="crossed_out_price_usd" value="{{ old('crossed_out_price_usd', optional($products)->crossed_out_price_usd) }}" min="-9" max="9" placeholder="Enter crossed out price usd here...">
        {!! $errors->first('crossed_out_price_usd', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('current_stock') ? 'has-error' : '' }}">
    <label for="current_stock" class="col-md-2 control-label">Current Stock</label>
    <div class="col-md-10">
        <input class="form-control" name="current_stock" type="number" id="current_stock" value="{{ old('current_stock', optional($products)->current_stock) }}" min="-9" max="9" placeholder="Enter current stock here...">
        {!! $errors->first('current_stock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($products)->description) }}" maxlength="255">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discount') ? 'has-error' : '' }}">
    <label for="discount" class="col-md-2 control-label">Discount</label>
    <div class="col-md-10">
        <input class="form-control" name="discount" type="number" id="discount" value="{{ old('discount', optional($products)->discount) }}" min="-9" max="9" placeholder="Enter discount here...">
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('enabled') ? 'has-error' : '' }}">
    <label for="enabled" class="col-md-2 control-label">Enabled</label>
    <div class="col-md-10">
        <input class="form-control" name="enabled" type="text" id="enabled" value="{{ old('enabled', optional($products)->enabled) }}" maxlength="255" placeholder="Enter enabled here...">
        {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('enabled_add_to_cart') ? 'has-error' : '' }}">
    <label for="enabled_add_to_cart" class="col-md-2 control-label">Enabled Add To Cart</label>
    <div class="col-md-10">
        <input class="form-control" name="enabled_add_to_cart" type="text" id="enabled_add_to_cart" value="{{ old('enabled_add_to_cart', optional($products)->enabled_add_to_cart) }}" maxlength="255" placeholder="Enter enabled add to cart here...">
        {!! $errors->first('enabled_add_to_cart', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('filename') ? 'has-error' : '' }}">
    <label for="filename" class="col-md-2 control-label">Filename</label>
    <div class="col-md-10">
        <input class="form-control" name="filename" type="text" id="filename" value="{{ old('filename', optional($products)->filename) }}" maxlength="255" placeholder="Enter filename here...">
        {!! $errors->first('filename', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hot') ? 'has-error' : '' }}">
    <label for="hot" class="col-md-2 control-label">Hot</label>
    <div class="col-md-10">
        <input class="form-control" name="hot" type="text" id="hot" value="{{ old('hot', optional($products)->hot) }}" maxlength="255" placeholder="Enter hot here...">
        {!! $errors->first('hot', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">Image</label>
    <div class="col-md-10">
        <input class="form-control" name="image" type="text" id="image" value="{{ old('image', optional($products)->image) }}" min="0" max="255" placeholder="Enter image here...">
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_predefined') ? 'has-error' : '' }}">
    <label for="is_predefined" class="col-md-2 control-label">Is Predefined</label>
    <div class="col-md-10">
        <input class="form-control" name="is_predefined" type="text" id="is_predefined" value="{{ old('is_predefined', optional($products)->is_predefined) }}">
        {!! $errors->first('is_predefined', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
    <label for="location" class="col-md-2 control-label">Location</label>
    <div class="col-md-10">
        <input class="form-control" name="location" type="text" id="location" value="{{ old('location', optional($products)->location) }}" maxlength="255" placeholder="Enter location here...">
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('long_description') ? 'has-error' : '' }}">
    <label for="long_description" class="col-md-2 control-label">Long Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="long_description" cols="50" rows="10" id="long_description" placeholder="Enter long description here...">{{ old('long_description', optional($products)->long_description) }}</textarea>
        {!! $errors->first('long_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('observations') ? 'has-error' : '' }}">
    <label for="observations" class="col-md-2 control-label">Observations</label>
    <div class="col-md-10">
        <input class="form-control" name="observations" type="text" id="observations" value="{{ old('observations', optional($products)->observations) }}" maxlength="255" placeholder="Enter observations here...">
        {!! $errors->first('observations', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('offer') ? 'has-error' : '' }}">
    <label for="offer" class="col-md-2 control-label">Offer</label>
    <div class="col-md-10">
        <input class="form-control" name="offer" type="text" id="offer" value="{{ old('offer', optional($products)->offer) }}" maxlength="255" placeholder="Enter offer here...">
        {!! $errors->first('offer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ordered_stock') ? 'has-error' : '' }}">
    <label for="ordered_stock" class="col-md-2 control-label">Ordered Stock</label>
    <div class="col-md-10">
        <input class="form-control" name="ordered_stock" type="number" id="ordered_stock" value="{{ old('ordered_stock', optional($products)->ordered_stock) }}" min="-9" max="9" placeholder="Enter ordered stock here...">
        {!! $errors->first('ordered_stock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('points') ? 'has-error' : '' }}">
    <label for="points" class="col-md-2 control-label">Points</label>
    <div class="col-md-10">
        <input class="form-control" name="points" type="number" id="points" value="{{ old('points', optional($products)->points) }}" min="-2147483648" max="2147483647" placeholder="Enter points here...">
        {!! $errors->first('points', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price2') ? 'has-error' : '' }}">
    <label for="price2" class="col-md-2 control-label">Price2</label>
    <div class="col-md-10">
        <input class="form-control" name="price2" type="number" id="price2" value="{{ old('price2', optional($products)->price2) }}" min="-9" max="9" placeholder="Enter price2 here...">
        {!! $errors->first('price2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price3') ? 'has-error' : '' }}">
    <label for="price3" class="col-md-2 control-label">Price3</label>
    <div class="col-md-10">
        <input class="form-control" name="price3" type="number" id="price3" value="{{ old('price3', optional($products)->price3) }}" min="-9" max="9" placeholder="Enter price3 here...">
        {!! $errors->first('price3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_brand_id') ? 'has-error' : '' }}">
    <label for="product_brand_id" class="col-md-2 control-label">Product Brand</label>
    <div class="col-md-10">
        <select class="form-control" id="product_brand_id" name="product_brand_id">
        	    <option value="" style="display: none;" {{ old('product_brand_id', optional($products)->product_brand_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product brand</option>
        	@foreach ($ProductBrands as $key => $ProductBrand)
			    <option value="{{ $key }}" {{ old('product_brand_id', optional($products)->product_brand_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductBrand }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_brand_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_category_id') ? 'has-error' : '' }}">
    <label for="product_category_id" class="col-md-2 control-label">Product Category</label>
    <div class="col-md-10">
        <select class="form-control" id="product_category_id" name="product_category_id">
        	    <option value="" style="display: none;" {{ old('product_category_id', optional($products)->product_category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product category</option>
        	@foreach ($ProductCategories as $key => $ProductCategory)
			    <option value="{{ $key }}" {{ old('product_category_id', optional($products)->product_category_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductCategory }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_combo_id') ? 'has-error' : '' }}">
    <label for="product_combo_id" class="col-md-2 control-label">Product Combo</label>
    <div class="col-md-10">
        <select class="form-control" id="product_combo_id" name="product_combo_id">
        	    <option value="" style="display: none;" {{ old('product_combo_id', optional($products)->product_combo_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product combo</option>
        	@foreach ($productCombos as $key => $productCombo)
			    <option value="{{ $key }}" {{ old('product_combo_id', optional($products)->product_combo_id) == $key ? 'selected' : '' }}>
			    	{{ $productCombo }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_combo_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_sub_category_id') ? 'has-error' : '' }}">
    <label for="product_sub_category_id" class="col-md-2 control-label">Product Sub Category</label>
    <div class="col-md-10">
        <select class="form-control" id="product_sub_category_id" name="product_sub_category_id">
        	    <option value="" style="display: none;" {{ old('product_sub_category_id', optional($products)->product_sub_category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product sub category</option>
        	@foreach ($ProductCategorySubs as $key => $ProductCategorySub)
			    <option value="{{ $key }}" {{ old('product_sub_category_id', optional($products)->product_sub_category_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductCategorySub }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_sub_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_supplier_id') ? 'has-error' : '' }}">
    <label for="product_supplier_id" class="col-md-2 control-label">Product Supplier</label>
    <div class="col-md-10">
        <select class="form-control" id="product_supplier_id" name="product_supplier_id">
        	    <option value="" style="display: none;" {{ old('product_supplier_id', optional($products)->product_supplier_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product supplier</option>
        	@foreach ($ProductSuppliers as $key => $ProductSupplier)
			    <option value="{{ $key }}" {{ old('product_supplier_id', optional($products)->product_supplier_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductSupplier }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_supplier_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_unit_of_measure_id') ? 'has-error' : '' }}">
    <label for="product_unit_of_measure_id" class="col-md-2 control-label">Product Unit Of Measure</label>
    <div class="col-md-10">
        <select class="form-control" id="product_unit_of_measure_id" name="product_unit_of_measure_id">
        	    <option value="" style="display: none;" {{ old('product_unit_of_measure_id', optional($products)->product_unit_of_measure_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product unit of measure</option>
        	@foreach ($ProductUnitsOfMeasures as $key => $ProductUnitsOfMeasure)
			    <option value="{{ $key }}" {{ old('product_unit_of_measure_id', optional($products)->product_unit_of_measure_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductUnitsOfMeasure }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_unit_of_measure_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profitability') ? 'has-error' : '' }}">
    <label for="profitability" class="col-md-2 control-label">Profitability</label>
    <div class="col-md-10">
        <input class="form-control" name="profitability" type="number" id="profitability" value="{{ old('profitability', optional($products)->profitability) }}" min="-9" max="9" placeholder="Enter profitability here...">
        {!! $errors->first('profitability', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profitability2') ? 'has-error' : '' }}">
    <label for="profitability2" class="col-md-2 control-label">Profitability2</label>
    <div class="col-md-10">
        <input class="form-control" name="profitability2" type="number" id="profitability2" value="{{ old('profitability2', optional($products)->profitability2) }}" min="-9" max="9" placeholder="Enter profitability2 here...">
        {!! $errors->first('profitability2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('profitability3') ? 'has-error' : '' }}">
    <label for="profitability3" class="col-md-2 control-label">Profitability3</label>
    <div class="col-md-10">
        <input class="form-control" name="profitability3" type="number" id="profitability3" value="{{ old('profitability3', optional($products)->profitability3) }}" min="-9" max="9" placeholder="Enter profitability3 here...">
        {!! $errors->first('profitability3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rating_cache') ? 'has-error' : '' }}">
    <label for="rating_cache" class="col-md-2 control-label">Rating Cache</label>
    <div class="col-md-10">
        <input class="form-control" name="rating_cache" type="number" id="rating_cache" value="{{ old('rating_cache', optional($products)->rating_cache) }}" min="-9" max="9" placeholder="Enter rating cache here...">
        {!! $errors->first('rating_cache', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rating_count') ? 'has-error' : '' }}">
    <label for="rating_count" class="col-md-2 control-label">Rating Count</label>
    <div class="col-md-10">
        <input class="form-control" name="rating_count" type="number" id="rating_count" value="{{ old('rating_count', optional($products)->rating_count) }}" min="-2147483648" max="2147483647" placeholder="Enter rating count here...">
        {!! $errors->first('rating_count', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sale_price_pesos_ex_tax') ? 'has-error' : '' }}">
    <label for="sale_price_pesos_ex_tax" class="col-md-2 control-label">Sale Price Pesos Ex Tax</label>
    <div class="col-md-10">
        <input class="form-control" name="sale_price_pesos_ex_tax" type="number" id="sale_price_pesos_ex_tax" value="{{ old('sale_price_pesos_ex_tax', optional($products)->sale_price_pesos_ex_tax) }}" min="-9" max="9" placeholder="Enter sale price pesos ex tax here...">
        {!! $errors->first('sale_price_pesos_ex_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sale_price_pesos_in_tax') ? 'has-error' : '' }}">
    <label for="sale_price_pesos_in_tax" class="col-md-2 control-label">Sale Price Pesos In Tax</label>
    <div class="col-md-10">
        <input class="form-control" name="sale_price_pesos_in_tax" type="number" id="sale_price_pesos_in_tax" value="{{ old('sale_price_pesos_in_tax', optional($products)->sale_price_pesos_in_tax) }}" min="-9" max="9" placeholder="Enter sale price pesos in tax here...">
        {!! $errors->first('sale_price_pesos_in_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sale_price_usd_ex_tax') ? 'has-error' : '' }}">
    <label for="sale_price_usd_ex_tax" class="col-md-2 control-label">Sale Price Usd Ex Tax</label>
    <div class="col-md-10">
        <input class="form-control" name="sale_price_usd_ex_tax" type="number" id="sale_price_usd_ex_tax" value="{{ old('sale_price_usd_ex_tax', optional($products)->sale_price_usd_ex_tax) }}" min="-9" max="9" placeholder="Enter sale price usd ex tax here...">
        {!! $errors->first('sale_price_usd_ex_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sale_price_usd_in_tax') ? 'has-error' : '' }}">
    <label for="sale_price_usd_in_tax" class="col-md-2 control-label">Sale Price Usd In Tax</label>
    <div class="col-md-10">
        <input class="form-control" name="sale_price_usd_in_tax" type="number" id="sale_price_usd_in_tax" value="{{ old('sale_price_usd_in_tax', optional($products)->sale_price_usd_in_tax) }}" min="-9" max="9" placeholder="Enter sale price usd in tax here...">
        {!! $errors->first('sale_price_usd_in_tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
    <label for="short_description" class="col-md-2 control-label">Short Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="short_description" cols="50" rows="10" id="short_description" placeholder="Enter short description here...">{{ old('short_description', optional($products)->short_description) }}</textarea>
        {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-2 control-label">Slug</label>
    <div class="col-md-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($products)->slug) }}" maxlength="255" placeholder="Enter slug here...">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : '' }}">
    <label for="sort_order" class="col-md-2 control-label">Sort Order</label>
    <div class="col-md-10">
        <input class="form-control" name="sort_order" type="number" id="sort_order" value="{{ old('sort_order', optional($products)->sort_order) }}" min="-2147483648" max="2147483647" placeholder="Enter sort order here...">
        {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tax') ? 'has-error' : '' }}">
    <label for="tax" class="col-md-2 control-label">Tax</label>
    <div class="col-md-10">
        <input class="form-control" name="tax" type="number" id="tax" value="{{ old('tax', optional($products)->tax) }}" min="-2147483648" max="2147483647" placeholder="Enter tax here...">
        {!! $errors->first('tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tax_id') ? 'has-error' : '' }}">
    <label for="tax_id" class="col-md-2 control-label">Tax</label>
    <div class="col-md-10">
        <select class="form-control" id="tax_id" name="tax_id">
        	    <option value="" style="display: none;" {{ old('tax_id', optional($products)->tax_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select tax</option>
        	@foreach ($ProductTaxes as $key => $ProductTax)
			    <option value="{{ $key }}" {{ old('tax_id', optional($products)->tax_id) == $key ? 'selected' : '' }}>
			    	{{ $ProductTax }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('tax_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
    <label for="thumbnail" class="col-md-2 control-label">Thumbnail</label>
    <div class="col-md-10">
        <input class="form-control" name="thumbnail" type="text" id="thumbnail" value="{{ old('thumbnail', optional($products)->thumbnail) }}" maxlength="255" placeholder="Enter thumbnail here...">
        {!! $errors->first('thumbnail', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('thumbnail_filename') ? 'has-error' : '' }}">
    <label for="thumbnail_filename" class="col-md-2 control-label">Thumbnail Filename</label>
    <div class="col-md-10">
        <input class="form-control" name="thumbnail_filename" type="text" id="thumbnail_filename" value="{{ old('thumbnail_filename', optional($products)->thumbnail_filename) }}" maxlength="255" placeholder="Enter thumbnail filename here...">
        {!! $errors->first('thumbnail_filename', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('use_profitability') ? 'has-error' : '' }}">
    <label for="use_profitability" class="col-md-2 control-label">Use Profitability</label>
    <div class="col-md-10">
        <input class="form-control" name="use_profitability" type="text" id="use_profitability" value="{{ old('use_profitability', optional($products)->use_profitability) }}" maxlength="255" placeholder="Enter use profitability here...">
        {!! $errors->first('use_profitability', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('uuid') ? 'has-error' : '' }}">
    <label for="uuid" class="col-md-2 control-label">Uuid</label>
    <div class="col-md-10">
        <input class="form-control" name="uuid" type="text" id="uuid" value="{{ old('uuid', optional($products)->uuid) }}" maxlength="255" placeholder="Enter uuid here...">
        {!! $errors->first('uuid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('warranty') ? 'has-error' : '' }}">
    <label for="warranty" class="col-md-2 control-label">Warranty</label>
    <div class="col-md-10">
        <input class="form-control" name="warranty" type="text" id="warranty" value="{{ old('warranty', optional($products)->warranty) }}" maxlength="255" placeholder="Enter warranty here...">
        {!! $errors->first('warranty', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Products' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('products.products.destroy', $products->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('products.products.index') }}" class="btn btn-primary" title="Show All Products">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('products.products.create') }}" class="btn btn-success" title="Create New Products">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('products.products.edit', $products->id ) }}" class="btn btn-primary" title="Edit Products">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Products" onclick="return confirm(&quot;Click Ok to delete Products.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Alert</dt>
            <dd>{{ $products->alert }}</dd>
            <dt>Alternate Code</dt>
            <dd>{{ $products->alternate_code }}</dd>
            <dt>Bulk Code</dt>
            <dd>{{ $products->bulk_code }}</dd>
            <dt>Bulk Quantity</dt>
            <dd>{{ $products->bulk_quantity }}</dd>
            <dt>Code</dt>
            <dd>{{ $products->code }}</dd>
            <dt>Cost Price Pesos Ex Tax</dt>
            <dd>{{ $products->cost_price_pesos_ex_tax }}</dd>
            <dt>Cost Price Pesos In Tax</dt>
            <dd>{{ $products->cost_price_pesos_in_tax }}</dd>
            <dt>Cost Price Usd Ex Tax</dt>
            <dd>{{ $products->cost_price_usd_ex_tax }}</dd>
            <dt>Cost Price Usd In Tax</dt>
            <dd>{{ $products->cost_price_usd_in_tax }}</dd>
            <dt>Created At</dt>
            <dd>{{ $products->created_at }}</dd>
            <dt>Critical Stock</dt>
            <dd>{{ $products->critical_stock }}</dd>
            <dt>Crossed Out Price Pesos</dt>
            <dd>{{ $products->crossed_out_price_pesos }}</dd>
            <dt>Crossed Out Price Usd</dt>
            <dd>{{ $products->crossed_out_price_usd }}</dd>
            <dt>Current Stock</dt>
            <dd>{{ $products->current_stock }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $products->deleted_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $products->description }}</dd>
            <dt>Discount</dt>
            <dd>{{ $products->discount }}</dd>
            <dt>Enabled</dt>
            <dd>{{ $products->enabled }}</dd>
            <dt>Enabled Add To Cart</dt>
            <dd>{{ $products->enabled_add_to_cart }}</dd>
            <dt>Filename</dt>
            <dd>{{ $products->filename }}</dd>
            <dt>Hot</dt>
            <dd>{{ $products->hot }}</dd>
            <dt>Image</dt>
            <dd>{{ $products->image }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $products->is_predefined }}</dd>
            <dt>Location</dt>
            <dd>{{ $products->location }}</dd>
            <dt>Long Description</dt>
            <dd>{{ $products->long_description }}</dd>
            <dt>Observations</dt>
            <dd>{{ $products->observations }}</dd>
            <dt>Offer</dt>
            <dd>{{ $products->offer }}</dd>
            <dt>Ordered Stock</dt>
            <dd>{{ $products->ordered_stock }}</dd>
            <dt>Points</dt>
            <dd>{{ $products->points }}</dd>
            <dt>Price2</dt>
            <dd>{{ $products->price2 }}</dd>
            <dt>Price3</dt>
            <dd>{{ $products->price3 }}</dd>
            <dt>Product Brand</dt>
            <dd>{{ optional($products->ProductBrand)->created_at }}</dd>
            <dt>Product Category</dt>
            <dd>{{ optional($products->ProductCategory)->name }}</dd>
            <dt>Product Combo</dt>
            <dd>{{ optional($products->productCombo)->bonus1 }}</dd>
            <dt>Product Sub Category</dt>
            <dd>{{ optional($products->ProductCategorySub)->name }}</dd>
            <dt>Product Supplier</dt>
            <dd>{{ optional($products->ProductSupplier)->address }}</dd>
            <dt>Product Unit Of Measure</dt>
            <dd>{{ optional($products->ProductUnitsOfMeasure)->name }}</dd>
            <dt>Profitability</dt>
            <dd>{{ $products->profitability }}</dd>
            <dt>Profitability2</dt>
            <dd>{{ $products->profitability2 }}</dd>
            <dt>Profitability3</dt>
            <dd>{{ $products->profitability3 }}</dd>
            <dt>Rating Cache</dt>
            <dd>{{ $products->rating_cache }}</dd>
            <dt>Rating Count</dt>
            <dd>{{ $products->rating_count }}</dd>
            <dt>Sale Price Pesos Ex Tax</dt>
            <dd>{{ $products->sale_price_pesos_ex_tax }}</dd>
            <dt>Sale Price Pesos In Tax</dt>
            <dd>{{ $products->sale_price_pesos_in_tax }}</dd>
            <dt>Sale Price Usd Ex Tax</dt>
            <dd>{{ $products->sale_price_usd_ex_tax }}</dd>
            <dt>Sale Price Usd In Tax</dt>
            <dd>{{ $products->sale_price_usd_in_tax }}</dd>
            <dt>Short Description</dt>
            <dd>{{ $products->short_description }}</dd>
            <dt>Slug</dt>
            <dd>{{ $products->slug }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $products->sort_order }}</dd>
            <dt>Tax</dt>
            <dd>{{ $products->tax }}</dd>
            <dt>Tax</dt>
            <dd>{{ optional($products->ProductTax)->created_at }}</dd>
            <dt>Thumbnail</dt>
            <dd>{{ $products->thumbnail }}</dd>
            <dt>Thumbnail Filename</dt>
            <dd>{{ $products->thumbnail_filename }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $products->updated_at }}</dd>
            <dt>Use Profitability</dt>
            <dd>{{ $products->use_profitability }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $products->uuid }}</dd>
            <dt>Warranty</dt>
            <dd>{{ $products->warranty }}</dd>

        </dl>

    </div>
</div>

@endsection
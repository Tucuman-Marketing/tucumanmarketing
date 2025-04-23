@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Combos' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_combos.product_combos.destroy', $productCombos->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_combos.product_combos.index') }}" class="btn btn-primary" title="Show All Product Combos">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_combos.product_combos.create') }}" class="btn btn-success" title="Create New Product Combos">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_combos.product_combos.edit', $productCombos->id ) }}" class="btn btn-primary" title="Edit Product Combos">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Combos" onclick="return confirm(&quot;Click Ok to delete Product Combos.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Bonus1</dt>
            <dd>{{ $productCombos->bonus1 }}</dd>
            <dt>Code</dt>
            <dd>{{ $productCombos->code }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productCombos->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productCombos->deleted_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $productCombos->description }}</dd>
            <dt>Enabled</dt>
            <dd>{{ $productCombos->enabled }}</dd>
            <dt>Filename</dt>
            <dd>{{ $productCombos->filename }}</dd>
            <dt>Hot</dt>
            <dd>{{ $productCombos->hot }}</dd>
            <dt>Image1</dt>
            <dd>{{ $productCombos->image1 }}</dd>
            <dt>Long Description</dt>
            <dd>{{ $productCombos->long_description }}</dd>
            <dt>Offer</dt>
            <dd>{{ $productCombos->offer }}</dd>
            <dt>Points</dt>
            <dd>{{ $productCombos->points }}</dd>
            <dt>Product Category</dt>
            <dd>{{ optional($productCombos->ProductCategory)->name }}</dd>
            <dt>Product Category Sub</dt>
            <dd>{{ optional($productCombos->ProductCategorySub)->name }}</dd>
            <dt>Rating Cache</dt>
            <dd>{{ $productCombos->rating_cache }}</dd>
            <dt>Rating Count</dt>
            <dd>{{ $productCombos->rating_count }}</dd>
            <dt>Short Description</dt>
            <dd>{{ $productCombos->short_description }}</dd>
            <dt>Slug</dt>
            <dd>{{ $productCombos->slug }}</dd>
            <dt>Total</dt>
            <dd>{{ $productCombos->total }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productCombos->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productCombos->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Brands' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_brands.product_brands.destroy', $productBrands->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_brands.product_brands.index') }}" class="btn btn-primary" title="Show All Product Brands">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_brands.product_brands.create') }}" class="btn btn-success" title="Create New Product Brands">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_brands.product_brands.edit', $productBrands->id ) }}" class="btn btn-primary" title="Edit Product Brands">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Brands" onclick="return confirm(&quot;Click Ok to delete Product Brands.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Created At</dt>
            <dd>{{ $productBrands->created_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $productBrands->description }}</dd>
            <dt>Filename</dt>
            <dd>{{ $productBrands->filename }}</dd>
            <dt>Image</dt>
            <dd>{{ $productBrands->image }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $productBrands->is_predefined }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $productBrands->sort_order }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productBrands->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productBrands->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
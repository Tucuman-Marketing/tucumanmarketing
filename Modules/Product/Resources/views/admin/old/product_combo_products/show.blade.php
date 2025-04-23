@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Combo Products' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_combo_products.product_combo_products.destroy', $productComboProducts->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_combo_products.product_combo_products.index') }}" class="btn btn-primary" title="Show All Product Combo Products">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_combo_products.product_combo_products.create') }}" class="btn btn-success" title="Create New Product Combo Products">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_combo_products.product_combo_products.edit', $productComboProducts->id ) }}" class="btn btn-primary" title="Edit Product Combo Products">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Combo Products" onclick="return confirm(&quot;Click Ok to delete Product Combo Products.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Created At</dt>
            <dd>{{ $productComboProducts->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productComboProducts->deleted_at }}</dd>
            <dt>Product Combo</dt>
            <dd>{{ optional($productComboProducts->productCombo)->id }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($productComboProducts->Product)->id }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productComboProducts->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productComboProducts->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
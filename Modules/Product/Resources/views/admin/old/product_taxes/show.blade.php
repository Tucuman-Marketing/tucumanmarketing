@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Taxes' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_taxes.product_taxes.destroy', $productTaxes->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_taxes.product_taxes.index') }}" class="btn btn-primary" title="Show All Product Taxes">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_taxes.product_taxes.create') }}" class="btn btn-success" title="Create New Product Taxes">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_taxes.product_taxes.edit', $productTaxes->id ) }}" class="btn btn-primary" title="Edit Product Taxes">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Taxes" onclick="return confirm(&quot;Click Ok to delete Product Taxes.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Created At</dt>
            <dd>{{ $productTaxes->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productTaxes->deleted_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $productTaxes->description }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $productTaxes->is_predefined }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $productTaxes->sort_order }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productTaxes->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productTaxes->uuid }}</dd>
            <dt>Value</dt>
            <dd>{{ $productTaxes->value }}</dd>

        </dl>

    </div>
</div>

@endsection
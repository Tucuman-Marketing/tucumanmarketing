@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($productImages->name) ? $productImages->name : 'Product Images' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_images.product_images.destroy', $productImages->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_images.product_images.index') }}" class="btn btn-primary" title="Show All Product Images">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_images.product_images.create') }}" class="btn btn-success" title="Create New Product Images">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_images.product_images.edit', $productImages->id ) }}" class="btn btn-primary" title="Edit Product Images">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Images" onclick="return confirm(&quot;Click Ok to delete Product Images.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Created At</dt>
            <dd>{{ $productImages->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productImages->deleted_at }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $productImages->is_predefined }}</dd>
            <dt>Name</dt>
            <dd>{{ $productImages->name }}</dd>
            <dt>Path</dt>
            <dd>{{ $productImages->path }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($productImages->Product)->id }}</dd>
            <dt>Size</dt>
            <dd>{{ $productImages->size }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $productImages->sort_order }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productImages->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productImages->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
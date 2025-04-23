@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Product Tags' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_product_tags.product_product_tags.destroy', $productProductTags->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_product_tags.product_product_tags.index') }}" class="btn btn-primary" title="Show All Product Product Tags">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_product_tags.product_product_tags.create') }}" class="btn btn-success" title="Create New Product Product Tags">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_product_tags.product_product_tags.edit', $productProductTags->id ) }}" class="btn btn-primary" title="Edit Product Product Tags">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Product Tags" onclick="return confirm(&quot;Click Ok to delete Product Product Tags.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Created At</dt>
            <dd>{{ $productProductTags->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productProductTags->deleted_at }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($productProductTags->Product)->id }}</dd>
            <dt>Product Tag</dt>
            <dd>{{ optional($productProductTags->ProductTag)->id }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productProductTags->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productProductTags->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($productTags->name) ? $productTags->name : 'Product Tags' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_tags.product_tags.destroy', $productTags->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_tags.product_tags.index') }}" class="btn btn-primary" title="Show All Product Tags">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_tags.product_tags.create') }}" class="btn btn-success" title="Create New Product Tags">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_tags.product_tags.edit', $productTags->id ) }}" class="btn btn-primary" title="Edit Product Tags">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Tags" onclick="return confirm(&quot;Click Ok to delete Product Tags.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Created At</dt>
            <dd>{{ $productTags->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productTags->deleted_at }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $productTags->is_predefined }}</dd>
            <dt>Name</dt>
            <dd>{{ $productTags->name }}</dd>
            <dt>Slug</dt>
            <dd>{{ $productTags->slug }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $productTags->sort_order }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productTags->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productTags->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($productCategorySubs->name) ? $productCategorySubs->name : 'Product Category Subs' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_category_subs.product_category_subs.destroy', $productCategorySubs->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_category_subs.product_category_subs.index') }}" class="btn btn-primary" title="Show All Product Category Subs">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_category_subs.product_category_subs.create') }}" class="btn btn-success" title="Create New Product Category Subs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_category_subs.product_category_subs.edit', $productCategorySubs->id ) }}" class="btn btn-primary" title="Edit Product Category Subs">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Category Subs" onclick="return confirm(&quot;Click Ok to delete Product Category Subs.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Created At</dt>
            <dd>{{ $productCategorySubs->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productCategorySubs->deleted_at }}</dd>
            <dt>Icon</dt>
            <dd>{{ $productCategorySubs->icon }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $productCategorySubs->is_predefined }}</dd>
            <dt>Name</dt>
            <dd>{{ $productCategorySubs->name }}</dd>
            <dt>Product Category</dt>
            <dd>{{ optional($productCategorySubs->ProductCategory)->name }}</dd>
            <dt>Slug</dt>
            <dd>{{ $productCategorySubs->slug }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $productCategorySubs->sort_order }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productCategorySubs->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productCategorySubs->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($productCategories->name) ? $productCategories->name : 'Product Categories' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_categories.product_categories.destroy', $productCategories->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_categories.product_categories.index') }}" class="btn btn-primary" title="Show All Product Categories">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_categories.product_categories.create') }}" class="btn btn-success" title="Create New Product Categories">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_categories.product_categories.edit', $productCategories->id ) }}" class="btn btn-primary" title="Edit Product Categories">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Categories" onclick="return confirm(&quot;Click Ok to delete Product Categories.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Banner</dt>
            <dd>{{ $productCategories->banner }}</dd>
            <dt>Banner Filename</dt>
            <dd>{{ $productCategories->banner_filename }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productCategories->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productCategories->deleted_at }}</dd>
            <dt>Icon</dt>
            <dd>{{ $productCategories->icon }}</dd>
            <dt>Icon Filename</dt>
            <dd>{{ $productCategories->icon_filename }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $productCategories->is_predefined }}</dd>
            <dt>Name</dt>
            <dd>{{ $productCategories->name }}</dd>
            <dt>Slug</dt>
            <dd>{{ $productCategories->slug }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $productCategories->sort_order }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productCategories->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productCategories->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
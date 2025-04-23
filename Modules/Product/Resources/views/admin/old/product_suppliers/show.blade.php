@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Suppliers' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_suppliers.product_suppliers.destroy', $productSuppliers->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_suppliers.product_suppliers.index') }}" class="btn btn-primary" title="Show All Product Suppliers">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_suppliers.product_suppliers.create') }}" class="btn btn-success" title="Create New Product Suppliers">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_suppliers.product_suppliers.edit', $productSuppliers->id ) }}" class="btn btn-primary" title="Edit Product Suppliers">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Suppliers" onclick="return confirm(&quot;Click Ok to delete Product Suppliers.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Address</dt>
            <dd>{{ $productSuppliers->address }}</dd>
            <dt>Business Name</dt>
            <dd>{{ $productSuppliers->business_name }}</dd>
            <dt>Contact</dt>
            <dd>{{ $productSuppliers->contact }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productSuppliers->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productSuppliers->deleted_at }}</dd>
            <dt>Email</dt>
            <dd>{{ $productSuppliers->email }}</dd>
            <dt>Filename</dt>
            <dd>{{ $productSuppliers->filename }}</dd>
            <dt>Image</dt>
            <dd>{{ $productSuppliers->image }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $productSuppliers->is_predefined }}</dd>
            <dt>Observation</dt>
            <dd>{{ $productSuppliers->observation }}</dd>
            <dt>Phone</dt>
            <dd>{{ $productSuppliers->phone }}</dd>
            <dt>Skype</dt>
            <dd>{{ $productSuppliers->skype }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $productSuppliers->sort_order }}</dd>
            <dt>Status</dt>
            <dd>{{ $productSuppliers->status }}</dd>
            <dt>Tax</dt>
            <dd>{{ optional($productSuppliers->tax)->id }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productSuppliers->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productSuppliers->uuid }}</dd>
            <dt>Visit Day</dt>
            <dd>{{ $productSuppliers->visit_day }}</dd>

        </dl>

    </div>
</div>

@endsection
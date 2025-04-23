@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Offers' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_offers.product_offers.destroy', $productOffers->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_offers.product_offers.index') }}" class="btn btn-primary" title="Show All Product Offers">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_offers.product_offers.create') }}" class="btn btn-success" title="Create New Product Offers">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_offers.product_offers.edit', $productOffers->id ) }}" class="btn btn-primary" title="Edit Product Offers">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Offers" onclick="return confirm(&quot;Click Ok to delete Product Offers.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Created At</dt>
            <dd>{{ $productOffers->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productOffers->deleted_at }}</dd>
            <dt>Discount</dt>
            <dd>{{ $productOffers->discount }}</dd>
            <dt>End Date</dt>
            <dd>{{ $productOffers->end_date }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $productOffers->is_predefined }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($productOffers->Product)->id }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $productOffers->sort_order }}</dd>
            <dt>Start Date</dt>
            <dd>{{ $productOffers->start_date }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productOffers->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productOffers->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
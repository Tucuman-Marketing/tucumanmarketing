@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Reviews' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_reviews.product_reviews.destroy', $productReviews->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_reviews.product_reviews.index') }}" class="btn btn-primary" title="Show All Product Reviews">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_reviews.product_reviews.create') }}" class="btn btn-success" title="Create New Product Reviews">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_reviews.product_reviews.edit', $productReviews->id ) }}" class="btn btn-primary" title="Edit Product Reviews">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Reviews" onclick="return confirm(&quot;Click Ok to delete Product Reviews.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Approved</dt>
            <dd>{{ $productReviews->approved }}</dd>
            <dt>Comment</dt>
            <dd>{{ $productReviews->comment }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productReviews->created_at }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($productReviews->Product)->id }}</dd>
            <dt>Rating</dt>
            <dd>{{ $productReviews->rating }}</dd>
            <dt>Spam</dt>
            <dd>{{ $productReviews->spam }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productReviews->updated_at }}</dd>
            <dt>User</dt>
            <dd>{{ optional($productReviews->user)->name }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productReviews->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
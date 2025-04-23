@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Settings' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_settings.product_settings.destroy', $productSettings->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_settings.product_settings.index') }}" class="btn btn-primary" title="Show All Product Settings">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_settings.product_settings.create') }}" class="btn btn-success" title="Create New Product Settings">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_settings.product_settings.edit', $productSettings->id ) }}" class="btn btn-primary" title="Edit Product Settings">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Settings" onclick="return confirm(&quot;Click Ok to delete Product Settings.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Created At</dt>
            <dd>{{ $productSettings->created_at }}</dd>
            <dt>Currency</dt>
            <dd>{{ $productSettings->currency }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productSettings->deleted_at }}</dd>
            <dt>Sales Percentage</dt>
            <dd>{{ $productSettings->sales_percentage }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productSettings->updated_at }}</dd>
            <dt>Uuid</dt>
            <dd>{{ $productSettings->uuid }}</dd>

        </dl>

    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($productUnitsOfMeasure->name) ? $productUnitsOfMeasure->name : 'Product Units Of Measure' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_units_of_measures.product_units_of_measure.destroy', $productUnitsOfMeasure->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_units_of_measures.product_units_of_measure.index') }}" class="btn btn-primary" title="Show All Product Units Of Measure">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_units_of_measures.product_units_of_measure.create') }}" class="btn btn-success" title="Create New Product Units Of Measure">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_units_of_measures.product_units_of_measure.edit', $productUnitsOfMeasure->id ) }}" class="btn btn-primary" title="Edit Product Units Of Measure">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Units Of Measure" onclick="return confirm(&quot;Click Ok to delete Product Units Of Measure.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Abbreviation</dt>
            <dd>{{ $productUnitsOfMeasure->abbreviation }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productUnitsOfMeasure->created_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $productUnitsOfMeasure->deleted_at }}</dd>
            <dt>Is Predefined</dt>
            <dd>{{ $productUnitsOfMeasure->is_predefined }}</dd>
            <dt>Name</dt>
            <dd>{{ $productUnitsOfMeasure->name }}</dd>
            <dt>Sort Order</dt>
            <dd>{{ $productUnitsOfMeasure->sort_order }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productUnitsOfMeasure->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
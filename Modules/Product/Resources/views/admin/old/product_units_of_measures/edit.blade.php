@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($productUnitsOfMeasure->name) ? $productUnitsOfMeasure->name : 'Product Units Of Measure' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('product_units_of_measures.product_units_of_measure.index') }}" class="btn btn-primary" title="Show All Product Units Of Measure">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('product_units_of_measures.product_units_of_measure.create') }}" class="btn btn-success" title="Create New Product Units Of Measure">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('product_units_of_measures.product_units_of_measure.update', $productUnitsOfMeasure->id) }}" id="edit_product_units_of_measure_form" name="edit_product_units_of_measure_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('product_units_of_measures.form', [
                                        'productUnitsOfMeasure' => $productUnitsOfMeasure,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
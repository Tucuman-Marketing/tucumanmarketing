@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Product Taxes</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_taxes.product_taxes.create') }}" class="btn btn-success" title="Create New Product Taxes">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productTaxesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Taxes Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Is Predefined</th>
                            <th>Sort Order</th>
                            <th>Uuid</th>
                            <th>Value</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productTaxesObjects as $productTaxes)
                        <tr>
                            <td>{{ $productTaxes->is_predefined }}</td>
                            <td>{{ $productTaxes->sort_order }}</td>
                            <td>{{ $productTaxes->uuid }}</td>
                            <td>{{ $productTaxes->value }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_taxes.product_taxes.destroy', $productTaxes->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_taxes.product_taxes.show', $productTaxes->id ) }}" class="btn btn-info" title="Show Product Taxes">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_taxes.product_taxes.edit', $productTaxes->id ) }}" class="btn btn-primary" title="Edit Product Taxes">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Taxes" onclick="return confirm(&quot;Click Ok to delete Product Taxes.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $productTaxesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
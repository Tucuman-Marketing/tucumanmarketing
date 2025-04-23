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
                <h4 class="mt-5 mb-5">Product Brands</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_brands.product_brands.create') }}" class="btn btn-success" title="Create New Product Brands">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productBrandsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Brands Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Filename</th>
                            <th>Image</th>
                            <th>Is Predefined</th>
                            <th>Sort Order</th>
                            <th>Uuid</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productBrandsObjects as $productBrands)
                        <tr>
                            <td>{{ $productBrands->filename }}</td>
                            <td>{{ $productBrands->image }}</td>
                            <td>{{ $productBrands->is_predefined }}</td>
                            <td>{{ $productBrands->sort_order }}</td>
                            <td>{{ $productBrands->uuid }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_brands.product_brands.destroy', $productBrands->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_brands.product_brands.show', $productBrands->id ) }}" class="btn btn-info" title="Show Product Brands">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_brands.product_brands.edit', $productBrands->id ) }}" class="btn btn-primary" title="Edit Product Brands">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Brands" onclick="return confirm(&quot;Click Ok to delete Product Brands.&quot;)">
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
            {!! $productBrandsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
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
                <h4 class="mt-5 mb-5">Product Combo Products</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_combo_products.product_combo_products.create') }}" class="btn btn-success" title="Create New Product Combo Products">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productComboProductsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Combo Products Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Product Combo</th>
                            <th>Product</th>
                            <th>Uuid</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productComboProductsObjects as $productComboProducts)
                        <tr>
                            <td>{{ optional($productComboProducts->productCombo)->id }}</td>
                            <td>{{ optional($productComboProducts->Product)->id }}</td>
                            <td>{{ $productComboProducts->uuid }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_combo_products.product_combo_products.destroy', $productComboProducts->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_combo_products.product_combo_products.show', $productComboProducts->id ) }}" class="btn btn-info" title="Show Product Combo Products">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_combo_products.product_combo_products.edit', $productComboProducts->id ) }}" class="btn btn-primary" title="Edit Product Combo Products">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Combo Products" onclick="return confirm(&quot;Click Ok to delete Product Combo Products.&quot;)">
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
            {!! $productComboProductsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
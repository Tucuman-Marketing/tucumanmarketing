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
                <h4 class="mt-5 mb-5">Products</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('products.products.create') }}" class="btn btn-success" title="Create New Products">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Products Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Alert</th>
                            <th>Alternate Code</th>
                            <th>Bulk Code</th>
                            <th>Bulk Quantity</th>
                            <th>Code</th>
                            <th>Cost Price Pesos Ex Tax</th>
                            <th>Cost Price Pesos In Tax</th>
                            <th>Cost Price Usd Ex Tax</th>
                            <th>Cost Price Usd In Tax</th>
                            <th>Critical Stock</th>
                            <th>Crossed Out Price Pesos</th>
                            <th>Crossed Out Price Usd</th>
                            <th>Current Stock</th>
                            <th>Discount</th>
                            <th>Enabled</th>
                            <th>Enabled Add To Cart</th>
                            <th>Filename</th>
                            <th>Hot</th>
                            <th>Image</th>
                            <th>Is Predefined</th>
                            <th>Location</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productsObjects as $products)
                        <tr>
                            <td>{{ $products->alert }}</td>
                            <td>{{ $products->alternate_code }}</td>
                            <td>{{ $products->bulk_code }}</td>
                            <td>{{ $products->bulk_quantity }}</td>
                            <td>{{ $products->code }}</td>
                            <td>{{ $products->cost_price_pesos_ex_tax }}</td>
                            <td>{{ $products->cost_price_pesos_in_tax }}</td>
                            <td>{{ $products->cost_price_usd_ex_tax }}</td>
                            <td>{{ $products->cost_price_usd_in_tax }}</td>
                            <td>{{ $products->critical_stock }}</td>
                            <td>{{ $products->crossed_out_price_pesos }}</td>
                            <td>{{ $products->crossed_out_price_usd }}</td>
                            <td>{{ $products->current_stock }}</td>
                            <td>{{ $products->discount }}</td>
                            <td>{{ $products->enabled }}</td>
                            <td>{{ $products->enabled_add_to_cart }}</td>
                            <td>{{ $products->filename }}</td>
                            <td>{{ $products->hot }}</td>
                            <td>{{ $products->image }}</td>
                            <td>{{ $products->is_predefined }}</td>
                            <td>{{ $products->location }}</td>

                            <td>

                                <form method="POST" action="{!! route('products.products.destroy', $products->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('products.products.show', $products->id ) }}" class="btn btn-info" title="Show Products">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('products.products.edit', $products->id ) }}" class="btn btn-primary" title="Edit Products">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Products" onclick="return confirm(&quot;Click Ok to delete Products.&quot;)">
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
            {!! $productsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
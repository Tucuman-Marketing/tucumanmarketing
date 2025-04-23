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
                <h4 class="mt-5 mb-5">Product Offers</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_offers.product_offers.create') }}" class="btn btn-success" title="Create New Product Offers">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productOffersObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Offers Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Discount</th>
                            <th>End Date</th>
                            <th>Is Predefined</th>
                            <th>Product</th>
                            <th>Sort Order</th>
                            <th>Start Date</th>
                            <th>Uuid</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productOffersObjects as $productOffers)
                        <tr>
                            <td>{{ $productOffers->discount }}</td>
                            <td>{{ $productOffers->end_date }}</td>
                            <td>{{ $productOffers->is_predefined }}</td>
                            <td>{{ optional($productOffers->Product)->id }}</td>
                            <td>{{ $productOffers->sort_order }}</td>
                            <td>{{ $productOffers->start_date }}</td>
                            <td>{{ $productOffers->uuid }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_offers.product_offers.destroy', $productOffers->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_offers.product_offers.show', $productOffers->id ) }}" class="btn btn-info" title="Show Product Offers">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_offers.product_offers.edit', $productOffers->id ) }}" class="btn btn-primary" title="Edit Product Offers">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Offers" onclick="return confirm(&quot;Click Ok to delete Product Offers.&quot;)">
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
            {!! $productOffersObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
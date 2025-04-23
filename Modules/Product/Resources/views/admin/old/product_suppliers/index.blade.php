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
                <h4 class="mt-5 mb-5">Product Suppliers</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_suppliers.product_suppliers.create') }}" class="btn btn-success" title="Create New Product Suppliers">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productSuppliersObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Suppliers Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Business Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Filename</th>
                            <th>Image</th>
                            <th>Is Predefined</th>
                            <th>Observation</th>
                            <th>Phone</th>
                            <th>Skype</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Tax</th>
                            <th>Uuid</th>
                            <th>Visit Day</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productSuppliersObjects as $productSuppliers)
                        <tr>
                            <td>{{ $productSuppliers->address }}</td>
                            <td>{{ $productSuppliers->business_name }}</td>
                            <td>{{ $productSuppliers->contact }}</td>
                            <td>{{ $productSuppliers->email }}</td>
                            <td>{{ $productSuppliers->filename }}</td>
                            <td>{{ $productSuppliers->image }}</td>
                            <td>{{ $productSuppliers->is_predefined }}</td>
                            <td>{{ $productSuppliers->observation }}</td>
                            <td>{{ $productSuppliers->phone }}</td>
                            <td>{{ $productSuppliers->skype }}</td>
                            <td>{{ $productSuppliers->sort_order }}</td>
                            <td>{{ $productSuppliers->status }}</td>
                            <td>{{ optional($productSuppliers->tax)->id }}</td>
                            <td>{{ $productSuppliers->uuid }}</td>
                            <td>{{ $productSuppliers->visit_day }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_suppliers.product_suppliers.destroy', $productSuppliers->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_suppliers.product_suppliers.show', $productSuppliers->id ) }}" class="btn btn-info" title="Show Product Suppliers">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_suppliers.product_suppliers.edit', $productSuppliers->id ) }}" class="btn btn-primary" title="Edit Product Suppliers">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Suppliers" onclick="return confirm(&quot;Click Ok to delete Product Suppliers.&quot;)">
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
            {!! $productSuppliersObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
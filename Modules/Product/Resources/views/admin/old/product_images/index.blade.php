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
                <h4 class="mt-5 mb-5">Product Images</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_images.product_images.create') }}" class="btn btn-success" title="Create New Product Images">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productImagesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Images Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Is Predefined</th>
                            <th>Name</th>
                            <th>Path</th>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Sort Order</th>
                            <th>Uuid</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productImagesObjects as $productImages)
                        <tr>
                            <td>{{ $productImages->is_predefined }}</td>
                            <td>{{ $productImages->name }}</td>
                            <td>{{ $productImages->path }}</td>
                            <td>{{ optional($productImages->Product)->id }}</td>
                            <td>{{ $productImages->size }}</td>
                            <td>{{ $productImages->sort_order }}</td>
                            <td>{{ $productImages->uuid }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_images.product_images.destroy', $productImages->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_images.product_images.show', $productImages->id ) }}" class="btn btn-info" title="Show Product Images">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_images.product_images.edit', $productImages->id ) }}" class="btn btn-primary" title="Edit Product Images">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Images" onclick="return confirm(&quot;Click Ok to delete Product Images.&quot;)">
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
            {!! $productImagesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
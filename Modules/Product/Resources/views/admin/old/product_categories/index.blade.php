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
                <h4 class="mt-5 mb-5">Product Categories</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_categories.product_categories.create') }}" class="btn btn-success" title="Create New Product Categories">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productCategoriesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Categories Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Banner</th>
                            <th>Banner Filename</th>
                            <th>Icon</th>
                            <th>Icon Filename</th>
                            <th>Is Predefined</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Sort Order</th>
                            <th>Uuid</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productCategoriesObjects as $productCategories)
                        <tr>
                            <td>{{ $productCategories->banner }}</td>
                            <td>{{ $productCategories->banner_filename }}</td>
                            <td>{{ $productCategories->icon }}</td>
                            <td>{{ $productCategories->icon_filename }}</td>
                            <td>{{ $productCategories->is_predefined }}</td>
                            <td>{{ $productCategories->name }}</td>
                            <td>{{ $productCategories->slug }}</td>
                            <td>{{ $productCategories->sort_order }}</td>
                            <td>{{ $productCategories->uuid }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_categories.product_categories.destroy', $productCategories->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_categories.product_categories.show', $productCategories->id ) }}" class="btn btn-info" title="Show Product Categories">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_categories.product_categories.edit', $productCategories->id ) }}" class="btn btn-primary" title="Edit Product Categories">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Categories" onclick="return confirm(&quot;Click Ok to delete Product Categories.&quot;)">
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
            {!! $productCategoriesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
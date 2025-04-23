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
                <h4 class="mt-5 mb-5">Product Category Subs</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_category_subs.product_category_subs.create') }}" class="btn btn-success" title="Create New Product Category Subs">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productCategorySubsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Category Subs Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Is Predefined</th>
                            <th>Name</th>
                            <th>Product Category</th>
                            <th>Slug</th>
                            <th>Sort Order</th>
                            <th>Uuid</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productCategorySubsObjects as $productCategorySubs)
                        <tr>
                            <td>{{ $productCategorySubs->icon }}</td>
                            <td>{{ $productCategorySubs->is_predefined }}</td>
                            <td>{{ $productCategorySubs->name }}</td>
                            <td>{{ optional($productCategorySubs->ProductCategory)->name }}</td>
                            <td>{{ $productCategorySubs->slug }}</td>
                            <td>{{ $productCategorySubs->sort_order }}</td>
                            <td>{{ $productCategorySubs->uuid }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_category_subs.product_category_subs.destroy', $productCategorySubs->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_category_subs.product_category_subs.show', $productCategorySubs->id ) }}" class="btn btn-info" title="Show Product Category Subs">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_category_subs.product_category_subs.edit', $productCategorySubs->id ) }}" class="btn btn-primary" title="Edit Product Category Subs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Category Subs" onclick="return confirm(&quot;Click Ok to delete Product Category Subs.&quot;)">
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
            {!! $productCategorySubsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
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
                <h4 class="mt-5 mb-5">Product Tags</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_tags.product_tags.create') }}" class="btn btn-success" title="Create New Product Tags">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productTagsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Tags Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Is Predefined</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Sort Order</th>
                            <th>Uuid</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productTagsObjects as $productTags)
                        <tr>
                            <td>{{ $productTags->is_predefined }}</td>
                            <td>{{ $productTags->name }}</td>
                            <td>{{ $productTags->slug }}</td>
                            <td>{{ $productTags->sort_order }}</td>
                            <td>{{ $productTags->uuid }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_tags.product_tags.destroy', $productTags->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_tags.product_tags.show', $productTags->id ) }}" class="btn btn-info" title="Show Product Tags">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_tags.product_tags.edit', $productTags->id ) }}" class="btn btn-primary" title="Edit Product Tags">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Tags" onclick="return confirm(&quot;Click Ok to delete Product Tags.&quot;)">
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
            {!! $productTagsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
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
                <h4 class="mt-5 mb-5">Product Settings</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_settings.product_settings.create') }}" class="btn btn-success" title="Create New Product Settings">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productSettingsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Product Settings Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Currency</th>
                            <th>Sales Percentage</th>
                            <th>Uuid</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productSettingsObjects as $productSettings)
                        <tr>
                            <td>{{ $productSettings->currency }}</td>
                            <td>{{ $productSettings->sales_percentage }}</td>
                            <td>{{ $productSettings->uuid }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_settings.product_settings.destroy', $productSettings->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_settings.product_settings.show', $productSettings->id ) }}" class="btn btn-info" title="Show Product Settings">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_settings.product_settings.edit', $productSettings->id ) }}" class="btn btn-primary" title="Edit Product Settings">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Settings" onclick="return confirm(&quot;Click Ok to delete Product Settings.&quot;)">
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
            {!! $productSettingsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
@extends('layouts.admin')

@section('title') {{ trans('admin.menu_list.oauth') }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('admin.menu_list.oauth_grant') }}
            <small>{{ trans('page.total', ['total'=> $total = $lists->total()]) }}</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            {{ trans('admin.menu_list.oauth_grant_list') }}
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th class="visible-lg">#</th>
                                <th>{{ trans('common.oauth_grant_id') }}</th>
                                <th>{{ trans('admin.created_at') }}</th>
                                <th>{{ trans('admin.updated_at') }}</th>
                            </tr>
                            @if ($lists->total() > 0)
                                @foreach($lists as $key => $list)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->created_at }}</td>
                                    <td>{{ $list->updated_at }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center">{{ trans('common.empty') }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-left">
                            <li><a href="#"> {{ $lists->currentPage() }} / {{ $lists->lastPage() ?: 1 }}</a></li>
                        </ul>
                        @if ($lists->lastPage() > 1)
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="{{ $lists->url(1) }}">{{ trans('common.page.first') }}</a></li>
                            <li><a href="{{ $lists->previousPageUrl() }}">{{ trans('common.page.prev') }}</a></li>
                            <li><a href="{{ $lists->nextPageUrl() }}">{{ trans('common.page.next') }}</a></li>
                            <li><a href="{{ $lists->url($lists->lastPage()) }}">{{ trans('common.page.last') }}</a></li>
                        </ul>
                        @endif
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection

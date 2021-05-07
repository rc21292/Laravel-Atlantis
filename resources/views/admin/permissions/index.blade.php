@extends('layouts.admin')
@section('title','Permissions List')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Permissions</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{route('admin.home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">User Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.permissions.index')}}">Permissions</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Permissions
                            <a href="{{route('admin.permissions.create')}}" class="btn btn-default float-right">
                                {{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-success">
                            <thead>
                                <tr>
                                    <th col="scope">
                                        {{ trans('cruds.permission.fields.id') }}
                                    </th>

                                    <th col="scope">
                                        {{ trans('cruds.permission.fields.title') }}
                                    </th>

                                    <th col="scope">
                                        {{ trans('global.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $key => $permission)
                                <tr>
                                    <td> {{ $permission->id ?? '' }}</td>
                                    <td> {{ $permission->name ?? '' }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-warning" href="{{ route('admin.permissions.show', $permission->id) }}">
                                            {{ trans('global.view') }}
                                        </a>

                                        <a class="btn btn-xs btn-info" href="{{ route('admin.permissions.edit', $permission->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>

                                        <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">

                                            <input type="hidden" name="_method" value="DELETE">

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
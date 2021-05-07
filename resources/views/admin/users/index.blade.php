@extends('layouts.admin')
@section('title','Users List')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Users</h4>
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
                    <a href="{{route('admin.users.index')}}">Users</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Users
                            <a href="{{route('admin.users.create')}}" class="btn btn-default float-right">
                                {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-success">
                            <thead>
                                <tr>
                                    <th col="scope">
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>

                                    <th col="scope">
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>

                                    <th col="scope">
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>

                                    <th col="scope">
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>

                                    <th col="scope">
                                        {{ trans('global.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td> {{ $user->id ?? '' }}</td>
                                    <td> {{ $user->name ?? '' }}</td>
                                    <td> {{ $user->email ?? '' }}</td>
                                    <td>  
                                        @foreach($user->roles()->pluck('name') as $role)
                                        <span class="btn btn-secondary btn-sm">
                                            {{ $role }}
                                        </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-warning" href="{{ route('admin.users.show', $user->id) }}">
                                            {{ trans('global.view') }}
                                        </a>

                                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>

                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">

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
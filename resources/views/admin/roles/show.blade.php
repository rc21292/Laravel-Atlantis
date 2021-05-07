@extends('layouts.admin')
@section('title','Show Role')
@section('content')
<div class="content">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">{{ trans('global.show') }} {{ trans('cruds.role.title_singular') }}</h4>
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
          <a href="{{route('admin.roles.index')}}">Roles</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.permissions.show', $role->id)}}">{{ trans('global.show') }} {{ trans('cruds.role.title_singular') }}</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.role.title') }}
          </div>

          <div class="card-body">
            <div class="mb-2">
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <th>
                      {{ trans('cruds.role.fields.id') }}
                    </th>
                    <td>
                      {{ $role->id }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      {{ trans('cruds.role.fields.title') }}
                    </th>
                    <td>
                      {{ $role->name }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      Permissions
                    </th>
                    <td>
                      @foreach($role->permissions()->pluck('name') as $permission)
                      <span class="label label-info label-many">{{ $permission }}</span>
                      @endforeach
                    </td>
                  </tr>
                </tbody>
              </table>
              <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
              </a>
            </div>

            <nav class="mb-3">
              <div class="nav nav-tabs">

              </div>
            </nav>
            <div class="tab-content">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
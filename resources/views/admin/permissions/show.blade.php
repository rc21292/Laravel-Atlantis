@extends('layouts.admin')
@section('title','Show Permission')
@section('content')
<div class="content">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">{{ trans('global.show') }} {{ trans('cruds.permission.title_singular') }}</h4>
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
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.permissions.show', $permission->id)}}">{{ trans('global.show') }} {{ trans('cruds.permission.title_singular') }}</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.permission.title') }}
          </div>
          <div class="card-body">
            <div class="mb-2">
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <th>
                      {{ trans('cruds.permission.fields.id') }}
                    </th>
                    <td>
                      {{ $permission->id }}
                    </td>
                  </tr>
                  <tr>
                    <th>
                      {{ trans('cruds.permission.fields.title') }}
                    </th>
                    <td>
                      {{ $permission->name }}
                    </td>
                  </tr>
                </tbody>
              </table>
              <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
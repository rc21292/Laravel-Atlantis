@extends('layouts.admin')
@section('title','Create Permission')
@section('content')
<div class="content">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">{{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}</h4>
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
          <a href="{{route('admin.permissions.create')}}">{{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              {{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <form action="{{ route('admin.permissions.update', [$permission->id]) }}" method="POST" enctype="multipart/form-data" id="permission-form">
                  @csrf
                  @method('PUT')
                  <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                    <label for="name">{{ trans('cruds.permission.fields.title') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}">
                    @if($errors->has('name'))
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                    @endif
                    <p class="helper-block">
                      {{ trans('cruds.permission.fields.title_helper') }}
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card-action">
            <button type="submit" class="btn btn-success" form="permission-form">{{ trans('global.update') }}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
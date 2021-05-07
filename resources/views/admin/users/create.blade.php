@extends('layouts.admin')
@section('title','Create User')
@section('content')
<div class="content">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">Create User</h4>
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
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.users.create')}}"> {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
          </div>

          <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" id="user-form">
              @csrf
              <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" >
                @if($errors->has('name'))
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                @endif
                <p class="helper-block">
                  {{ trans('cruds.user.fields.name_helper') }}
                </p>
              </div>
              <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                @endif
                <p class="helper-block">
                  {{ trans('cruds.user.fields.email_helper') }}
                </p>
              </div>
              <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('password') }}</small>
                @endif
                <p class="helper-block">
                  {{ trans('cruds.user.fields.password_helper') }}
                </p>
              </div>
              <div class="form-group {{ $errors->has('roles') ? 'has-error has-feedback' : '' }}">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                  <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                  <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                  <select name="role" id="role" class="form-control" required>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ (in_array($role->id, old('roles', [])) || isset($user) && $user->roles->contains($role->id)) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                  </select>
                  @if($errors->has('roles'))
                  <small id="emailHelp" class="form-text text-danger">{{ $errors->first('roles') }}</small>
                  @endif
                  <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                  </p>
                </div>
              </form>
            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success" form="user-form">{{ trans('global.save') }}</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection